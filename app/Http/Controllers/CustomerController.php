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
    public function index()
    {
        $customers = Costumer::all(); // Mengambil semua data customer dari tabel

        return view('layout.dataorang.CostumerList', compact('customers'));
    }
}
