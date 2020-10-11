@extends('layouts.app')

@section('content')
    <div class="container">

        @include('frontend._search')

        <div class="row">

            <div class="col-md-12">
                @forelse ($blogs as $blog)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ $blog->title }} - <small>by {{ $blog->user->name }}</small>

                            <span class="pull-right">
                                {{ $blog->created_at->toDayDateTimeString() }}
                            </span>
                        </div>

                        <div class="panel-body">
                            <p>{{ str_limit($blog->body, 200) }}</p>
                            <p>
                                Tags:
                                @forelse ($blog->tags as $tag)
                                    <span class="label label-default">{{ $tag->name }}</span>
                                @empty
                                    <span class="label label-danger">No tag found.</span>
                                @endforelse
                            </p>
                            <p>
                                <span class="btn btn-sm btn-success">{{ $blog->category->name }}</span>
                                <span class="btn btn-sm btn-info">Comments <span class="badge">{{ $blog->comments_count }}</span></span>

                                <a href="{{ url("/blogs/{$blog->id}") }}" class="btn btn-sm btn-primary">See more</a>
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="panel panel-default">
                        <div class="panel-heading">Not Found!!</div>

                        <div class="panel-body">
                            <p>Sorry! No post found.</p>
                        </div>
                    </div>
                @endforelse

                <div align="center">
                    {!! $blogs->appends(['search' => request()->get('search')])->links() !!}
                </div>

            </div>

        </dev>
    </dev>
@endsection
