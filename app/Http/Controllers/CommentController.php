<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->product_id = $request->product_id;

        if ($request->has('name')) {
            $comment->name = $request->name;
        } else {
            $comment->name = 'Anonymous';
        }

        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('success', 'Comment deleted successfully.');
    }
}
