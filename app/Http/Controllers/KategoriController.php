<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::query()->get();
        return view('dashboard.categories.index', ['title' => 'Kategori', 'kategori2' => $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create', ['title' => 'Create Kategori']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kategori = [
            'kode' => $request->kode,
            'nama' => $request->nama,
        ];
        Kategori::query()->create($kategori);
        return redirect('/dashboard/categories')->with('success', 'Kategori has been created!');
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
        $kategori = Kategori::query()->where('kode', $id)->first();
        return view('dashboard.categories.edit', ['title' => 'Edit Kategori', 'kategori' => $kategori]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = [
            'nama' => $request->nama,
        ];
        Kategori::query()->where('kode', $id)->update($kategori);
        return redirect('/dashboard/categories')->with('success', 'Kategori has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kategori::query()->where('kode', $id)->delete();
        return redirect('/dashboard/categories')->with('success', 'Kategori has been deleted!');
    }
}
