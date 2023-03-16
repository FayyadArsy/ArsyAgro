<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [

            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request){
           $validatedData = $request->validate([
                'name' => 'required|max:50',
                'username' => 'required|min:4|max:20|unique:users',
                'email' => 'required|email:dns|unique:users',
                'password' => 'required|min:4|max:30'
            ]);
            // hash password cara 1
            // $validatedData['password']=bcrypt($validatedData['passowrd']);
            //cara 2
            $validatedData['password'] = Hash::make($validatedData['password']);
            User::create($validatedData);
            //$request->session()->flash('success','Registrasi Berhasil');
            return redirect('/login')->with('success','Registrasi Berhasil');
    }
}