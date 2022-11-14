<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Models\EmailReset;
use App\Http\Requests\ResetPassword\ResetPasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use JWTAuth;
use Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Carbon\Carbon;

class ResetPasswordController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
    	$email = $request->email;
    	$resetToken = $request->token;
    	return view('auth.passwords.reset',compact('email','resetToken'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $email)
    {
    	$check = PasswordReset::where(['email' => $email, 'token' => $request->token])->first();
    	if ($check) {

    		$hash_password    = Hash::make($request->password);
    		$password_update = User::where('email', $email)->update(['password' => $hash_password]);
    		PasswordReset::where('email', $email)->delete();

    		return redirect()->back()->with('success', 'Your password have been updated sucessfully.'); 

    	} else {
    		return redirect()->back()->with('warning', 'Token expire to reset password.');
    	}
    }

    public function editEmail(Request $request)
    {
    	$email = $request->email;
    	$resetToken = $request->token;
    	return view('auth.email.reset',compact('email','resetToken'));
    }

    public function updateEmail(Request $request, $email)
    {

    	$credentials = [
    		"email" => $email,
    		"password" => $request->password
    	];

    	if (!$user = JWTAuth::attempt($credentials)) {
    		return redirect()->back()->with('warning', 'Invalid username or password.');
    	}
    	User::where('id',Auth::id())->update(['last_login_at' => Carbon::now()->format('Y-m-d H:i:s')]);

    	$check = EmailReset::where(['user_id' => Auth::id(), 'token' => $request->token])->first();
    	if ($check) {

    		$newEmail    = $check->email;
    		$EmailUpdate = User::where('id', Auth::id())->update(['email' => $newEmail]);
    		EmailReset::where('user_id', Auth::id())->delete();

    		return redirect()->back()->with('success', 'Your email have been updated sucessfully.'); 
        } else {
    		return redirect()->back()->with('warning', 'Token expire to reset email.');
    	}
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
