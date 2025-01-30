<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class searchController extends Controller
{
    public function search_profile(Request $request){

        $query = $request->input('search');

        // Perform the search query on your model
        $results = User::where('name', 'LIKE', "%{$query}%")
        ->orWhere('email', 'LIKE', "%{$query}%")->get(); // Adjust to your needs

        return view('forntend.searchMobile', compact('results'));

    }
}
