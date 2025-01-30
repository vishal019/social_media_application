<?php

namespace App\Http\Controllers;

use App\Models\followModel;
use Illuminate\Http\Request;

class followController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function follow(Request $request)
    {
        // echo($request->input('userid', 'default'));
        // echo($request->input('following_id', 'default'));
         $addFollowRequest = new followModel();
         $addFollowRequest ->follower_id =$request->input('userid', 'default');
        $addFollowRequest ->following_id =$request->input('following_id', 'default');
        $addFollowRequest ->follower_name =$request->input('follower_name', 'default');
        $addFollowRequest ->following_name =$request->input('following_name', 'default');
        $addFollowRequest->save();

        return redirect()->back();
        





    }



    public function unfollow(Request $request, $id)
    {
        $userToUnfollow = User::findOrFail($id);

        if ($request->user()->following()->where('following_id', $id)->exists()) {
            $request->user()->following()->detach($userToUnfollow);
            return response()->json(['message' => 'Unfollowed successfully!']);
        }

        return response()->json(['message' => 'You are not following this user.'], 400);
    }
    public function followers($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user->followers);
    }

    public function following($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user->following);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(rc $rc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rc $rc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rc $rc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        followModel::where('follower_id', $request->userid)
            ->where('following_id', $request->following_id)
            ->delete();

        return back()->with('success', 'You have unfollowed this user.');
    }
}
