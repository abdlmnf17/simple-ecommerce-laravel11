<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        // Dapatkan produk berdasarkan ID
        $product = Product::findOrFail($request->product_id);

        // Validasi input quantity
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->stock,
        ]);

        // Dapatkan session cart, atau buat array baru jika belum ada
        $cart = session()->get('cart', []);

        // Jika produk sudah ada di cart, tambahkan jumlahnya
        if (isset($cart[$product->id])) {
            // Tambah quantity sesuai yang dipilih
            $cart[$product->id]['quantity'] += $request->quantity;
        } else {
            // Jika belum ada, tambahkan produk baru ke cart
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->quantity,
            ];
        }

        // Simpan kembali session
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produk masuk ke keranjang!');
    }

    public function remove(Request $request, $id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart); // Perbarui keranjang dalam sesi
        }

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
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
