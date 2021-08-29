@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <h1 class="display-one">{{ ($post->title) }}</h1>
                <p>{{  $post->content  }}</p>
                <hr>
                <a href="/id/{{ $post->id }}/edit" class="btn btn-outline-primary">Edit Post</a>
                <br>
                <br>
                <form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete Post</button>
                </form>
            </div>
        </div>
        <div class="comments">
            @foreach ($post->comments as $comment )
            <p>{{ $comment->content }}</p>

            @endforeach
        </div>

        <form action="/posts/{$post->id}/store" method="POST">
            @csrf
            <div class="row">

                <div class="control-group col-12 mt-2">
                    <label for="body">write comment</label>
                    <textarea id="body" class="form-control" name="content" placeholder="Enter comment"
                              rows="" required></textarea>
                </div>
            </div>
            <div class="row mt-2">
                <div class="control-group col-12 text-center">
                    <button id="btn-submit" class="btn btn-primary">
                         Add comment
                    </button>
                </form>
               
    </div>
@endsection
