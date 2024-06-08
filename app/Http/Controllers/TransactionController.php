<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function addStock(Request $request)
{
    $request->validate([
        'id_barang' => 'required|exists:products,id',
        'tipe' => 'required|in:masuk',
        'stok' => 'required|integer|min:1',
    ]);

    $product = Product::findOrFail($request->id_barang);
    $product->stok += $request->stok;
    $product->save();

    Transaction::create([
        'id_barang' => $request->id_barang,
        'tipe' => $request->tipe,
        'stok' => $request->stok,
        'tanggalTransaksi' => now(),
    ]);

    return redirect()->back()->with('success', 'Stok berhasil ditambah.');
}

public function reduceStock(Request $request)
{
    $request->validate([
        'id_barang' => 'required|exists:products,id',
        'tipe' => 'required|in:keluar',
        'stok' => 'required|integer|min:1',
    ]);

    $product = Product::findOrFail($request->id_barang);
    $currentStock = $product->stok;

    if ($currentStock < $request->stok) {
        return redirect()->back()->with('error', 'Stok tidak mencukupi.');
    }

    $product->stok -= $request->stok;
    $product->save();

    Transaction::create([
        'id_barang' => $request->id_barang,
        'tipe' => $request->tipe,
        'stok' => $request->stok,
        'tanggalTransaksi' => now(),
    ]);

    return redirect()->back()->with('success', 'Stok berhasil dikurangi.');
}


    public function indextransaksi()
    {
        $barang = Product::with("kategori")->get();

        return view("layout.stokbarang.stokbarang", compact("barang"));
    }
    
    public function index()
    {
        // Mengambil total stok sepatu yang ada
        $totalStock = Product::sum('stok');
        $totalJenisSepatu = Product::count();
         // Mengambil jumlah produk yang stoknya hampir habis (lebih dari 0 tapi kurang dari 10)
         $almostOutOfStock = Product::where('stok', '>', 0)->where('stok', '<', 10)->count();
        $outOfStock = Product::where('stok', '=', 0)->count();

        return view('layout.dashboard', compact('totalStock', 'totalJenisSepatu', 'almostOutOfStock', 'outOfStock'));
    }
}