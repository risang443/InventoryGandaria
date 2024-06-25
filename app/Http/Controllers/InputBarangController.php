<?php

namespace App\Http\Controllers;

use App\Models\InputBarang;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InputBarangController extends Controller
{
    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('layout.stokbarang.inputform', compact('products','suppliers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_barang' => 'required|exists:products,id',
            'suppliers_id' => 'required|exists:suppliers,id',
            'jumlah' => 'required|integer',
            'tanggal_input' => 'required|date',
            'keterangan' => 'required|string',
            'fotoInvoiceInput' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mengunggah gambar jika ada
        if ($request->hasFile('fotoInvoiceInput')) {
            $filePath = $request->file('fotoInvoiceInput')->store('images', 'public');
            $validatedData['fotoInvoiceInput'] = $filePath;
        } else {
            $validatedData['fotoInvoiceInput'] = 'Tidak memiliki Gambar'; // Set default message
        }

        // Tambahkan data ke tabel input_barang
        InputBarang::create($validatedData);

        // Update stok di tabel products
        $product = Product::find($request->id_barang);
        $product->stok += $request->jumlah;
        $product->save();

        return redirect()->route('input-barang.index')->with('alert', 'Data input barang berhasil ditambahkan dan stok diperbarui.');
    }

    public function index()
    {
        $inputBarang = InputBarang::with('product', 'supplier')->get();
        return view('layout.stokbarang.inputlist', compact('inputBarang'));
    }
}
