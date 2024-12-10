<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10); // Menampilkan 10 item per halaman
        return view('admin.daftar-mobil', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }
    public function metode_pembayaran()
    {
        return view('metode_pembayaran');
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
            'transmisi' => $request->input('transmisi'),
            'kapasitas' => $request->input('kapasitas'),
            'status' => 'available', // Status default
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
        $request->validate([
            'merk' => 'required',
            'model' => 'required',
            'tahun' => 'required|integer',
            'plat' => 'required',
            'kapasitas' => 'required',
            'transmisi' => 'required',
            'harga_sewa' => 'required|numeric',
            'status' => 'required|in:available,rented,maintenance',
        ]);

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
        $product->update($request->all());
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
