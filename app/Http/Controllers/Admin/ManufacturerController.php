<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ciggy;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            //fetch 10 ciggies from the databse .
            $manufactures = Manufacturer::paginate(10);
            return view('admin.manufacturer.index')->with('manufacturers', $manufactures);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manufacturer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Manufacturer::create([
            'name' =>  $request->name,
            'address' =>  $request->address,
        ]);
        return to_route('admin.manufacturer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacturer $manufacturer)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        if(!Auth::id()) {
           return abort(403);
         }

        //this function is used to get a Ciggy by the ID.
        return view('admin.manufacturer.show')->with('manufacturer', $manufacturer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacturer $manufacturer)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        // $manufacturer = Manufacturer::all();

        // This user id check below was implemented as part of LiteNote
        // I don't have a user id linked to books,so I don't need it here - in CA 2 we will allow only admin users to edit books.
        // if($book->user_id != Auth::id()) {
        //     return abort(403);
        // }

      //  dd($book);

        // Load the edit view which will display the edit form
        // Pass in the current book so that it appears in the form.
        return view('admin.manufacturer.edit')->with('manufacturer', $manufacturer);
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manufacturer $manufacturer)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $manufacturer->update([
        'name' => $request->name,
        'address' => $request->address,
        ]);

        return to_route('admin.manufacturer.show', $manufacturer)->with('success','manufacturer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacturer $manufacturer)
    {
        $manufacturer->delete();

        return to_route('admin.manufacturer.index')->with('success', 'manufacturer deleted successfully');
    }
}
