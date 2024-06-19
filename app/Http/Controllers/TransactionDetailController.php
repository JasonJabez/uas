<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
{
    public function index()
    {
        $transactionDetails = TransactionDetail::with('transaction', 'product')->get();
        return view('transaction_details.index', compact('transactionDetails'));
    }

    public function create()
    {
        $transactions = Transaction::all();
        $products = Product::all();
        return view('transaction_details.create', compact('transactions', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        TransactionDetail::create($request->all());

        return redirect()->route('transaction_details.index')
            ->with('success', 'Transaction Detail created successfully.');
    }

    public function show(TransactionDetail $transactionDetail)
    {
        return view('transaction_details.show', compact('transactionDetail'));
    }

    public function edit(TransactionDetail $transactionDetail)
    {
        $transactions = Transaction::all();
        $products = Product::all();
        return view('transaction_details.edit', compact('transactionDetail', 'transactions', 'products'));
    }

    public function update(Request $request, TransactionDetail $transactionDetail)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $transactionDetail->update($request->all());

        return redirect()->route('transaction_details.index')
            ->with('success', 'Transaction Detail updated successfully.');
    }

    public function destroy(TransactionDetail $transactionDetail)
    {
        $transactionDetail->delete();

        return redirect()->route('transaction_details.index')
            ->with('success', 'Transaction Detail deleted successfully.');
    }
}
