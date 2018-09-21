<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //

    public function store(Post $post) {

        $this->validate(request(), ['body' => 'required|min:2']);

        $post->addComment(request('body'));

//        Comment::create([
//            'body' => request('body'),
//            'post_id' => $post->id
//        ]);

        return back();
    }
}
