<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\createPostModel;
use Auth;
use Illuminate\Support\Facades\File;
class craetePost extends Controller
{
    
    public function create_Post(Request $request){


       
        // dd($request->file('imgorvideo'));

        $addpost = new createPostModel();
        $addpost ->description =$request->input('descrption');
        $addpost ->category =$request->input('category');
        if($request->file('imgorvideo')){
            $file= $request->file('imgorvideo');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('storage/'), $filename);
            $addpost->photo_or_video= $filename;
        }
        $addpost->username = Auth::user()->name;
        $file_extension = $filename;
        $ex =File::extension($file_extension);

        $addpost->extension= $ex;

        $addpost->save();

        return redirect('/dashboard');


        
    }
}
