<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Anomalies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class OpnameController extends Controller
{
    public function index()
    {
        // Mengambil semua data anomali barang dari tabel opname dan menghubungkan dengan tabel products
        $opnames = Anomalies::with('product')->get();

        // Mengembalikan view dan mengirimkan data anomali barang
        return view('layout.stokbarang.anomalibarang', compact('opnames'));
    }

    public function create()
    {
        // Mengambil semua data produk untuk dropdown
        $products = Product::all();

        // Mengembalikan view dan mengirimkan data produk
        return view('layout.stokbarang.formanomali', compact('products'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_barang' => 'required|exists:products,id',
            'status' => 'required|string',
            'store' => 'required|integer',
            'occurred_at' => 'required|date',
            'keterangan' => 'required|string',
        ]);
    
        DB::transaction(function () use ($request, $validatedData) {
            // Mengambil stok sebelumnya dari produk
            $product = Product::find($request->id_barang);
            $stock = $product->stok;
    
            // Ambil nilai 'store' yang sesuai dari tabel output_barang
            $previousStore = 0;
    
            // Perbarui stok dengan rumus yang benar
            $stock = ($stock + $previousStore)-$request->store;

            // Tambahkan data ke tabel output_barang dan simpan nilai stock
            Anomalies::create(array_merge($validatedData, ['stock' => $stock]));
    
            // Update stok di tabel products
            $product->stok = $stock;
            $product->save();
        });
    
        return redirect()->route('opname.index')->with('alert', 'Data output barang berhasil ditambahkan dan stok diperbarui.');
    }

    public function edit($id)
    {
        $anomalies = Anomalies::findOrFail($id);
        $products = Product::all();
        return view('layout.stokbarang.editopnamebarang', compact('anomalies', 'products'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input form
        $validatedData = $request->validate([
            'id_barang' => 'required|exists:products,id',
            'status' => 'required|string',
            'store' => 'required|integer',
            'occurred_at' => 'required|date',
            'keterangan' => 'required|string',
        ]);

        DB::transaction(function () use ($request, $id, $validatedData) {
            // Mengambil data output sebelumnya
            $opname = Anomalies::findOrFail($id);
            $product = Product::find($request->id_barang);
            $stock = $product->stok;

            // Ambil nilai 'store' yang sesuai dari tabel output_barang
            $previousStore = Anomalies::where('id', $opname->id)->value('store');
            
            // Perbarui stok dengan rumus yang benar
            $stock = ($stock + $previousStore) - $request->store;

            // Update data di tabel output_barang
            $opname->update(array_merge($validatedData, ['stock' => $stock]));
        
            // Update stok di tabel products
            $product->stok = $stock;
            $product->save();
        });

        return redirect()->route('opname.index')->with('alert', 'Data output barang berhasil diperbarui dan stok diperbarui.');
    }

    public function exportPdf()
    {
        $anomalies = Anomalies::with('product')->get();
        
        $pdf = PDF::loadView('pdf.anomaliPDF', compact('anomalies'));
        
        return $pdf->download('anomalies.pdf');
    }
}
