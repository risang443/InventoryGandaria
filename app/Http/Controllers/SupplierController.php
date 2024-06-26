<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //
    public function create()
    {
        return view('layout.dataorang.InputSuplier');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'notelp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'namaperusahaan' => 'required|string|max:255',
        ]);

        Supplier::create($validatedData);

        return redirect()->route('suppliers.index')->with('alert', 'Data supplier berhasil ditambahkan.');
    }

    public function edit($id)
{
    $supplier = Supplier::findOrFail($id);
    return view('layout.dataorang.InputSuplier', compact('supplier'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'notelp' => 'required|string|max:20',
        'alamat' => 'required|string',
        'namaperusahaan' => 'required|string|max:255',
    ]);

    $supplier = Supplier::findOrFail($id);
    $supplier->update($validatedData);

    return redirect()->route('suppliers.index')->with('alert1', 'Data supplier berhasil diupdate.');
}


    public function index()
    {
        $suppliers = Supplier::all();

        // Mengirim data ke view 'supplier.index'
        return view('layout.dataorang.SuplierList', compact('suppliers'));
    }
}
