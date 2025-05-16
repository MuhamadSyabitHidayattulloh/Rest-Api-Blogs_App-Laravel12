<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggleLike(Request $request, BlogPost $blogPost)
    {
        $like = Like::where('user_id', $request->user()->id)
                    ->where('blog_post_id', $blogPost->id)
                    ->first();

        if ($like) {
            $like->delete();
            return response()->json(['message' => 'Post unliked']);
        }

        Like::create([
            'user_id' => $request->user()->id,
            'blog_post_id' => $blogPost->id,
        ]);

        return response()->json(['message' => 'Post liked'], 201);
    }
}
