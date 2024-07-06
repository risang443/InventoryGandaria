<?php

namespace App\Http\Controllers;

use App\Models\InputBarang;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class InputBarangController extends Controller
{
    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('layout.stokbarang.inputform', compact('products', 'suppliers'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_barang' => 'required|exists:products,id',
            'suppliers_id' => 'required|exists:suppliers,id',
            'store' => 'required|integer',
            'tanggal_input' => 'required|date',
            'keterangan' => 'required|string',
            'fotoInvoiceInput' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        DB::transaction(function () use ($request, $validatedData) {
            // Mengambil stok sebelumnya dari produk
            $product = Product::find($request->id_barang);
            $stock = $product->stok;
    
            // Ambil nilai 'store' yang sesuai dari tabel input_barang
            $previousStore = 0;
    
            // Perbarui stok dengan rumus yang benar
            $stock = ($stock - $previousStore) + $request->store;
    
            // Mengunggah gambar jika ada
            if ($request->hasFile('fotoInvoiceInput')) {
                $filePath = $request->file('fotoInvoiceInput')->store('images');
                $validatedData['fotoInvoiceInput'] = $filePath;
            } else {
                $validatedData['fotoInvoiceInput'] = 'Tidak memiliki Gambar'; // Set default message
            }
    
            // Tambahkan data ke tabel input_barang dan simpan nilai stock
            InputBarang::create(array_merge($validatedData, ['stock' => $stock]));
    
            // Update stok di tabel products
            $product->stok = $stock;
            $product->save();
        });
    
        return redirect()->route('input-barang.index')->with('alert', 'Data input barang berhasil ditambahkan dan stok diperbarui.');
    }
    

    public function edit($id)
    {
        $inputBarang = InputBarang::findOrFail($id);
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('layout.stokbarang.editforminput', compact('inputBarang', 'products', 'suppliers'));
    }

    public function update(Request $request, $id)
{
    // Validasi input
    $validatedData = $request->validate([
        'id_barang' => 'required|exists:products,id',
        'suppliers_id' => 'required|exists:suppliers,id',
        'store' => 'required|integer',
        'tanggal_input' => 'required|date',
        'keterangan' => 'required|string',
        'fotoInvoiceInput' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    DB::transaction(function () use ($request, $id, $validatedData) {
        // Mengambil data input sebelumnya
        $inputBarang = InputBarang::findOrFail($id);
        $product = Product::find($request->id_barang);
        $stock = $product->stok;

        // Ambil nilai 'store' yang sesuai dari tabel input_barang
        $previousStore = InputBarang::where('id',$inputBarang->id)->value('store');
        

        // Perbarui stok dengan rumus yang benar
        $stock = ($stock - $previousStore) + $request->store;

        // Mengunggah gambar jika ada
        if ($request->hasFile('fotoInvoiceInput')) {
            if ($inputBarang->fotoInvoiceInput && $inputBarang->fotoInvoiceInput != 'Tidak memiliki Gambar') {
                Storage::delete($inputBarang->fotoInvoiceInput);
            }
            $filePath = $request->file('fotoInvoiceInput')->store('images');
            $validatedData['fotoInvoiceInput'] = $filePath;
        } else {
            $validatedData['fotoInvoiceInput'] = $inputBarang->fotoInvoiceInput;
        }

        // Update data di tabel input_barang
        $inputBarang->update(array_merge($validatedData, ['stock' => $stock]));
    
        // Update stok di tabel products
        $product->stok = $stock;
        $product->save();
    });

    return redirect()->route('input-barang.index')->with('alert', 'Data input barang berhasil diperbarui dan stok diperbarui.');
}


    public function index()
    {
        $inputBarang = InputBarang::with('product', 'supplier')->get();
        return view('layout.stokbarang.inputlist', compact('inputBarang'));
    }
}
