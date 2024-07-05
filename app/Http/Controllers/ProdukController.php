<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::query()->get();
        return view('dashboard.products.index', ['title' => 'Products', 'produk2' => $produk]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::query()->get();
        return view('dashboard.products.create', ['title' => 'Create Product', 'kategori2' => $kategori]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kode_kategori = Kategori::query()->where('nama', $request->kategori)->first()->kode;
        $imageName = time().'.'.$request->file('gambar')->extension();
        $gambar = 'img/' . $imageName;
        $request->file('gambar')->move(public_path('img'), $imageName);
        $produk = [
            'kode' => $request->kode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'kode_kategori' => $kode_kategori,
            'gambar' => $gambar,
        ];
        Produk::query()->create($produk);
        return redirect('/dashboard/products')->with('success', 'Product has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $kode): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('product-detail', ['produk' => Produk::query()->where('kode', $kode)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::query()->get();
        $produk = Produk::query()->where('kode', $id)->first();
        return view('dashboard.products.edit', ['title' => 'Edit Product', 'kategori2' => $kategori, 'produk' => $produk]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kode_kategori = Kategori::query()->where('nama', $request->kategori)->first()->kode;
        $imageName = time().'.'.$request->file('gambar')->extension();
        $request->file('gambar')->move(public_path('img'), $imageName);
        $gambar = 'img/' . $imageName;

//        if (File::exists(public_path($gambar))) {
//            File::delete(public_path($gambar));
//        }
        $old_image = Produk::query()->where('kode', $id)->first()->gambar;
        if (File::exists(public_path($old_image))) {
            File::delete(public_path($old_image));
        }
        $produk = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'kode_kategori' => $kode_kategori,
            'gambar' => $gambar,
        ];
        Produk::query()->where('kode', $id)->update($produk);
        return redirect('/dashboard/products')->with('success', 'Product has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $old_image = Produk::query()->where('kode', $id)->first()->gambar;
        if (File::exists(public_path($old_image))) {
            File::delete(public_path($old_image));
        }
        Produk::query()->where('kode', $id)->delete();
        return redirect('/dashboard/products')->with('success', 'Product has been deleted!');
    }
}
