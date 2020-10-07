<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\About;
use App\Models\Servico;
use App\Models\Destaque;

class PaginasController extends Controller
{
    public function index()
    {
        $destaques = DB::table('destaques')->paginate(3);
        return view('site.index', compact('destaques'));
    }
    public function noticias(Request $request)
    {
        $posts = Post::when($request->search, function ($query) use ($request) {
            $search = $request->search;

            return $query->where('title', 'like', "%$search%")
                            ->orWhere('body', 'like', "%$search%");
        })->with('tags', 'category', 'user')
                    ->withCount('comments')
                    ->published()
                    ->simplePaginate(3);

        return view('site.noticias', compact('posts'));
        
    }
    public function contato()
    {
        return view('site.contato');
    }
    public function obrigado()
    {
        return view('site.obrigado');
    }
    public function servicos()
    {
        $servicos = DB::table('servicos')->paginate(3);
        return view('site.servicos', compact('servicos'));
    }
    public function servico(Servico $servico)
    {
        $servico = $servico->load(['user']);

        return view('frontend.servico', compact('servico'));
    }
    public function sobre()
    {
        $abouts = About::all();
        return view('site.sobre', compact('abouts'));
    }
    public function destaque(Destaque $destaque)
    {
        $destaque = $destaque->load(['user']);

        return view('frontend.destaque', compact('destaque'));
    }
    public function teste(Request $request)
    {
        $posts = Post::when($request->search, function ($query) use ($request) {
            $search = $request->search;

            return $query->where('title', 'like', "%$search%")
                            ->orWhere('body', 'like', "%$search%");
        })->with('tags', 'category', 'user')
                    ->withCount('comments')
                    ->published()
                    ->simplePaginate(3);

        return view('site.teste', compact('posts'));

        /*$destaques = DB::table('destaques')->paginate(3);
        return view('site.teste', compact('destaques'));*/

    }
    public function apple()
    {
        return view('site.apple');
    }

}
