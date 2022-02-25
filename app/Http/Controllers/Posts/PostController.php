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
        $posts = $this->post::paginate();
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = $this->post->find($id);
        return view('posts.show', compact('post'));
    }
}