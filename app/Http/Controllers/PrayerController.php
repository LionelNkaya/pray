<?php

namespace App\Http\Controllers;

use App\Models\Prayer;
use Illuminate\Http\Request;

class PrayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Create a variable to hold all the products currently in the db
        $prayers = Prayer::latest()->paginate(5);

        //return the view that has all the products
        return view('home', compact('prayers'))->with(request()->input('page'));
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

        //creating a new product in db
        Prayer::create($request->all()); 

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
