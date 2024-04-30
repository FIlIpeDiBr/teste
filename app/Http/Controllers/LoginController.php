<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request) {
        
        $credentials = $request->only('siape','password','remember_token');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
        
        return redirect()->back()->withErrors(['siape' => 'Credenciais inválidas']);
    }

    public function logout(){
        //peça confirmação
        Auth::logout();
        return redirect('/login');
    }
}
