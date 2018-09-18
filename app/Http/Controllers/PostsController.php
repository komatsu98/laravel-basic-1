<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    //
    function index() {

        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    function show(Post $post) {
        return view('posts.show', compact('post'));
    }

    function create() {
        return view('posts.create');
    }

    function store(Request $request) {

        $this->validate(request(), [

            'title' => 'required',
            'body' => 'required'

        ]);

        Post::create(request(['title','body']));

        return redirect('/posts');
    }
}
