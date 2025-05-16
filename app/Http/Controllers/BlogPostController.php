<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        $blogPosts = BlogPost::with(['user', 'likes', 'comments'])->get();
        return response()->json($blogPosts);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $blogPost = $request->user()->blogPosts()->create($validatedData);
        return response()->json($blogPost, 201);
    }

    public function show(BlogPost $blogPost)
    {
        $blogPost->load(['user', 'likes', 'comments']);
        return response()->json($blogPost);
    }

    public function update(Request $request, BlogPost $blogPost)
    {
        if ($request->user()->id !== $blogPost->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $validatedData = $request->validate([
            'title' => 'string|max:255',
            'content' => 'string',
        ]);

        $blogPost->update($validatedData);
        return response()->json($blogPost);
    }

    public function destroy(Request $request, BlogPost $blogPost)
    {
        if ($request->user()->id !== $blogPost->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $blogPost->delete();
        return response()->json(null, 204);
    }
}
