<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
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
                    ->simplePaginate(5);

        return view('frontend.index', compact('blogs'));
    }

    public function blog(Blog $blog)
    {
        $blog = $blog->load(['comments.user', 'tags', 'user', 'category']);

        return view('frontend.blog', compact('blog'));
    }

    public function comment(Request $request, Blog $blog)
    {
        $this->validate($request, ['descricao' => 'required']);

        $blog->comments()->create([
            'descricao' => $request->descricao,
        ]);
        flash()->overlay('Comment successfully created');

        return redirect("/blogs/{$blog->id}");
    }
}
