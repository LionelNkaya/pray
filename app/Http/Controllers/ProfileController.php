<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prayer;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfileModal()
    {
        // Retrieve the ID of the currently logged-in user
        $userId = Auth::id();
        
        //Retrive the number of prayers in prayers table for logged in user
        $userPrayerCount = Prayer::where('user_id', $userId)->count();

        //return the view with the user info
        return view('profile', compact('userPrayerCount'));
   }

}
