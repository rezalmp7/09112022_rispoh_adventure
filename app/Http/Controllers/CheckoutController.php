<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Transaksi;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('checkout');
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
    public function store(Request $request)
    {
        $keranjang = Session::get('keranjang');

        $kode_transaksi = time();
        
        $dataKeranjang = [];
        $total_harga = 0;

        foreach ($keranjang as $a) {
            $produk = Produk::find($a['id_produk']);

            $jumlah_harga = $a["jumlah"]*$a["lama"]*$produk->harga;

            $rowaKeranjang = array(
                'kd_transaksi' => $kode_transaksi,
                'id_produk' => $produk->id,
                'nama_produk' => $produk->nama,
                'qty' => $a["jumlah"],
                'harga' => $produk->harga, 
                'lama_sewa' => $a["lama"],
                'jumlah_harga' => $jumlah_harga
            );

            $total_harga += $jumlah_harga;

            array_push($dataKeranjang, $rowaKeranjang);
        }

        Pesanan::insert($dataKeranjang);

        $request->validate([
            'identitas' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imageName = time().'.'.$request->identitas->extension();

        // Public Folder
        $request->identitas->move(public_path('images'), $imageName);

        Transaksi::insert(array(
            'kd_transaksi' => $kode_transaksi,
            'nama_pelanggan' => $request->nama,
            'alamat_pelanggan' => $request->alamat,
            'noHp_pelanggan' => $request->noHp,
            'identitas' => $imageName,
            'total_harga' => $total_harga,
            'status' => 'pesan',
            'status_pembayaran' => 'pending',
            'tgl_pesan' => date('Y-m-d H:i:s'),
        ));

        session(['keranjang' => null]);

        return redirect(url('terima_kasih'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
