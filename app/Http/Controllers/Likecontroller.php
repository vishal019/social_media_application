<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\createPostModel;

class Likecontroller extends Controller
{
    public function store(Request $request, $postId)
    {
        $post = createPostModel::findOrFail($postId);

        // Check if the user has already liked the post
        if ($post->likes()->where('user_id', auth()->id())->exists()) {
            return redirect()->back();
        }

        $like = $post->likes()->create(['user_id' => auth()->id()]);

        return redirect()->back()->with('success', 'like added successfully!');
    }

    public function destroy($postId)
    {
        $post = createPostModel::findOrFail($postId);

        $like = $post->likes()->where('user_id', auth()->id())->first();

        if (!$like) {
            return response()->json(['message' => 'You have not liked this post'], 400);
        }

        $like->delete();

        return response()->json(['message' => 'Like removed successfully']);
    }
}
