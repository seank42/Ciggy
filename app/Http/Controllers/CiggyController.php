<?php

namespace App\Http\Controllers;

use App\Models\Ciggy;
use Illuminate\Http\Request;

class CiggyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciggies = Ciggy::paginate(10);
        return view('ciggies.index')->with('ciggies', $ciggies);
    }

    /**V
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'ciggies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Ciggy::create([
            // Ensure you have the use statement for
            // Illuminate\Support\Str at the top of this file.
        //    'user_id' => Auth::id(),
            'brand' =>  $request->brand,
            'type' =>  $request->type,
            'price' =>  $request->price,
            'amount' =>  $request->amount
        ]);
        return to_route('ciggies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ciggy = Ciggy::findOrFail($id);
        return view('ciggies.show')->with('ciggy', $ciggy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
