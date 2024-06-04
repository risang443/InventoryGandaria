<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'namabarang' => 'required|string|max:255',
            'kategori_id' => 'required|integer',
            'harga' => 'required|integer',
            'ketersediaan' => 'required|string|in:tersedia,tidak_tersedia',
            'stok' => 'required|integer',
        ]);

        $product = new Product();
        $product->namabarang = $request->namabarang;
        $product->kategori_id = $request->kategori_id;
        $product->harga = $request->harga;
        $product->ketersediaan = $request->ketersediaan; // Correct field name
        $product->stok = $request->stok;
        $product->save();

        return redirect()->back()->with('success', 'Sukses Menambah barang');
    }

    public function edit($id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);

        // Return the view with the product data
        return view('layout.databarang.formupdatebarang', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namabarang' => 'required|string|max:255',
            'kategori_id' => 'required|integer',
            'harga' => 'required|integer',
            'ketersediaan' => 'required|string|in:tersedia,tidak_tersedia', // Correct field name
            'stok' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);
        $product->namabarang = $request->namabarang;
        $product->kategori_id = $request->kategori_id;
        $product->harga = $request->harga;
        $product->ketersediaan = $request->ketersediaan; // Correct field name
        $product->stok = $request->stok;
        $product->save();

        return redirect()->back()->with('success', 'Sukses Mengupdate barang');
    }

    public function index()
    {
        $barang = Product::with("kategori")->get();

        return view("layout.databarang.tabelbarang", compact("barang"));
    }
}
