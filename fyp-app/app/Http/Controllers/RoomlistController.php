<?php

namespace App\Http\Controllers;

use App\Models\roomlist;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;


class RoomlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = roomlist::all();
        //return view('adminside.home', ['roomlisting' => $rooms]);
        return view('adminside.testinghome', ['roomlisting' => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminside.form');
        //return view('adminside.testinghome');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:Apartment,House,Condo,Villa,Other',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'area_sqft' => 'required|integer',
            'location' => 'required|string',
            'is_available' => 'sometimes|boolean',
            'image_path' => 'nullable|image|mimes:jpeg,jpg,png,gif'
        ]);

        $newRoom = roomlist::create($data);

        return redirect(route('admindirect.index'))->with('success' , 'Room Is Save');
    }

    /**
     * Display the specified resource.
     */
    public function show(roomlist $roomlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(roomlist $roomlist)
    {
        return view('adminside.edit', ['roomlist' => $roomlist]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, roomlist $roomlist)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:Apartment,House,Condo,Villa,Other',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'area_sqft' => 'required|integer',
            'location' => 'required|string',
            'is_available' => 'sometimes|boolean',
            'image_path' => 'nullable|image|mimes:jpeg,jpg,png,gif'
        ]);

        $roomlist -> update($data);

        return redirect(route('admindirect.index'))->with('success' , 'Room Is Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(roomlist $roomlist)
    {
        $roomlist -> delete();
        return redirect(route('admindirect.index'))->with('success' , 'Room Is Deleted');
    }
}
