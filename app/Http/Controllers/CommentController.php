<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\comments;
use App\Models\createPostModel;
use Auth;


class CommentController extends Controller
{
   public function store(Request $request, $postId)
   {
       
         $comment_body=$request->input('comment');
         // dd($comment_body);
      comments::create([
         'post_id' => $postId,
         'user_id' => auth()->id(),
         'content' =>$comment_body,
     ]);

     return redirect()->back()->with('success', 'Comment added successfully!');
   }

   public function destroy($commentId)
   {
       $comment = comments::findOrFail($commentId);

       if ($comment->user_id !== auth()->id()) {
           return response()->json(['message' => 'You are not authorized to delete this comment'], 403);
       }

       $comment->delete();

       return response()->json(['message' => 'Comment deleted successfully']);
   }
   public function display_comment($id)
   {
       $comments = comments::where('post_id',$id)->get();
       $post_id = $id;
       return view('forntend.comments',compact('comments','post_id'));
   }
}
