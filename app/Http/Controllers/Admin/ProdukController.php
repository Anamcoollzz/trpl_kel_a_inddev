<?php

namespace App\Http\Controllers\Admin;

use App\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifikasi;
use Auth;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produk::with('user')->latest()->paginate(100);
        return view('produk.index', [
            'data'      => $data,
            'title'     => 'Produk',
            'active'    => 'produk.index',
            'createLink'=>false,
            'role'=>'admin'
        ]);
    }

    public function detail(Produk $produk)
    {
        $produk->load('kategori','user','screenshots');
        return view('produk.detail', [
            'd'      => $produk,
            'title'     => 'Detail Produk',
            'active'    => 'produk.index',
            'modul_link'=>route('admin.produk.index'),
            'modul'=>'Modul',
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
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }

    public function tolak(Request $r, Produk $produk)
    {
        $r->validate([
            'alasan_ditolak'=>'required'
        ]);
        $produk->update([
            'status'=>'rejected',
            'alasan_ditolak'=>$r->alasan_ditolak,
        ]);
        return redirect()->back()->with('success_msg', 'Produk berhasil ditolak');
    }

    public function verifikasi(Request $r, Produk $produk)
    {
        $r->validate([
            'projek_bundling'=>'required',
            'link_demo'=>'required'
        ]);
        $bundling_path = uploadPath($r->file('projek_bundling'),'produk/bundling');
        $produk->update([
            'status'=>'verified',
            'bundling_path'=>$bundling_path,
            'link_demo'=>$r->bundling_path,
        ]);
        $notifikasi = new Notifikasi();
        $notifikasi->isi = 'Produk dengan judul <a href="'.route('produk.show',[$produk->id]).'">'.$produk->nama.'</a> berhasil diverifikasi';
        $notifikasi->tipe = 'success';
        $notifikasi->user_id = Auth::id();
        $notifikasi->save();
        return redirect()->back()->with('success_msg', 'Produk berhasil diverifikasi');
    }
}
