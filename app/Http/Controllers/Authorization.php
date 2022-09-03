<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class Authorization extends Controller
{
    public function index(){
        return view('login_form', [
            'title' => 'Masuk',
        ]);
    }

    public function register(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|max:100',
            'username' => ['required', 'min:6', 'max:20', 'unique:users'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'max:255', 'min:8'],
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        $request->session()->flash('success', 'Registrasi berhasil !');
        User::create($validatedData);
        return redirect('/masuk');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'login_username' => 'required',
            'login_password' => 'required',
        ]);

        if (Auth::attempt(['username' => $credentials['login_username'], 'password' => $credentials['login_password']])){
            
            $request->session()->regenerate();
            return redirect()->intended('/');
        };

        return back()->with('AuthError', 'Username atau Password anda salah');

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
