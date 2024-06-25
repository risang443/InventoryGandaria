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
    public function index()
    {
        $suppliers = Supplier::all();

        // Mengirim data ke view 'supplier.index'
        return view('layout.dataorang.SuplierList', compact('suppliers'));
    }
}
