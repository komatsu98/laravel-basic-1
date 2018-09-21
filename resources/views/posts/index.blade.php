@extends('layouts.master')



@section('content')
    <h3 class="pb-3 mb-4 font-italic border-bottom">
        From the Firehose
    </h3>

    <div class="form-group">
        @if(!auth()->id())
            <button type="button" class="btn btn-primary disabled">Sign In to Add Post</button>
        @else
            <a href="/admin/posts/create">
                <button type="button" class="btn btn-primary">Add Post</button>
            </a>
        @endif
    </div>

    <hr>

    @if(count($posts))
        @foreach($posts as $post)
            @include('posts.post')
        @endforeach
    @endif

    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>
@endsection

