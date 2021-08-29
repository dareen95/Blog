@extends('layouts.app')
@section('meta_title','All posts')



@section('content')
 <!-- Main Content-->



 <div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            @forelse ($posts as $post)
            <!-- Post preview-->
            <div class="post-preview">
                <a href="{{ route('posts.show',$post->id) }}">
                    <h2 class="post-title">{{ $post->title }}</h2>
                    <h3 class="post-subtitle">{{ $post->content}}p</h3>
                </a>
                <p class="post-meta">

                     posted on {{ $post->created_at->toDateTimeString() }} <strong>CategorY:</strong>{{ $post->Category->name }}
                </p>

                @php
                    $like_count=0;
                    $dislike_count=0;
                                  @endphp
                @foreach ($post->likes as$like )


                @php
                if($like->like==1){
                    $like_count++;
                }
                if($like->like==0){
                    $dislike_count++;
                }

                @endphp
                @endforeach
                <button type="button" class="btn btn-success">like 10</button>
                <b>{{ $like_count }}</b>
                <button type="button" class="btn btn-danger">dislike 5</button>
                <b>{{ $dislike_count }}</b>


            </div>

            <!-- Divider-->
            <hr class="my-4" />
            @empty
            div class="post-preview">
                <a>
                    <a class="post-title">There is no posts right now</a>
                </a>

            </div>
            @endforelse

            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>




@endsection

