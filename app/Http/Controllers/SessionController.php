<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index()
    {
        return view('sesi/index');
    }
    function login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            //kalo autentikasi sukses
            return redirect('/siswa')->with('success', 'Berhasil login');
        }else{
            //kalo autentikasi gagal
            return redirect('/sesi')->withErrors('Username dan password yang dimasukkan tidak valid');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/sesi')->with('success', 'Berhasil logout');
    }

    function register()
    {
        return view('sesi/register');
    }

    function create(Request $request_reg)
    {
        Session::flash('name', $request_reg->name);
        Session::flash('email', $request_reg->email);
        $request_reg->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ],[
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Silahkan masukkan email yang valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.min' => 'Password terlalu pendek (minimal 6 karakter)',
            'password.required' => 'Password wajib diisi'
        ]);

        $data = [
            'name' => $request_reg->name,
            'email' => $request_reg->email,
            'password' => Hash::make($request_reg->password)
        ];
        User::create($data);

        $infologin = [
            'email' => $request_reg->email,
            'password' => $request_reg->password,
        ];

        if(Auth::attempt($infologin)){
            //kalo autentikasi sukses
            return redirect('siswa')->with('success', Auth::user()->name . " " . 'Berhasil login');
        }else{
            //kalo autentikasi gagal
            return redirect('')->withErrors('Username dan password yang dimasukkan tidak valid');
        }
    }
}
