<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        return view('posts', ['posts' => $posts]);
    }

    public function post_by_id($id) {
        $post = Post::query()->findOrFail($id);

        return view('post', ['post' => $post]);
    }

    public function create() {
        return view('create');
    }

    public function save(Request $request) {
        $post = new Post($request->all());

        $post->save();

        return redirect()->back();
    }
}
