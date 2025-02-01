<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\createPostModel;
use App\Models\followModel;
use App\Models\comments;


class dashboardController extends Controller
{
    public $data;
    public function diplay_dashboard()
    {
      
       


       $data = User::where('name','!=',Auth::user()->name)->get();
       $following =followModel::where('follower_id',Auth::user()->id)->get();
       $comments =comments::all(); 



       $followerData =followModel::all('following_id'); 
    //    $following = followModel::all();
        $category_id = createPostModel::all('id');
       $creative_data = createPostModel::where('category',1)->with('comments')->with('likes')->orderBy('created_at', 'desc')->get();
       $style_data = createPostModel::where('category',2)->with('comments')->with('likes')->orderBy('created_at', 'desc')->get();
       $beauty_data = createPostModel::where('category',3)->with('comments')->with('likes')->orderBy('created_at', 'desc')->get();

        return view('dashboard',compact('data','creative_data','style_data','beauty_data','followerData','following','comments','category_id'));

       
    }



   
    
}
