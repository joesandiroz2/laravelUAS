<?php

namespace App\Http\Controllers;

use App\Models\JasaPengiriman;
use Illuminate\Http\Request;

class JasaPengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jasa = JasaPengiriman::query()->get();
        return view('dashboard.delivery-services.index', ['title' => 'Jasa Pengiriman', 'jasa2' => $jasa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.delivery-services.create', ['title' => 'Create Jasa']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jasa = [
            'kode' => $request->kode,
            'nama' => $request->nama,
        ];
        JasaPengiriman::query()->create($jasa);
        return redirect('/dashboard/delivery-services')->with('success', 'Jasa Pengiriman has been created!');
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
        $jasa = JasaPengiriman::query()->where('kode', $id)->first();
        return view('dashboard.delivery-services.edit', ['title' => 'Edit Jasa Pengiriman', 'jasa' => $jasa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jasa = [
            'nama' => $request->nama,
        ];
        JasaPengiriman::query()->where('kode', $id)->update($jasa);
        return redirect('/dashboard/delivery-services')->with('success', 'Jasa Pengiriman has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        JasaPengiriman::query()->where('kode', $id)->delete();
        return redirect('/dashboard/delivery-services')->with('success', 'Jasa Pengiriman has been deleted!');
    }
}
