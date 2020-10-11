<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\About;
use App\Models\Servico;
use App\Models\Destaque;

class PaginasController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::when($request->search, function ($query) use ($request) {
            $search = $request->search;

            return $query->where('titulo', 'like', "%$search%")
                            ->orWhere('descricao', 'like', "%$search%");
        })->with('tags', 'category', 'user')
                    ->withCount('comments')
                    ->published()
                    ->simplePaginate(3);


        $destaques = DB::table('destaques')->paginate(3);
        return view('site.index', compact('destaques','blogs'));
    }
    public function noticias(Request $request)
    {
        $blogs = Blog::when($request->search, function ($query) use ($request) {
            $search = $request->search;

            return $query->where('title', 'like', "%$search%")
                            ->orWhere('body', 'like', "%$search%");
        })->with('tags', 'category', 'user')
                    ->withCount('comments')
                    ->published()
                    ->simplePaginate(3);

        return view('site.noticias', compact('blogs'));
        
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
    public function blog(Request $request)
    {
        $categories = Category::withCount('blogs')->paginate(10);

        $blogs = Blog::when($request->search, function ($query) use ($request) {
            $search = $request->search;

            return $query->where('titulo', 'like', "%$search%")
                            ->orWhere('descricao', 'like', "%$search%");
        })->with('tags', 'category', 'user')
                    ->withCount('comments')
                    ->published()
                    ->simplePaginate(3);

        return view('site.blog', compact('blogs','categories' ));
    }
    public function blogs(Blog $blog)
    {
        $blog = $blog->load(['user']);

        return view('frontend.blog', compact('blog'));
    }

    public function post(Blog $blog)
    {
        $categories = Category::withCount('blogs')->paginate(10);

        $blog = $blog->load(['user']);

        return view('frontend.blog', compact('blog','categories' ));
    }

}
