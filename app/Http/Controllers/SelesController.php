<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSelesRequest;
use App\Http\Requests\UpdateSelesRequest;
use App\Models\Seles;
use App\Models\Suppliers;

class SelesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seles = Seles::with('supplier')->latest()->get();
        return view('seles.index', compact('seles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Suppliers::all();
        return view('seles.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSelesRequest $request)
    {
        Seles::create($request->only('supplier_id', 'total'));
        return redirect()->route('seles.index')->with('success', 'Seles berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seles $sele)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seles $sele)
    {
        $suppliers = Suppliers::all();
        return view('seles.edit', compact('sele', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSelesRequest $request, Seles $sele)
    {
        $sele->update($request->only('supplier_id', 'total'));
        return redirect()->route('seles.index')->with('success', 'Seles berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seles $sele)
    {
        $sele->delete();
        return redirect()->route('seles.index')->with('success', 'Seles berhasil dihapus.');
    }
}
