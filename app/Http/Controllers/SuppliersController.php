<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuppliersRequest;
use App\Http\Requests\UpdateSuppliersRequest;
use App\Models\Suppliers;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Suppliers::all();
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSuppliersRequest $request)
    {
        Suppliers::create($request->only('name', 'address', 'phone', 'email'));
        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Suppliers $suppliers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suppliers $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
        
    }

    public function update(UpdateSuppliersRequest $request, Suppliers $supplier)
    {
        $supplier->update($request->only('name', 'address', 'phone', 'email'));
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suppliers $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil dihapus.');
    }
}
