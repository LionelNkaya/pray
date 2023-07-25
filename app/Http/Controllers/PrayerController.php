<?php

namespace App\Http\Controllers;

use App\Models\Prayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PrayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Retrieve the ID of the currently logged-in user
        $userId = Auth::id();

        //Retrieve the appropriate date for the query. The date needs to be the same date (same day, same month):
            $currentDay = Carbon::now()->format('d'); // Format: '01' to '31' 
            $currentMonth = Carbon::now()->format('m'); // Format: '01' to '12'    

        //Create a variable to hold all the prayers of this user in the db and the current month and day
        //$prayers = Prayer::where('user_id', $userId)->latest()->paginate(5);
        $prayers = Prayer::where('user_id', $userId)
                 ->whereDay('created_at', $currentDay)
                 ->whereMonth('created_at', $currentMonth)
                 ->latest()
                 ->paginate(5);

        //return the view that has all the products
        return view('home', compact('prayers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prayers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validating user input
        $request ->validate([
            'content' => 'required',
        ]);

        $prayer = new Prayer();
        $prayer->user_id = Auth::id(); // Set the user_id to the currently authenticated user's ID
        $prayer->content = $request->input('content');
        $prayer->save();
 
        //returning to home with a success message
        return redirect()->route('home')
                        ->with('success','Prayer recorded successfully'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Prayer $prayer)
    {
        return view('prayers.show', compact('prayer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prayer $prayer)
    {
        return view('prayers.edit', compact('prayer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prayer $prayer)
    {
        //validating user input
        $request ->validate([
            'content' => 'required',
        ]);

        //Updating a product in db
        $prayer->update($request->all());

        return redirect()->route('home')
                        ->with('success','Prayer request updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prayer $prayer)
    {
        //Deleting product from the db
        $prayer->delete();
        
        //Return to the product index view
        return redirect()->route('home')
                        ->with('success','Prayer deleted successfully');
    }
}
