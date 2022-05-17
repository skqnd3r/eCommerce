<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }
    
    public function authenticate(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('login')->withErrors($validator)->withInput();
        } else {
            
            $credentials = array(
                'email' => $request->email,
                'password' => $request->password
            );
        }
        
        $email = User::where('email', $request->email)->first();
        if(!$email) {
            return back()->withInput()->with('message', 'This email do not exist');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('catalogue');
        }
        else {
            return back()->with('message', 'Wrong Password');
        }
    }
}
