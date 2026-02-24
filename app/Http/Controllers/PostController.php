<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('front.pages.posts.index', [
            'title' => 'Posts',
            'posts' => Post::query()->get(),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Post $post)
    {
//        $post = Post::withTrashed()->find($post);
        return view('front.pages.posts.show', [
            'title' => $post->title,
            'post' => $post,
        ]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
