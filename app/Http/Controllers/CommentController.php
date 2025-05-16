<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(BlogPost $blogPost)
    {
        $comments = $blogPost->comments()->with('user')->get();
        return response()->json($comments);
    }

    public function store(Request $request, BlogPost $blogPost)
    {
        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        $comment = $blogPost->comments()->create([
            'user_id' => $request->user()->id,
            'content' => $validatedData['content'],
        ]);

        return response()->json($comment, 201);
    }

    public function update(Request $request, Comment $comment)
    {
        if ($request->user()->id !== $comment->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        $comment->update($validatedData);
        return response()->json($comment);
    }

    public function destroy(Request $request, Comment $comment)
    {
        if ($request->user()->id !== $comment->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $comment->delete();
        return response()->json(null, 204);
    }
}
