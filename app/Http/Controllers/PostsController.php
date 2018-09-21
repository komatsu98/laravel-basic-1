<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    function index()
    {
        $posts = Post::latest();
        if(request()->has('month') && request()->has('month')) {
            $posts->filter(request(['month', 'year']));
        }
        $posts = $posts->get();

        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at)')
            ->get()
            ->toArray();

        $data = [
            'posts' => $posts,
            'archives' => $archives
        ];
        return view('posts.index', $data);
    }

    function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    function create()
    {
        return view('posts.create');
    }

    function store(Request $request)
    {

        $this->validate(request(), [

            'title' => 'required',
            'body' => 'required'

        ]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );


        return redirect('/posts');
    }


}
