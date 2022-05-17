<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email',
            'lastname' => 'required|alpha',
            'firstname' => 'required|alpha',
            'password' => 'required|min:4',
            'cpassword' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return redirect('register')->withErrors($validator)->withInput();
        } else {
            $hashpass = Hash::make($request->password);
            $user = User::create([
            'firstname' => $request->firstname,
            'email' => $request->email,
            'lastname' => $request->lastname,
            'password' => $hashpass,
            'admin' => '0'
            ]);
            
            Auth::login($user);
            return redirect('catalogue');
        }
    }
}
