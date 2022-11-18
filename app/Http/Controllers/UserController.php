<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Dose;
use App\Models\UserDoses;
use App\Mail\UserVaccinated;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create', [
            'doses' => Dose::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->location = $request->location;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->vaccinated = true;

        if($request->hasFile('certificate') && $request->file('certificate')->isValid()){
            $user->addMedia($request->certificate)->toMediaCollection();
        }
        
        //Saving user media to send to user
        $user->save();

        //sms_link
        $user->qr_code = QrCode::size(300)->generate( $user->getFirstMediaUrl() );

        $doses_checked = $request->input('dose');

        if(is_null($doses_checked))
            $doses_checked = [];

        foreach($doses_checked as $dose){
            $user->doses()->attach($dose);
        }

        $user->save();
        //Send email to user

        //Setting smtp email and password from prompt

        config([
                'mail.mailers.smtp.username' => $request->smtpEmail,
                'mail.mailers.smtp.password' => $request->smtpPassword
            ]
        );

        //send email
        try {
            Mail::to($request->email)->send(new UserVaccinated($user));
        } catch (Exception $e) {
            return $e->getMessage();
        }
        
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
            'doses' => Dose::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->location = $request->location;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;

        if(is_null($request->input('vaccinated'))){
            $user->vaccinated = false;
        } else {
            $user->vaccinated = true;
        }
        
        $user->save();

        if($request->hasFile('certificate') && $request->file('certificate')->isValid()){
            $user->clearMediaCollection(); 
            $user->addMedia($request->certificate)->toMediaCollection();
        }

        $doses_checked = $request->input('dose');

        if(is_null($doses_checked))
            $doses_checked = [];

        //remove all user doses
        $user->doses()->detach();

        foreach($doses_checked as $dose){
            $user->doses()->attach($dose);
        }
        
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //remove all user doses
        $user->doses()->detach();

        $user->delete();

        return redirect()->route('users.index');
    }
}
