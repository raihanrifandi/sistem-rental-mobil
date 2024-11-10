<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin-product-management', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Cek jika ada file gambar yang diupload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $request->gambar->extension();
            $file->move(public_path('uploads'), $filename);
        }

        Product::create([
            'merk' => $request->input('merk'),
            'model' => $request->input('model'),
            'tahun' => $request->input('tahun'),
            'plat' => $request->input('plat'),
            'harga_sewa' => $request->input('harga_sewa'),
            'gambar' => isset($filename) ? 'uploads/' . $filename : null,
            'deskripsi' => $request->input('deskripsi'),
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Cek apakah ada file gambar yang diupload
        if ($request->hasFile('gambar')) {
            if ($product->gambar && file_exists(public_path($product->gambar))) {
                unlink(public_path($product->gambar));
            }

            // Simpan gambar baru
            $file = $request->file('gambar');
            $filename = time() . '.' . $request->gambar->extension(); 
            $file->move(public_path('uploads'), $filename); 
            $product->gambar = 'uploads/' . $filename; 
        }

        // Update kolom-kolom lain di produk
        $product->merk = $request->input('merk');
        //$product->model = $request->input('model');
        $product->tahun = $request->input('tahun');
        $product->plat = $request->input('plat');
        $product->harga_sewa = $request->input('harga_sewa');
        $product->deskripsi = $request->input('deskripsi');

        $product->save();

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui');
    }


    public function destroy($id)
    {
        $mobil = Product::find($id);

        if (!$mobil) {
            return redirect()->route('products.index')->with('error', 'Mobil tidak ditemukan.');
        }

        // Periksa apakah status mobil adalah "available"
        if ($mobil->status !== 'available') {
            return redirect()->route('products.index')->with('error', 'Hanya mobil dengan status "available" yang dapat dihapus.');
        }

        $mobil->delete();

        return redirect()->route('products.index')->with('success', 'Mobil berhasil dihapus.');
    }
}
