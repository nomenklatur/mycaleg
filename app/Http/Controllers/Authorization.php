<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
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
        return redirect('/dashboard');
    }

    public function dashboard(){
        return view('dashboard', [
            'title' => 'Dashboard',
        ]);
    }
}
