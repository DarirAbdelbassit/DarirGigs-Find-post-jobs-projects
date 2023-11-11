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
            'listings' =>  Listing::latest()->filter(request(['tag','search']))->paginate(6)
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
            'title' => 'required',
            'company' => ['required',Rule::unique('listings', 'company')],
            //to make sure that the company name is unique unuique('table_name','column_name')
            'location' => 'required',
            'description' => 'required',
            'tags' => 'required',
            'email' => ['required','email',Rule::unique('listings', 'email')],
            'website' => 'required',
        ]);
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
            //make folder(storage/logos) access public use : php artisan storage:link
        }
        $data['user_id'] = auth()->user()->id;
        Listing::create($data);
        return redirect('/')->with('message', 'Listing created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        if (!Listing::find($id)) {
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
        //to edit a listing
        if (!Listing::find($id)) {
            abort(404);
        }
        return view('listings.edit', ['item' => Listing::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $newData = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'description' => 'required',
            'tags' => 'required',
            'email' => 'required' ,
            'website' => 'required',
        ]);
        if ($request->hasFile('logo')) {
            $newData['logo'] = $request->file('logo')->store('logos', 'public');
        }
        Listing::where('id', $id)->update($newData);
        return back()->with('message', 'Listing updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Listing::where('id', $id)->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    /**
     * Display the user listings.
     */
    public function manage()
    {
        $data = auth()->user()->listings()->get();
        return view('listings.manage',['listings' => $data]);
    }
}
