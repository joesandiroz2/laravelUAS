<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = Pengguna::query()->get();
        return view('dashboard.users.index', ['title' => 'Users', 'pengguna2' => $pengguna]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create', ['title' => 'Create User']);
    }

    /**
     * Store a newly created resource in storage.
     */
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

        $imageName = time().'.'.$request->file('gambar')->extension();
        $gambar = 'img/' . $imageName;
        $request->file('gambar')->move(public_path('img'), $imageName);

        $validatedData['password'] = bcrypt($validatedData['password']);
        Pengguna::query()->create([
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'nomor_telepon' => $validatedData['nomor_telepon'],
            'alamat' => $validatedData['alamat'],
            'gambar' => $gambar,
        ]);
        return redirect('/dashboard/users')->with('success', 'User has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengguna = Pengguna::query()->where('id', $id)->first();
        return view('dashboard.users.edit', ['title' => 'Edit User', 'pengguna' => $pengguna]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'nomor_telepon' => 'required',
            'alamat' => 'required',
        ]);
        $imageName = time().'.'.$request->file('gambar')->extension();
        $gambar = 'img/' . $imageName;
        $request->file('gambar')->move(public_path('img'), $imageName);

        $old_image = Pengguna::query()->where('id', $id)->first()->gambar;
        if (File::exists(public_path($old_image))) {
            File::delete(public_path($old_image));
        }
        $validatedData['password'] = bcrypt($validatedData['password']);
        Pengguna::query()->where('id', $id)->update([
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'nomor_telepon' => $validatedData['nomor_telepon'],
            'alamat' => $validatedData['alamat'],
            'gambar' => $gambar,
        ]);
        return redirect('/dashboard/users')->with('success', 'User has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pengguna::query()->where('id', $id)->delete();
        return redirect('/dashboard/users')->with('success', 'User has been deleted!');
    }

    public function changeProfile(Request $request)
    {
        if ($request->password == null) {
            $validatedData = $request->validate([
                'id' => 'required',
                'nama' => 'required',
                'email' => 'required|email',
                'nomor_telepon' => 'required',
                'alamat' => 'required',
            ]);
            if ($request->hasFile('gambar')) {
                $imageName = time().'.'.$request->file('gambar')->extension();
                $gambar = 'img/' . $imageName;
                $request->file('gambar')->move(public_path('img'), $imageName);

                $old_image = Pengguna::query()->where('id', $validatedData['id'])->first()->gambar;
                if (File::exists(public_path($old_image))) {
                    File::delete(public_path($old_image));
                }

                $newData = ([
                    'nama' => $validatedData['nama'],
                    'email' => $validatedData['email'],
                    'nomor_telepon' => $validatedData['nomor_telepon'],
                    'alamat' => $validatedData['alamat'],
                    'gambar' => $gambar
                ]);
            } else {
                $newData = ([
                    'nama' => $validatedData['nama'],
                    'email' => $validatedData['email'],
                    'nomor_telepon' => $validatedData['nomor_telepon'],
                    'alamat' => $validatedData['alamat'],
                ]);
            }
        } else {
            $validatedData = $request->validate([
                'id' => 'required',
                'nama' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
                'nomor_telepon' => 'required',
                'alamat' => 'required',
            ]);
            $validatedData['password'] = bcrypt($validatedData['password']);
            if ($request->hasFile('gambar')) {
                $imageName = time().'.'.$request->file('gambar')->extension();
                $gambar = 'img/' . $imageName;
                $request->file('gambar')->move(public_path('img'), $imageName);

                $old_image = Pengguna::query()->where('id', $validatedData['id'])->first()->gambar;
                if (File::exists(public_path($old_image))) {
                    File::delete(public_path($old_image));
                }

                $newData = ([
                    'nama' => $validatedData['nama'],
                    'email' => $validatedData['email'],
                    'password' => $validatedData['password'],
                    'nomor_telepon' => $validatedData['nomor_telepon'],
                    'alamat' => $validatedData['alamat'],
                    'gambar' => $gambar
                ]);
            } else {
                $newData = ([
                    'nama' => $validatedData['nama'],
                    'email' => $validatedData['email'],
                    'password' => $validatedData['password'],
                    'nomor_telepon' => $validatedData['nomor_telepon'],
                    'alamat' => $validatedData['alamat'],
                ]);
            }
        }
        Pengguna::query()->where('id', $validatedData['id'])->update($newData);
        return redirect('/profile')->with('success', 'Profile has been updated!');
    }
}
