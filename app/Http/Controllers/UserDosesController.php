<?php

namespace App\Http\Controllers;

use App\Models\UserDoses;
use Illuminate\Http\Request;

class UserDosesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userDoses = UserDoses::create([
            'user_id' => $request->user_id,
            'dose_id' => $request->dose_id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserDoses  $userDoses
     * @return \Illuminate\Http\Response
     */
    public function show(UserDoses $userDoses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserDoses  $userDoses
     * @return \Illuminate\Http\Response
     */
    public function edit(UserDoses $userDoses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserDoses  $userDoses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserDoses $userDoses)
    {
        $userDose = UsereDoses::find($request->id);
        
        $userDose->user_id = $request->user_id;
        $userDose->dose_id = $request->dose_id;
        
        $userDose->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserDoses  $userDoses
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDoses $userDoses)
    {
        //
    }
}
