<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Rekening;
use Illuminate\Http\Request;
use Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::with('detail')->where('user_id',Auth::id())->latest()->get();
        return view('frontend.transaksi.saya',[
            'title'=>'Transaksi Saya',
            'data'=>$transaksi,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        $transaksi->load('detail.produk');
        return view('frontend.transaksi.show',[
            'title'=>'Transaksi '.$transaksi->no,
            'transaksi'=>$transaksi,
            'total'=>$transaksi->detail->sum(function($item){
                return $item->harga_jual;
            }),
            'rekening'=>Rekening::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }

    public function bayar(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'nama_pengirim'=>'required',
            'norek_pengirim'=>'required|numeric',
            'tanggal_transfer'=>'required|date_format:Y-m-d',
            'bukti_transfer'=>'required|file|mimes:png,jpeg',
            'rekening'=>'required',
        ]);
        $bukti_transfer = uploadPath($request->bukti_transfer, 'pembayaran');
        $transaksi->update([
            'status'=>'waiting payment verification',
            'nama_pengirim'=>$request->nama_pengirim,
            'norek_pengirim'=>$request->norek_pengirim,
            'tanggal_transfer'=>$request->tanggal_transfer,
            'bukti_transfer'=>$bukti_transfer,
            'rekening_admin'=>$request->rekening,
        ]);
        return redirect()->back()->with('success_msg','Pembayaran berhasil dilakukan, menunggu verifikasi admin');
    }
}
