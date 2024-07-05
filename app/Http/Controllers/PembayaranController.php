<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = Pembayaran::query()->get();
        return view('dashboard.payments.index', ['title' => 'Payments', 'pembayaran2' => $pembayaran]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.payments.create', ['title' => 'Create Payment']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pembayaran = [
            'id_pesanan' => $request->id_pesanan,
            'tanggal' => $request->tanggal,
            'kode_metode' => $request->kode_metode,
            'total_harga' => $request->total_harga,
            'link' => $request->link,
            'status' => $request->status,
            'metode' => $request->metode,
            'token' => $request->token,
            'midtrans_id' => $request->midtrans_id,
        ];
        Pembayaran::query()->create($pembayaran);
        return redirect('/dashboard/payments')->with('success', 'Payment has been created!');
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
        $pembayaran = Pembayaran::query()->where('id', $id)->first();
        return view('dashboard.payments.edit', ['title' => 'Edit Payment', 'pembayaran' => $pembayaran]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pembayaran = [
            'id_pesanan' => $request->id_pesanan,
            'tanggal' =>  $request->tanggal,
            'kode_metode' => $request->kode_metode,
            'total_harga' => $request->total_harga,
            'link' => $request->link,
            'status' => $request->status,
            'metode' => $request->metode,
            'token' => $request->token,
            'midtrans_id' => $request->midtrans_id,
        ];
        Pembayaran::query()->where('id', $id)->update($pembayaran);
        return redirect('/dashboard/payments')->with('success', 'Payment has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pembayaran::query()->where('id', $id)->delete();
        return redirect('/dashboard/payments')->with('success', 'Payment has been deleted!');
    }

    public function checkout(Request $request)
    {
        $pembayaran = [
            'id_pesanan' => $request->id_pesanan,
            'tanggal' => date('Y-m-d H:i:s'),
            'kode_metode' => null,
            'total_harga' => $request->total_harga,
            'link' => $request->link,
            'status' => $request->status,
            'metode' => $request->metode,
            'token' => $request->token,
            'midtrans_id' => $request->midtrans_id,
        ];
        Pembayaran::query()->create($pembayaran);
        return response()->json(['message' => 'success']);
    }
    public function updStatus(Request $request)
    {
        Pembayaran::query()->where('id', $request->id)->update(['status' => $request->status, 'metode' => $request->metode]);
        Pesanan::query()->where('id', $request->id_pesanan)->update(['kode_status' => 'DFT']);
        return response()->json(['message' => 'success']);
    }
}
