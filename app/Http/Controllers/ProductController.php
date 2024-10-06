<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Pencarian (jika diperlukan)
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Melakukan paginasi
        $products = $query->paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo_4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mengolah foto utama
        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('products', 'public');
        }
        if ($request->hasFile('photo_2')) {
            $validatedData['photo_2'] = $request->file('photo_2')->store('products', 'public');
        }
        if ($request->hasFile('photo_3')) {
            $validatedData['photo_3'] = $request->file('photo_3')->store('products', 'public');
        }
        if ($request->hasFile('photo_4')) {
            $validatedData['photo_4'] = $request->file('photo_4')->store('products', 'public');
        }

        // // Mengolah foto tambahan
        // for ($i = 2; $i <= 4; $i++) {
        //     if ($request->hasFile("photo_$i")) {
        //         $validatedData["photo_$i"] = $request->file("photo_$i")->store('products', 'public');
        //     }
        // }

        // Menyimpan produk baru
        Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Produk berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id); // Mendapatkan produk berdasarkan ID
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Implementasi edit jika diperlukan
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Implementasi update jika diperlukan
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Implementasi destroy jika diperlukan
    }
}
