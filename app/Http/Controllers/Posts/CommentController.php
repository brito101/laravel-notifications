<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentFormRequest;
use App\Models\Post;
use App\Notifications\PostCommented;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreCommentFormRequest $request)
    {
        $comment = $request->user()->comments()->create($request->all());
        $author = $comment->post->user;
        $author->notify(new PostCommented($comment));
        return redirect()->route('posts.show', $comment->post_id)
            ->with('status', 'Comentário realizado com sucesso!');
    }
}
