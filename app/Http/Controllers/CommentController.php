<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    public function store(Post $id, Request $request)
{
   Comment::create([
        'content' => $request->content,
        'post_id' => $request->post_id,

    ]);

    return redirect('/posts');
}
}
