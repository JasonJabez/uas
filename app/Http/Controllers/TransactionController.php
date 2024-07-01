<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user')->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $users = User::all();
        return view('transactions.create', compact('users'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'user_id' => 'required|exists:users,id',
        //     'products' => 'required|array',
        //     'products.*.id' => 'required|exists:products,id',
        //     'products.*.quantity' => 'required|integer|min:1',
        // ]);

        // $totalAmount = 0;

        // foreach ($request->products as $productData) {
        //     $product = Product::find($productData['id']);
        //     $totalAmount += $product->price * $productData['quantity'];
        // }

        // // Calculate tax (11% of total amount)
        // $tax = $totalAmount * 0.11;
        // $totalAmount += $tax;

        // $transaction = Transaction::create([
        //     'user_id' => $request->user_id,
        //     'total_amount' => $totalAmount,
        // ]);

        // return redirect()->route('transactions.index')
        //     ->with('success', 'Transaction created successfully.');
    }

    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        $users = User::all();
        return view('transactions.edit', compact('transaction', 'users'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_amount' => 'required|numeric',
        ]);

        $transaction->update($request->all());

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction deleted successfully.');
    }
}
