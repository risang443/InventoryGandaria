<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'equired|string|unique:products',
            'namabarang' => 'equired|string',
            'kategori_id' => 'equired|exists:categories,id',
            'harga' => 'equired|integer',
            'ketersedian' => 'equired|in:tersedia,tidak_tersedia',
            'tok' => 'equired|integer|min:0',
        ]);

        $product = new Product();
        $product->id_barang = $request->id_barang;
        $product->namabarang = $request->namabarang;
        $product->kategori_id = $request->kategori_id;
        $product->harga = $request->harga;
        $product->ketersedian = $request->ketersedian;
        $product->stok = $request->stok;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product berhasil ditambahkan.');
    }

    public function updateKetersediaan(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $ketersediaan = $request->input('ketersediaan');

        if (!in_array($ketersediaan, ['tersedia', 'tidak_tersedia'])) {
            return response()->json(['error' => 'Invalid ketersediaan value'], 422);
        }

        $product->ketersediaan = $ketersediaan;
        $product->save();

        return response()->json(['message' => 'Ketersediaan updated successfully']);
    }

    public function Index()
    {
        $variable = product::with("kategori")->get();

        return view("layout.databarang.tabelbarang", compact("variable"));
    }
}