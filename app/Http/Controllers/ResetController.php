<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Password_reset;

class ResetController extends Controller
{

    const UPDATED_AT = null;

    public function show() 
    {
        return view('reset');
    }
    
    public function forgot(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect('reset')->withErrors($validator)->withInput();
        }

        //Check if the user exists
        $email = User::where('email', $request->email)->first();
        if(!$email) {
            return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
        }

        //Check if the token exists
        $email = Password_reset::where('email', $request->email)->first();
        if($email) {      
            Password_reset::where('email', $request->email)->delete();
        }
        
        // return dd($token);
        $token = Str::random(60);

        Password_reset::create([
            'email' => $request->email,
            'token' => $token
        ]);
        $url = route('reset/password/{token}',[$token]);
        // return redirect($url);

        //link syntax
        return dd($url);
    }
}