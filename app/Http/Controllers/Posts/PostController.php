<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->with('comments')->paginate();
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = $this->post->with('comments')->find($id);
        return view('posts.show', compact('post'));
    }
}
