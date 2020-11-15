<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        return view('posts/index', ['posts' => $posts]);
    }

    public function myPosts() {
        $posts = Post::all()->where('user_id', Auth::id());

        return view('posts/my_posts', ['posts' => $posts, 'author' => User::all()->find(Auth::id())]);
    }

    public function read(Request $request, Post $post) {
        if ($request->input('edit') == 'true') {
            return view('posts/edit', ['post' => $post]);
        } else {
            return view('posts/read', ['post' => $post]);
        }
    }

    public function create() {
        return view('posts/create');
    }

    public function save(SavePostRequest $request) {
        $post = new Post($request->all());

        $post->user_id = Auth::id();

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
