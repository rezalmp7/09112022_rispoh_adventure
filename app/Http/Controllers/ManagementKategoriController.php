<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class ManagementKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        
        return view('admin/management_kategori', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData($id)
    {
        $kategori = Kategori::find($id);

        if($kategori != null) {
            return array(
                'status' => 1,
                'message' => "Data Behasil diambil",
                'value' => $kategori,
            );
        } else {
            return array(
                'status' => 0,
                'message' => "Tidak ada data yang cocok",
            );
        }
    }
    
    public function getDataAll()
    {
        $kategori = Kategori::all();

        if($kategori != null) {
            return array(
                'status' => 1,
                'message' => "Data Behasil diambil",
                'value' => $kategori,
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

        Kategori::insert([
            'image' => $imageName,
            'nama' => $request->nama
        ]);

        return redirect(url('/admin/kategori'));
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

        Kategori::find($id)->update([
            'image' => $imageName,
            'nama' => $request->nama
        ]);

        return redirect(url('/admin/kategori'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kategori::find($id)->delete();

        return redirect(url('/admin/kategori'));
    }
}
