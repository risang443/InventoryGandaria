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

    // Contoh dalam store method di controller InputBarangController
public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'id_barang' => 'required|exists:products,id',
        'suppliers_id' => 'required|exists:suppliers,id',
        'jumlah' => 'required|integer',
        'tanggal_input' => 'required|date',
        'keterangan' => 'required|string',
        'fotoInvoiceInput' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Mengambil stok sebelumnya dari produk
    $product = Product::findOrFail($request->id_barang);
    $stokSebelum = $product->stok;

    // Menghitung stok sesudah
    $stokSesudah = $stokSebelum + $request->jumlah;

    // Mengunggah gambar jika ada
    if ($request->hasFile('fotoInvoiceInput')) {
        $filePath = $request->file('fotoInvoiceInput')->store('images');
        $validatedData['fotoInvoiceInput'] = $filePath;
    } else {
        $validatedData['fotoInvoiceInput'] = 'Tidak memiliki Gambar'; // Set default message
    }

    // Tambahkan data ke tabel input_barang
    InputBarang::create(array_merge($validatedData, [
        'stok_sebelum' => $stokSebelum,
        'stok_sesudah' => $stokSesudah,
    ]));

    // Update stok di tabel products
    $product->stok = $stokSesudah;
    $product->save();

    return redirect()->route('input-barang.index')->with('alert', 'Data input barang berhasil ditambahkan dan stok diperbarui.');
}


    public function index()
    {
        $inputBarang = InputBarang::with('product', 'supplier')->get();
        return view('layout.stokbarang.inputlist', compact('inputBarang'));
    }
}
