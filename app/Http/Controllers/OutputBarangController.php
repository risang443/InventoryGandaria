<?php

namespace App\Http\Controllers;

use App\Models\OutputBarang;
use App\Models\Product;
use App\Models\Costumer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OutputBarangController extends Controller
{
    public function create()
    {
        $products = Product::all();
        $costumers = Costumer::all();
        return view('layout.stokbarang.outputform', compact('products', 'costumers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_barang' => 'required|exists:products,id',
            'costumers_id' => 'required|exists:costumers,id',
            'jumlah' => 'required|integer',
            'tanggal_output' => 'required|date',
            'keterangan' => 'required|string',
            'fotoInvoiceOutput' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mengunggah gambar jika ada
        if ($request->hasFile('fotoInvoiceOutput')) {
            $filePath = $request->file('fotoInvoiceOutput')->store('images','public');
            $validatedData['fotoInvoiceOutput'] = $filePath;
        } else {
            $validatedData['fotoInvoiceOutput'] = 'Tidak memiliki Gambar';
        }
        

        // Tambahkan data ke tabel output_barang
        OutputBarang::create($validatedData);

        // Update stok di tabel products
        $product = Product::find($request->id_barang);
        $product->stok -= $request->jumlah;
        $product->save();

        return redirect()->route('output-barang.index')->with('alert', 'Data output barang berhasil ditambahkan dan stok diperbarui.');
    }

    public function index()
    {
        $outputBarang = OutputBarang::with('product', 'customer')->get();
        return view('layout.stokbarang.outputlist', compact('outputBarang'));
    }
}

