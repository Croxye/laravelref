<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostCommentController extends Controller
{
    public function store(Post $post)
    {
        request()->validate([
            'body' => 'required',
        ]);

        // add a comment to given post
        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => request('body'),
        ]);

        return back();
    }
}
