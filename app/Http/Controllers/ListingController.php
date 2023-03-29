<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('listings.index', [
            'listings' =>  Listing::latest()->filter(request(['tag','search']))->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //to store a listing
        $data = $request->validate([
            'title'=>'required',
            'company'=>['required',Rule::unique('listings', 'company')],
            //to make sure that the company name is unique unuique('table_name','column_name')
            'location'=>'required',
            'description'=>'required',
            'tags'=>'required',
            'email'=>['required','email',Rule::unique('listings', 'email')],
            'website'=>'required',
        ]);
        Listing::create($data);
        return redirect('/')->with('message', 'Listing created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
        if (! Listing::find($id)) {
            abort(404);
        }
        return view('listings.show', [
            'listing' =>  Listing::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
