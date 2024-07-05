<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = Status::query()->get();
        return view('dashboard.statuses.index', ['title' => 'Status', 'status2' => $status]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.statuses.create', ['title' => 'Create Status']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $status = [
            'kode' => $request->kode,
            'nama' => $request->nama,
        ];
        Status::query()->create($status);
        return redirect('/dashboard/statuses')->with('success', 'Status has been created!');
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
        $status = Status::query()->where('kode', $id)->first();
        return view('dashboard.statuses.edit', ['title' => 'Edit Status', 'status' => $status]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $status = [
            'nama' => $request->nama,
        ];
        Status::query()->where('kode', $id)->update($status);
        return redirect('/dashboard/statuses')->with('success', 'Status has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Status::query()->where('kode', $id)->delete();
        return redirect('/dashboard/statuses')->with('success', 'Status has been deleted!');
    }
}
