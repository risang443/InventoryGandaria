<?php

namespace App\Http\Controllers;

use App\Models\OutputBarang;
use App\Models\Product;
use App\Models\Costumer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
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
        // Validasi input
        $validatedData = $request->validate([
            'id_barang' => 'required|exists:products,id',
            'costumers_id' => 'required|exists:costumers,id',
            'store' => 'required|integer',
            'tanggal_output' => 'required|date',
            'keterangan' => 'required|string',
            'fotoInvoiceOutput' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);  
        DB::transaction(function () use ($request, $validatedData) {
            // Mengambil stok sebelumnya dari produk
            $product = Product::find($request->id_barang);
            $stock = $product->stok;           
            // Ambil nilai 'store' yang sesuai dari tabel output_barang
            $previousStore = 0;   
            // Perbarui stok dengan rumus yang benar
            $stock = ($stock + $previousStore)-$request->store;  
            // Mengunggah gambar jika ada
            if ($request->hasFile('fotoInvoiceOutput')) {
                $filePath = $request->file('fotoInvoiceOutput')->store('images');
                $validatedData['fotoInvoiceOutput'] = $filePath;
            } else {
                $validatedData['fotoInvoiceOutput'] = 'Tidak memiliki Gambar'; // Set default message
            }   
            // Tambahkan data ke tabel output_barang dan simpan nilai stock
            OutputBarang::create(array_merge($validatedData, ['stock' => $stock]));    
            // Update stok di tabel products
            $product->stok = $stock;
            $product->save();
        });
        return redirect()->route('output-barang.index')->with('alert', 'Data output barang berhasil ditambahkan dan stok diperbarui.');
    }
    public function edit($id)
    {
        $outputBarang = OutputBarang::findOrFail($id);
        $products = Product::all();
        $costumers = Costumer::all();
        return view('layout.stokbarang.editformoutput', compact('outputBarang', 'products', 'costumers'));
    }
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_barang' => 'required|exists:products,id',
            'costumers_id' => 'required|exists:costumers,id',
            'store' => 'required|integer',
            'tanggal_output' => 'required|date',
            'keterangan' => 'required|string',
            'fotoInvoiceOutput' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        DB::transaction(function () use ($request, $id, $validatedData) {
            // Mengambil data output sebelumnya
            $outputBarang = OutputBarang::findOrFail($id);
            $product = Product::find($request->id_barang);
            $stock = $product->stok;
            // Ambil nilai 'store' yang sesuai dari tabel output_barang
            $previousStore = OutputBarang::where('id', $outputBarang->id)->value('store');
            // Perbarui stok dengan rumus yang benar
            $stock = ($stock + $previousStore) - $request->store;
            // Mengunggah gambar jika ada
            if ($request->hasFile('fotoInvoiceOutput')) {
                if ($outputBarang->fotoInvoiceOutput && $outputBarang->fotoInvoiceOutput != 'Tidak memiliki Gambar') {
                    Storage::delete($outputBarang->fotoInvoiceOutput);
                }
                $filePath = $request->file('fotoInvoiceOutput')->store('images');
                $validatedData['fotoInvoiceOutput'] = $filePath;
            } else {
                $validatedData['fotoInvoiceOutput'] = $outputBarang->fotoInvoiceOutput;
            }
            // Update data di tabel output_barang
            $outputBarang->update(array_merge($validatedData, ['stock' => $stock]));
            // Update stok di tabel products
            $product->stok = $stock;
            $product->save();
        });

        return redirect()->route('output-barang.index')->with('alert1', 'Data output barang berhasil diperbarui dan stok diperbarui.');
    }
    public function index()
    {
        $outputBarang = OutputBarang::with('product', 'customer')->get();
        return view('layout.stokbarang.outputlist', compact('outputBarang'));
    }
}
