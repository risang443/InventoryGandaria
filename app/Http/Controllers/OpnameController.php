<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Anomalies;
use Illuminate\Http\Request;
use PDF;
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
        // Validasi input form
        $request->validate([
            'id_barang' => 'required|exists:products,id',
            'status' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'occurred_at' => 'required|date',
            'keterangan' => 'required|string',
        ]);

        // Mengambil produk yang terkait
        $product = Product::find($request->id_barang);

        // Mengurangi stok produk
        $product->stok -= $request->quantity;
        $product->save();

        // Membuat entri baru di tabel opname
        Anomalies::create([
            'id_barang' => $request->id_barang,
            'status' => $request->status,
            'quantity' => $request->quantity,
            'occurred_at' => $request->occurred_at,
            'keterangan' => $request->keterangan,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('opname.index')->with('success', 'Anomali barang berhasil dilaporkan.');
    }


    public function exportPdf()
    {
        $anomalies = Anomalies::with('product')->get();
        
        $pdf = PDF::loadView('pdf.anomaliPDF', compact('anomalies'));
        
        return $pdf->download('anomalies.pdf');
    }
}
