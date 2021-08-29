<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index() {
        $posts=Post::paginate(5);
        return view('posts.index',compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        Post::create([
            'title' => $request->title,
            'content' => $request->content,

        ]);

        return redirect()->route('posts.index');
    }

    public function show(Post $post){
        // $post =Post::findOrFail(post);

        return view('posts.show',compact('post'));
    }


    public function Category($name){

        $cat =DB::table('categories')->where('name', $name)->value('id');
        $posts =DB::table('posts')->where('category_id' , $cat)->get;

        return view('posts.category',compact('posts'));

    }







// public function edit(BlogPost $blogPost)
// {
// return view(‘blog.edit’, [
// ‘post’ => $blogPost,
// ]); //returns the edit view with the post
// }
// public function update(Request $request, BlogPost $blogPost)
// {
// $blogPost->update([
//     'title' => $request->title,
//     'body' => $request->body
// ]);

// return redirect('blog/' . $blogPost->id);
// }

// public function destroy(BlogPost $blogPost)
// {
// $blogPost->delete();

// return redirect('/blog');
// }

}




