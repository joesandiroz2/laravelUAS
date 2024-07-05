<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pengguna;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Status;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $pesanan = Pesanan::query()->get();

        return view('dashboard.orders.index', ['title' => 'Orders', 'pesanan2' => $pesanan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $status = Status::query()->where('kategori', 'Pesanan')->get();
        return view('dashboard.orders.create', ['title' => 'Create Order', 'status2' => $status]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $userId = Pengguna::query()->where('email', $request->email)->first()->id;
        $cekPesanan = Pesanan::query()->where('id_pengguna', $userId)->where('kode_status', 'CRT')->first();

        $pesanan = [
            'id_pengguna' => $userId,
            'tanggal' => date('Y-m-d H:i:s'),
            'total_harga' => 0,
            'kode_status' => 'CRT',
        ];
        if (empty($cekPesanan)) {
            $id_pesanan = Pesanan::query()->create($pesanan)->id;
        } else {
            $id_pesanan = $cekPesanan->id;
            Pesanan::query()->where('id', '=', $id_pesanan)->update(['tanggal' => date('Y-m-d H:i:s')]);
        }

        $pesananDetail = [
            'id_pesanan' => $id_pesanan,
            'kode_produk' => $request->kode_produk,
            'jumlah' => 1,
            'harga' => $request->harga,
        ];

        $cekPesananDetail = PesananDetail::query()->where('id_pesanan', $id_pesanan)->where('kode_produk', $request->kode_produk)->first();
        if (empty($cekPesananDetail)) {
            PesananDetail::query()->create($pesananDetail);
        } else {
            PesananDetail::query()->where('id', $cekPesananDetail->id)->update(['jumlah' => $cekPesananDetail->jumlah + 1]);
        }

        $cart_sum = $this->getCartSum($id_pesanan);
        $this->updateCartSum($id_pesanan, $cart_sum['subtotal']);
        return response()->json(['message' => 'Cart added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $pesanan_detail = PesananDetail::query()->where('id_pesanan', $id)->get();
        $cart = $this->getCartSum($id);
        return view('dashboard.orders.show', ['title' => 'Orders Detail', 'pesanan_detail' => $pesanan_detail, 'cart' => $cart]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $pesanan = Pesanan::query()->where('id', $id)->first();
        $status = Status::query()->get();
        return view('dashboard.orders.edit', ['title' => 'Edit Orders', 'pesanan' => $pesanan, 'status2' => $status]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $kode_status = Status::query()->where('nama', $request->status)->first()->kode;
        Pesanan::query()->where('id', $id)->update(['kode_status' => $kode_status, 'tanggal' => $request->tanggal]);
        return redirect('/dashboard/orders')->with('success', 'Order has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        Pesanan::query()->where('id', $id)->delete();
        return redirect('/dashboard/orders')->with('success', 'Order has been deleted!');
    }

    private function getCartSum(int $id_pesanan): array
    {
        $subtotal = 0;
        $orders = PesananDetail::query()->where('id_pesanan', $id_pesanan)->get();
        foreach ($orders as $order) {
            $subtotal = $order->jumlah * $order->produk->harga + $subtotal;
        }

        $tax = ($subtotal * 0.5) / 100;
        $total = $subtotal + $tax;
        return [
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total,
        ];
    }
    private function updateCartSum(int $id_pesanan, int $subtotal): void
    {
        Pesanan::query()->where('id', $id_pesanan)->update(['total_harga' => $subtotal]);
    }

    public function isCartExists(): JsonResponse
    {
        $id_pengguna = Pengguna::query()->where('email', session('userEmail'))->first()->id;
        $pesanan = Pesanan::query()->where('id_pengguna', $id_pengguna)->where('kode_status', 'CRT')->first();
        if ($pesanan == null) {
            $isCartExists = false;
            return response()->json(['isCartExists' => $isCartExists]);
        }
        $orders = PesananDetail::query()->where('id_pesanan', $pesanan->id)->get();
        $orders->count() > 0 ? $isCartExists = true : $isCartExists = false;
        return response()->json(['isCartExists' => $isCartExists]);
    }

    public function getCarts(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $id_pengguna = Pengguna::query()->where('email', session('userEmail'))->first()->id;
        $pesanan = Pesanan::query()->where('id_pengguna', $id_pengguna)->where('kode_status', 'CRT')->first();
        if (empty($pesanan)) {
            return view('cart', [
                'payment' => null,
                'orders' => collect(),
                'subtotal' => 0,
                'tax' => 0,
                'total' => 0,
            ]);
        }
        $id_pesanan = $pesanan->id;
        $subtotal = 0;

        $orders = PesananDetail::query()->where('id_pesanan', $id_pesanan)->get();
        foreach ($orders as $order) {
            $subtotal = $order->jumlah * $order->produk->harga + $subtotal;
        }

        $tax = ($subtotal * 0.5) / 100;
        $total = $subtotal + $tax;
        $payment = Pembayaran::query()->where('id_pesanan', $id_pesanan)->first();
        $data = [
            'payment' => $payment,
            'orders' => $orders,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total,
        ];
        return view('cart', $data);
    }

    public function addCartQty(Request $request): JsonResponse
    {
        $id_pesanan = $request->id_pesanan;
        $id = $request->id;
        $pesananDetail = PesananDetail::query()->where('id_pesanan', $id_pesanan)->where('id', $id)->first();
        $pesananDetail->update(['jumlah' => $pesananDetail->jumlah + 1]);
        $cart_sum = $this->getCartSum($id_pesanan);
        $this->updateCartSum($id_pesanan, $cart_sum['subtotal']);
        return response()->json($cart_sum);
    }

    public function minCartQty(Request $request): JsonResponse
    {
        $id_pesanan = $request->id_pesanan;
        $id = $request->id;
        $pesananDetail = PesananDetail::query()->where('id_pesanan', $id_pesanan)->where('id', $id)->first();
        $pesananDetail->update(['jumlah' => $pesananDetail->jumlah - 1]);
        $cart_sum = $this->getCartSum($id_pesanan);
        $this->updateCartSum($id_pesanan, $cart_sum['subtotal']);
        return response()->json($cart_sum);
    }

    public function delCart(Request $request): JsonResponse
    {
        $id_pesanan = $request->id_pesanan;
        $id = $request->id;
        $pesananDetail = PesananDetail::query()->where('id', $id)->first();
        $pesananDetail->delete();
        $this->updateCartSum($id_pesanan, $this->getCartSum($id_pesanan)['subtotal']);
        return response()->json(['message' => 'Success']);
    }

    public function getOrders(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $id_pengguna = Pengguna::query()->where('email', session('userEmail'))->first()->id;
        $pesanan = Pesanan::query()->where('id_pengguna', $id_pengguna)->get();
        if (empty($pesanan)) {
            return view('cart', [
                'pesanan2' => collect(),
            ]);
        }
        return view('orders', [
            'pesanan2' => $pesanan,
        ]);
    }
}
