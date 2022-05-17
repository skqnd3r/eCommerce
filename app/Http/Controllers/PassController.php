<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Password_reset;
use App\Models\User;

class PassController extends Controller
{
    protected function access($token)
    {
        $verif = Password_reset::where('token', $token)->first();
        if (!$verif) {
            Session::flush();
            return redirect('catalogue')->with(['POP' => trans('Accès impossible')]);
        }
        $name = User::select('id', 'firstname', 'lastname')->where('email', $verif->email)->first();

        $collection = collect($name);
        $merged = $collection->merge($verif);
        $merged->all();
        $user = $merged;
        Session::put('user', $user);
        return redirect('reset/password');
    }

    public function show()
    {
        if (Session::has('user')) {
            return view('reset_password');
        } else {
            Session::flush();
            return redirect('catalogue')->with(['POP' => trans("Vous n'avez pas les droits d'accès à cette page.")]);
        }
    }

    public function update(Request $request)
    {

        $user = Session::get('user');
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:4',
            'cpassword' => 'required|same:password'
        ]);

        if ($validator->fails()) 
        {
            return back()->withErrors($validator);
        } else {
            $hashpass = Hash::make($request->password);
            User::find($user['id'])->update(['password' => $hashpass]);
            Password_reset::where('token' ,$user['token'])->delete();
            Session::flush();
            return redirect('catalogue')->with(['POP' => trans("Votre mot de passe a été changé avec succès.")]);            
        }
    }
}
