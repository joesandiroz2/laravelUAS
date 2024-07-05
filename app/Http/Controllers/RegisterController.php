<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'nomor_telepon' => 'required',
            'alamat' => 'required',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        Pengguna::create([
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'nomor_telepon' => $validatedData['nomor_telepon'],
            'alamat' => $validatedData['alamat'],
        ]);
        return redirect('/login')->with('success', 'Registration Success, Please log in now!');
    }
}
