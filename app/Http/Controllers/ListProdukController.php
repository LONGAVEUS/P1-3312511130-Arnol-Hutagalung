<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ListProdukController extends Controller
{
    public function show()
    {
        $data = Produk::get();

        $id = [];
        $nama = [];
        $desc = [];
        $harga = [];

        foreach ($data as $produk) {
            $id[] = $produk->id;
            $nama[] = $produk->nama;
            $desc[] = $produk->deskripsi;
            $harga[] = $produk->harga;
        }


        return view('list_produk', compact('id', 'nama', 'desc', 'harga'));
    }

    public function delete($id)
    {
        $produk = Produk::find($id);
        if ($produk) {
            $produk->delete();
            return redirect()->back()->with('success', 'Produk berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }
    }

    public function edit($id)
    {
         $produk = Produk::find($id);
         if (!$produk) {
            return redirect('/listproduk')->with('error', 'Produk tidak ditemukan.');
         }
         return view('edit_produk', compact('produk'));
    }

    public function update(Request $request, $id)
    {
       $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric'
       ]);

       $produk = Produk::find($id);
       if ($produk) {
            $produk->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga
            ]);
            return redirect('/listproduk')->with('success', 'Produk berhasil diperbarui.');
       }
       return redirect('/listproduk')->with('error', 'Gagal memperbarui data.');
    }
}
