<?php

namespace App\Http\Controllers;

use function Couchbase\defaultDecoder;
use Exception;
use Illuminate\Database\Connection;
use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        $db_driver = DB::connection()->getPDO()->getAttribute(constant("PDO::ATTR_DRIVER_NAME"));
        switch ($db_driver)
        {
            case 'mysql':
                $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
                    ->groupBy('year', 'month')
                    ->orderByRaw('min(created_at)')
                    ->get()
                    ->toArray();
                break;
            case 'pgsql':
                //
                $archives = Post::selectRaw('year(created_at) as year, month(created_at) month')
                    ->groupBy('year', 'month')
                    ->orderByRaw('min(created_at)')
                    ->get()
                    ->toArray();
                break;
            default:
                throw new Exception('Driver not supported.');
                break;
        }

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
