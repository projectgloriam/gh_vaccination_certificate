<?php

namespace App\Http\Controllers;

use App\Models\Dose;
use Illuminate\Http\Request;

class DoseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('doses.index', [
            'doses' => Dose::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dose = new Dose;
        
        $dose->name = $request->name;

        $dose->save();

        return redirect()->route('doses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dose  $dose
     * @return \Illuminate\Http\Response
     */
    public function show(Dose $dose)
    {
        return view('doses.show', [
            'dose' => $dose
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dose  $dose
     * @return \Illuminate\Http\Response
     */
    public function edit(Dose $dose)
    {
        return view('doses.edit', [
            'dose' => $dose
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dose  $dose
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dose $dose)
    {
        
        $dose->name = $request->name;
        
        $dose->save();

        return redirect()->route('doses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dose  $dose
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dose $dose)
    {
        $dose->delete();
        return redirect()->route('doses.index');
    }
}
