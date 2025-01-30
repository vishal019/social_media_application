<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\followModel;

class ChatController extends Controller
{
    public function display_chat(Request $request,$id){

        $userData = User::where('id',$id)->get();
        $following =followModel::all('following_id')->where('following_id',$id)->first();
        
        
      
        return view('forntend.chat',compact('userData','following'));

    }
}