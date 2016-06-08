<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\User_account;
use Hash;

use App\Http\Requests;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $account = User_account::where('username', '=', $request['username'])->first();
        if (Hash::check($request['password'], $account->passw)) {
            session(['username' => $request['username']]);
            return redirect('home');
        } else{
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('username');
        return redirect('/');
    }
}
