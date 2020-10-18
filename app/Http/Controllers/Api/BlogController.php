<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::when($request->titulo, function ($query) use ($request) {
            return $query->where('titulo', 'like', "%{$request->titulo}%");
        })
        ->when($request->search, function ($query) use ($request) {
            return $query->where('titulo', 'like', "%{$request->search}%")
                         ->orWhere('descricao', 'like', "%{$request->search}%");
        })
        ->when($request->order, function ($query) use ($request) {
            if ($request->order == 'oldest') {
                return $query->oldest();
            }

            return $query->latest();
        }, function ($query) {
            return $query->latest();
        })
        ->when($request->status, function ($query) use ($request) {
            if ($query->status == 'published') {
                return $query->published();
            }

            return $query->drafted();
        })
        ->paginate($request->get('limit', 10));

        return PostResource::collection($blogs);
    }

    public function show(Blog $blog)
    {
        Cache::put($blog->etag, $blog->id);

        $blog = $blog->load(['categoria', 'comments.user', 'tags', 'user']);

        return new PostResource($blog);
    }
}
