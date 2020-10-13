<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        return view('posts/index', ['posts' => $posts]);
    }

    public function read(Request $request, Post $post) {
        if ($request->input('edit') == true) {
            return view('posts/edit', ['post' => $post]);
        } else {
            return view('posts/read', ['post' => $post]);
        }
    }

    public function create() {
        return view('posts/create');
    }

    public function save(Request $request) {
        $post = new Post($request->all());

        $post->save();

        return redirect()->route('posts.read', $post);
    }

    public function update(Request $request, Post $post) {
        $post->update($request->all());

        return redirect()->route('posts.read', $post);
    }

    public function delete(Post $post) {
        try {
            $post->delete();
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }

        return redirect()->route('posts');
    }
}
