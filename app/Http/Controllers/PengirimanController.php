<?php

namespace App\Http\Controllers;

use App\Models\JasaPengiriman;
use App\Models\Pembayaran;
use App\Models\Pengiriman;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengiriman = Pengiriman::query()->get();
        return view('dashboard.deliveries.index', ['title' => 'Deliveries', 'pengiriman2' => $pengiriman]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jasa = JasaPengiriman::query()->get();
        return view('dashboard.deliveries.create', ['title' => 'Create Delivery', 'jasa2' => $jasa]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kode_jasa = JasaPengiriman::query()->where('nama', $request->jasa)->first()->kode;
        $pengiriman = [
            'id_pesanan' => $request->id_pesanan,
            'tanggal' =>  $request->tanggal,
            'kode_jasa' => $kode_jasa,
            'invoice' => $request->invoice,
        ];
        Pengiriman::query()->create($pengiriman);
        return redirect('/dashboard/deliveries')->with('success', 'Delivery has been created!');
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
        $jasa = JasaPengiriman::query()->get();
        $pengiriman = Pengiriman::query()->where('id', $id)->first();
        return view('dashboard.deliveries.edit', ['title' => 'Edit Delivery', 'jasa2' => $jasa, 'pengiriman' => $pengiriman]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kode_jasa = JasaPengiriman::query()->where('nama', $request->jasa)->first()->kode;
        $pengiriman = [
            'kode_jasa' => $kode_jasa,
        ];
        Pengiriman::query()->where('id', $id)->update($pengiriman);
        return redirect('/dashboard/deliveries')->with('success', 'Delivery has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pengiriman::query()->where('id', $id)->delete();
        return redirect('/dashboard/deliveries')->with('success', 'Delivery has been deleted!');
    }
}
