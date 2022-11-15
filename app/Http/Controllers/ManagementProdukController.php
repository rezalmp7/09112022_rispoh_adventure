<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class ManagementProdukController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();
        $kategori = Kategori::all();
        
        return view('admin/management_produk', compact('produk', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData($id)
    {
        $produk = Produk::find($id);

        if($produk != null) {
            return array(
                'status' => 1,
                'message' => "Data Behasil diambil",
                'value' => $produk,
            );
        } else {
            return array(
                'status' => 0,
                'message' => "Tidak ada data yang cocok",
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $request->validate([
            'gambar' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imageName = time().'.'.$request->gambar->extension();

        // Public Folder
        $request->gambar->move(public_path('images'), $imageName);

        if($request->tersedia == 'tersedia') {
            $tersedia = 1;
        } else {
            $tersedia = 0;
        }

        Produk::insert([
            'image' => $imageName,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'kategori' => $request->kategoriProduk,
            'tersedia' => $tersedia,
        ]);

        return redirect(url('/admin/produk'));
    }

    public function toggleTersedia($id) {
        $produk = Produk::find($id);


        if($produk->tersedia == 1) {
            $tersediaBaru = 0;
        } else {
            $tersediaBaru = 1;
        }
        Produk::find($id)->update([
            'tersedia' => $tersediaBaru
        ]);

        return array(
            'status' => 1,
            'message' => "Data Behasil diambil",
            'tersediaBaru' => $tersediaBaru,
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if($request->gambar) {
            $imageName = time().'.'.$request->gambar->extension();

            // Public Folder
            $request->gambar->move(public_path('images'), $imageName);
        } else {
            $imageName = $request->gambarLama;
        }

        if($request->tersedia == 'tersedia') {
            $tersedia = 1;
        } else {
            $tersedia = 0;
        }
        
        Produk::find($id)->update([
            'image' => $imageName,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'kategori' => $request->kategoriProduk,
            'tersedia' => $tersedia,
        ]);

        return redirect(url('/admin/produk'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produk::find($id)->delete();

        return redirect(url('/admin/produk'));
    }
}
