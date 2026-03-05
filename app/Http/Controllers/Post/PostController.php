<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy("created_at", "desc")->paginate(12);
        return view("posts.index", ["posts" => $posts]);
    }
    public function profile(Request $request)
    {
        $user = $request->user();
        $posts = Post::where("user_id", $user->id)->paginate(12);

        return view("posts.profile", ["posts" => $posts, "user" => $user]);
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $data = $request->validate([
            "title" => "required|string|max:255",
            "content" => "required|string",
        ]);

        $post = Post::create(array_merge($data, ["user_id" => $user->id]));
        return redirect()->route("posts.profile", $post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("posts.profile", $post->user);
    }
}
