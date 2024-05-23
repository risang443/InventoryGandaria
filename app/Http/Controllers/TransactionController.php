<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('product')->get();
        return response()->json($transactions);
    }

    public function store(Request $request)
    {
        $transaction = Transaction::create($request->all());
        
        $product = Product::findOrFail($request->product_id);
        if ($request->type == 'in') {
            $product->quantity += $request->quantity;
        } else {
            $product->quantity -= $request->quantity;
        }
        $product->save();

        return response()->json($transaction);
    }

    public function show($id)
    {
        $transaction = Transaction::with('product')->findOrFail($id);
        return response()->json($transaction);
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        
        $product = Product::findOrFail($transaction->product_id);
        if ($transaction->type == 'in') {
            $product->quantity -= $transaction->quantity;
        } else {
            $product->quantity += $transaction->quantity;
        }
        $product->save();

        $transaction->delete();
        return response()->json('Transaction deleted successfully');
    }
}
