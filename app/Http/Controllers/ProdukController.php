<?php

namespace App\Http\Controllers;

use App\Produk;
use App\ProdukGambar;
use App\Kategori;
use Illuminate\Http\Request;
use Auth;
use Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saya()
    {
        $unggulan = Produk::with('kategori','user')
        ->where('user_id',Auth::id())
        ->orderBy('hit','desc')
        ->take(3)
        ->get();
        $data = Produk::where('user_id',Auth::id())->get();//->chunk(8);
        return view('frontend.produk.index',[
            'data'=>$data,
            'title'=>'Produk Saya',
            'unggulan'=>$unggulan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.produk.create',[
            'title'=>'Tambah Produk',
            'kategori'=>Kategori::selectMode(),
        ]);
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
            'nama'=>'required',
            'tahun_dibuat'=>'required',
            'tahun_selesai_dibuat'=>'required',
            'harga'=>'required|numeric|min:50000',
            'id_kategori'=>'required',
            'logo'=>'required|mimes:png,jpeg',
            'deskripsi'=>'required',
            'file_projek'=>'required|mimes:zip',
            'file_dokumentasi'=>'required|mimes:zip,doc,docx,pdf',
        ]);
        $logo = uploadPath($request->file('logo'),'produk/logo');
        $file_projek = uploadPath($request->file('file_projek'), 'produk/projek');
        $file_dokumentasi = uploadPath($request->file('file_dokumentasi'), 'produk/dokumentasi');
        $produk = Produk::create([
            "nama" => $request->nama,
            "id_kategori" => $request->id_kategori,
            "tahun_dibuat" => $request->tahun_dibuat,
            "tahun_selesai_dibuat" => $request->tahun_selesai_dibuat,
            "harga" => $request->harga,
            "deskripsi" => $request->deskripsi,
            "logo" => $logo,
            "file_path" => $file_projek,
            "panduan_path" => $file_dokumentasi,
            'user_id'=>$request->user()->id,
        ]);
        foreach ($request->nama_gambar as $url) {
            ProdukGambar::create([
                'url'=>$url,
                'id_produk'=>$produk->id,
            ]);
        }
        return redirect()->route('produk.index')->with('success_msg','Produk berhasil ditambahkan, menunggu verifikasi administrator');
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

    public function uploadGambar(Request $r)
    {
        return [
            'upload_url'=>uploadPath($r->file('upload_gambar'),'produk'),
            'name'=>$r->file('upload_gambar')->getClientOriginalName(),
            'size'=>$r->file('upload_gambar')->getClientSize(),
        ];
    }

    public function hapusGambar(Request $r)
    {
        $path = str_replace('//','/','public/'.str_replace(url('/storage'), '', $r->gambar));
        Storage::delete($path);
        return 'delete success';
    }
}
