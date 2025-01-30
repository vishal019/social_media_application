<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\followModel;
use App\Models\User;

class MessageController extends Controller
{
    public function index($id)
    {
        $userData = User::where('id', $id)->get(); // Exclude the logged-in user
        $following =followModel::all('following_id')->where('following_id',$id)->first();
        return view('forntend.chat',compact('userData','following'));
    }
    public function messager(Request $request){

        $userData = User::where('name','!=',Auth::user()->name)->get();

       
        return view('forntend.mobileMessager',compact('userData'));
    }

    public function fetchMessages($receiverId)
    {
        $messages = Message::where(function ($query) use ($receiverId) {
                $query->where('sender_id', Auth::id())
                      ->where('receiver_id', $receiverId);
            })
            ->orWhere(function ($query) use ($receiverId) {
                $query->where('sender_id', $receiverId)
                      ->where('receiver_id', Auth::id());
            })
            ->orderBy('created_at')
            ->get();

        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return response()->json($message);
    }
}
