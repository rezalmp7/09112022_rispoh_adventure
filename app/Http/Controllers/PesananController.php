<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaksi;
use App\Models\Pesanan;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        foreach ($transaksi as $a) {
            $pesanan[$a->id] = Pesanan::where('kd_transaksi', '=', $a->kd_transaksi)->get();
        }
        return view('admin/pesanan', compact('transaksi', 'pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nota($id)
    {
        $transaksi = Transaksi::find($id);
        $pesanan = Pesanan::where('kd_transaksi', '=', $transaksi->kd_transaksi)->get();

        return view('admin/pesanan_nota', compact('transaksi', 'pesanan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function print()
    {
        $transaksi = Transaksi::orderBy('created_at', 'DESC')->get();
        foreach ($transaksi as $a) {
            $pesanan[$a->id] = Pesanan::where('kd_transaksi', '=', $a->kd_transaksi)->get();
        }

        return view('admin/pesanan_print', compact('transaksi', 'pesanan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        $pesanan = Pesanan::where('kd_transaksi', '=', $transaksi->kd_transaksi)->get();

        return view('admin/pesanan_show', compact('transaksi', 'pesanan'));
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
