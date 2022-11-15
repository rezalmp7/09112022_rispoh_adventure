<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Session;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keranjang = Session::get('keranjang');

        if($keranjang == null || count($keranjang) == 0) {
            $dataKeranjang = [];
        }
        else {

            $dataKeranjang = [];

            foreach ($keranjang as $a) {
                $produk = Produk::find($a['id_produk']);

                $rowKeranjang = array(
                    'id_produk' => $produk->id,
                    'nama_produk' => $produk->nama,
                    'harga_produk' => $produk->harga, 
                    'jumlah' => $a["jumlah"],
                    'lama' => $a["lama"]
                );

                array_push($dataKeranjang, $rowKeranjang);
            }
        }

        return view('keranjang', compact('dataKeranjang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $keranjang = Session::get('keranjang');

        if($keranjang == null) {
            $keranjangInput = [];
            $keranjangBaru = array(
                'id_produk' => $id, 
                'jumlah' => 1,
                'lama' => 1,
            );
            array_push($keranjangInput, $keranjangBaru);
        } else {
            $keranjangInput = $keranjang;
            $cek_keranjang = false;
            
            foreach ($keranjang as $a) {
                if($a["id_produk"] == $id) {
                    $cek_keranjang = true;
                }
            }

            if($cek_keranjang == false) {
                $keranjangBaru = array(
                    'id_produk' => $id, 
                    'jumlah' => 1,
                    'lama' => 1,
                );
                array_push($keranjangInput, $keranjangBaru);
            }
        }

        session(['keranjang' => $keranjangInput]);

        return redirect(url('/keranjang'));
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
    public function update(Request $request)
    {
        $keranjang = [];
        for ($i=0; $i < count($request->id_produk); $i++) { 
            $keranjangInput = array(
                'id_produk' => $request->id_produk[$i], 
                'jumlah' => $request->jumlah[$i], 
                'lama' => $request->lama[$i], 
            );

            array_push($keranjang, $keranjangInput);
        }

        session(['keranjang' => $keranjang]);

        return redirect(url('keranjang'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keranjangStore = Session::get('keranjang');
        $keranjang = [];
        for ($i=0; $i < count($keranjangStore); $i++) { 
            if($keranjangStore[$i]["id_produk"] != $id) {
                array_push($keranjang, $keranjangStore[$i]);
            }
        }

        session(['keranjang' => $keranjang]);

        return redirect(url('keranjang'));
    }
}
