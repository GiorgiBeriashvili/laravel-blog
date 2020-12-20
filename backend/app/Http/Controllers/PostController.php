<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Notifications\PostApproved;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index() {
        // $posts = Post::all();
        $posts = Post::with('tags')->get();

        return view('posts/index', compact('posts'));
    }

    public function myPosts() {
        // $posts = Post::all()->where('user_id', Auth::id());
        $posts = Post::with('tags')->get()->where('user_id', Auth::id());
        $author = Auth::user();

        return view('posts/my_posts', compact('posts', 'author'));
    }

    public function read(Request $request, Post $post) {
        if ($request->input('edit') == 'true') {
            $tags = Tag::all();

            return view('posts/edit', compact('post', 'tags'));
        } else {
            return view('posts/read', compact('post'));
        }
    }

    public function create() {
        $tags = Tag::all();

        return view('posts/create', compact('tags'));
    }

    public function save(SavePostRequest $request) {
        $post = new Post($request->all());

        $post->user_id = Auth::id();

        $post->save();

        $post->tags()->attach($request->tags);

        return redirect()->route('posts.read', $post);
    }

    public function update(Request $request, Post $post) {
        $post->update($request->all());

        $post->tags()->detach($post->tags->pluck('id'));

        $post->tags()->attach($request->tags);

        return redirect()->route('posts.read', $post);
    }

    public function approve(Post $post) {
        if (!$post->is_approved && Auth::user()->role == 'admin') {
            $post->update([ $post->is_approved = true, ]);

            $details = [
                'greeting' => 'Hello!',
                'body' => 'A post got approved!',
                'thanks' => 'Thank you!',
            ];

            Auth::user()->notify(new PostApproved($details));
        }

        response("OK", 200);
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
