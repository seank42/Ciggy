<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ciggy;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CiggyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $ciggies = Ciggy::with('manufacturer')->get();

        return view('admin.ciggies.index')->with('ciggies', $ciggies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');


    $manufacturers = Manufacturer::all();
    return view('admin.ciggies.create')->with('manufacturers',$manufacturers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation for  store
        $request->validate([
            'brand' => 'required',
            'type' => 'required',
            'price' => 'required|max:500',
            'amount' =>'required',
         ]);

        Ciggy::create([
            // Ensure you have the use statement for
            // Illuminate\Support\Str at the top of this file.
        //    'user_id' => Auth::id(),
            'brand' =>  $request->brand,
            'type' =>  $request->type,
            'price' =>  $request->price,
            'amount' =>  $request->amount,
            'manufacturer_id' => $request->manufacturer_id
        ]);
        return to_route('admin.ciggies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ciggy $ciggy)
    {
         $user = Auth::user();
        $user->authorizeRoles('admin');

        if(!Auth::id()) {
           return abort(403);
         }

        //this function is used to get a Ciggy by the ID.
        return view('admin.ciggies.show')->with('ciggy', $ciggy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ciggy $ciggy)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // This user id check below was implemented as part of LiteNote
        // I don't have a user id linked to books,so I don't need it here - in CA 2 we will allow only admin users to edit books.
        // if($ciggies->user_id != Auth::id()) {
        //     return abort(403);
        // }

      //  dd($ciggies);
      $manufacturers = Manufacturer::all();
        // Load the edit view which will display the edit form
        // Pass in the current book so that it appears in the form.
        return view('admin.ciggies.edit')->with('ciggy', $ciggy)->with('manufacturers', $manufacturers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ciggy $ciggy)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $ciggy->update([
        'brand' => $request->brand,
        'type' => $request->type,
        'price' => $request->price,
        'amount' => $request->amount,
        'manufacturer_id' => $request->manufacturer_id
        ]);

        return to_route('admin.ciggies.show', $ciggy)->with('success','Ciggy updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ciggy $ciggy)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $ciggy->delete();

        return to_route('admin.ciggies.index')->with('success', 'CIGGY deleted successfully');
    }
}
