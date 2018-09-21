@extends('layouts.master')

@section('content')

    @include('posts.post')

    <hr>

    <div class="comments">
        @foreach($post->comments as $comment)
            @include('posts.comment')
        @endforeach
    </div>

    <hr>
    {{--add comment--}}
    <div class="card">
        <div class="card-block">
            <form method="POST" action="/post/{{ $post->id }}/comments">
                {{--{{ method_field('PATCH') }}--}}

                @csrf

                <div class="form-group">
                    <textarea name="body" placeholder="Your comment here" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </form>
        </div>
        @include('layouts.errors')

    </div>

@endsection