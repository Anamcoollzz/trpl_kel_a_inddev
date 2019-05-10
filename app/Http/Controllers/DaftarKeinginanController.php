<?php

namespace App\Http\Controllers;

use App\DaftarKeinginan;
use Illuminate\Http\Request;
use Auth;

class DaftarKeinginanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftarKeinginan = DaftarKeinginan::where('user_id',Auth::id())->latest()->get();
        return view('frontend.daftar-keinginan.saya',[
            'title'=>'Daftar Keinginan',
            'data'=>$daftarKeinginan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hapus(DaftarKeinginan $daftar)
    {
        if($daftar->user_id == Auth::id()){
            $daftar->delete();
        }
        return redirect()->back();
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
            'id_produk'=>'required|numeric',
        ]);
        if(is_null(Auth::user())){
            return [
                'message'=>'Masuk terlebih dahulu',
                'status'=>'ok',
                'status_code'=>302,
            ];
        }
        $id = Auth::id();
        $dk = DaftarKeinginan::where('id_produk',$request->id_produk)
        ->where('user_id',$id)
        ->first();
        $msg = 'Daftar keinginan berhasil ditambahkan';
        if($dk){
            $dk->delete();
            $msg = 'Daftar keinginan berhasil dihapus';
        }else{
            DaftarKeinginan::create([
                'user_id'=>$id,
                'id_produk'=>$request->id_produk,
            ]);
        }
        return [
            'message'=>$msg,
            'status'=>'ok',
            'status_code'=>200,
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DaftarKeinginan  $daftarKeinginan
     * @return \Illuminate\Http\Response
     */
    public function show(DaftarKeinginan $daftarKeinginan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DaftarKeinginan  $daftarKeinginan
     * @return \Illuminate\Http\Response
     */
    public function edit(DaftarKeinginan $daftarKeinginan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DaftarKeinginan  $daftarKeinginan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DaftarKeinginan $daftarKeinginan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DaftarKeinginan  $daftarKeinginan
     * @return \Illuminate\Http\Response
     */
    public function destroy(DaftarKeinginan $daftarKeinginan)
    {
        //
    }

    public function jumlah()
    {
        return [
            'message'=>'Jumlah daftar keinginan berhasil dimuat',
            'status'=>'ok',
            'status_code'=>200,
            'data'=>DaftarKeinginan::where('user_id',Auth::id())->count(),
        ];
    }
}
