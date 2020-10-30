<?php

namespace App\Http\Controllers;

use App\Models\Informacoes;
use Illuminate\Http\Request;

class InformacoesController extends Controller
{
    public function index(Request $request)
    {
        $informacoes = Informacoes::when($request->search, function ($query) use ($request) {
            $search = $request->search;

            return $query->where('titulo', 'like', "%$search%")
                            ->orWhere('descricao', 'like', "%$search%");
        })->with('tags', 'category', 'user')
                    ->withCount('comments')
                    ->published()
                    ->orderBy('id', 'DESC')
                    ->simplePaginate(5);

        return view('frontend.index', compact('informacoes'));
    }

    public function informacoes(Informacoes $informacao)
    {
        $informacao = $informacao->load(['comments.user', 'tags', 'user', 'category']);

        return view('frontend.informacoes', compact('informacao'));
    }

    public function comment(Request $request, Informacoes $informacoes)
    {
        $this->validate($request, ['descricao' => 'required']);

        $informacoes->comments()->create([
            'descricao' => $request->descricao,
        ]);
        flash()->overlay('Comment successfully created');

        return redirect("/informacoes/{$informacao->id}");
    }
}
