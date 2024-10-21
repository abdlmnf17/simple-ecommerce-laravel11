<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;


class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        // Simpan data transaksi
        $sale = Sale::create([
            'no_sales' => uniqid('sale_'),
            'payment_method' => $request->payment_method,
            'status' => 'paid',
            'user_id' => auth()->id(),
        ]);

        // Simpan detail produk dari keranjang ke tabel pivot 'sale_product'
        $cart = session()->get('cart');
        foreach ($cart as $id => $product) {
            // Tambahkan produk ke penjualan
            $sale->products()->attach($id, ['quantity' => $product['quantity']]);

            // Kurangi stok produk
            $productModel = Product::find($id);
            if ($productModel) {
                $productModel->decrement('stock', $product['quantity']);
            }
        }

        // Bersihkan keranjang
        session()->forget('cart');

        return redirect()->route('dashboard')->with('success', 'Checkout berhasil! Menunggu Barang Dikirim');
    }


    public function showConfirmation(Request $request)
    {
        $paymentMethod = $request->input('payment_method');

        // Tampilkan informasi pembayaran berdasarkan metode yang dipilih
        return view('cart.confirm', compact('paymentMethod'));
    }

    public function print($id)
    {
        $sale = Sale::with('products')->findOrFail($id);

        $pdf = PDF::loadView('cart.print', compact('sale'));
        return $pdf->stream('nota_pembayaran.pdf');
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
