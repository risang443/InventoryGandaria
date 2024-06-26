<?php

namespace App\Http\Controllers;

use App\Models\Costumer; // Pastikan menggunakan nama model yang sesuai
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create()
    {
        return view('layout.dataorang.InputCustomer');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'notelp' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        Costumer::create($validatedData);

        return redirect()->route('customers.index')->with('alert', 'Customer berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $customer = Costumer::findOrFail($id);
        return view('layout.dataorang.InputCustomer', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'notelp' => 'required|string|max:20',
            'alamat' => 'required|string',
        ]);

        $customer = Costumer::findOrFail($id);
        $customer->update($validatedData);

        return redirect()->route('customers.index')->with('alert1', 'Data customer berhasil diupdate.');
    }
    public function index()
    {
        $customers = Costumer::all(); // Mengambil semua data customer dari tabel

        return view('layout.dataorang.CostumerList', compact('customers'));
    }
}
