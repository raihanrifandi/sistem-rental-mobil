<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('admin-product-management', compact('products'));
    }
    
    public function create() {
        return view('products.create');
    }
    
    public function store(Request $request) {
        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
    }
    
    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }
    
    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui');
    }
    
    public function destroy($id)
{
    
    $mobil = Product::find($id);
    
    // Cek apakah mobil masih terkait dengan penyewaan
    $penyewaan = Product::where('id_mobil', $mobil->id_mobil)->exists();

    if ($penyewaan) {
        // Tampilkan notifikasi jika mobil masih disewakan
        return redirect()->route('products.index')->with('error', 'Mobil ini masih disewakan, tidak dapat dihapus.');
    }

    $mobil->delete();

    return redirect()->route('products.index')->with('success', 'Mobil berhasil dihapus.');
}
}
