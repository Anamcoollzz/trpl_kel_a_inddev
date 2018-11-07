<?php

namespace App\Http\Controllers\Admin;

use App\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
// use Auth;

class KategoriController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kategori::all();
        return view('kategori.index', [
            'data'      => $data,
            'title'     => 'Kategori',
            'active'    => 'kategori.index',
            'createLink'=>route('kategori.create'),
            'role'=>'admin'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.tambah', [
            'title'         => 'Tambah Kategori',
            'modul_link'    => route('kategori.index'),
            'modul'         => 'Kategori',
            'action'        => route('kategori.store'),
            'active'        => 'kategori.index',
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
            'uri_routing'=>'required',
        ]);
        if(Kategori::count() == 0){
            DB::statement('set foreign_key_checks=0;');
            Kategori::truncate();
        }
        $data = [
            'nama'=>$request->nama,
            'uri_routing'=>$request->uri_routing,
        ];
        Kategori::create($data);
        return redirect()->route('kategori.index')->with('success_msg', 'Kategori berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        return view('kategori.detail', [
            'd'=>$kategori,
            'title'=>'Detail Kategori',
            'modul_link'=>route('kategori.index'),
            'modul'=>'Kategori',
            'action'=>false,
            'active'=>'kategori.index',
            'saveBtn'=>false,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        $user = $kategori;
        return view('kategori.ubah', [
            'd'             => $user,
            'title'         => 'Ubah Kategori',
            'modul_link'    => route('kategori.index'),
            'modul'         => 'Kategori',
            'action'        => route('kategori.update', $user->id),
            'active'        => 'kategori.edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama'=>'required',
            'uri_routing'=>'required',
        ]);
        $user->update([
            'nama'=>$request->nama,
            'uri_routing'=>$request->uri_routing,
        ]);
        return redirect()->route('kategori.index')->with('success_msg', 'Kategori berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success_msg', 'Kategori berhasil dihapus');
    }
}
