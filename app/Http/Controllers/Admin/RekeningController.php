<?php

namespace App\Http\Controllers\Admin;

use App\Rekening;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Rekening::all();
        return view('rekening.index', [
            'data'      => $data,
            'title'     => 'Rekening',
            'active'    => 'rekening.index',
            'createLink'=>route('rekening.create'),
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
        return view('rekening.tambah', [
            'title'         => 'Tambah Rekening',
            'modul_link'    => route('rekening.index'),
            'modul'         => 'Rekening',
            'action'        => route('rekening.store'),
            'active'        => 'rekening.index',
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
            'atas_nama'=>'required',
            'nama_bank'=>'required',
            'cabang'=>'required',
            'no_rek'=>'required|numeric',
        ]);
        if(Rekening::count() == 0){
            DB::statement('set foreign_key_checks=0;');
            Rekening::truncate();
        }
        $data = [
            'atas_nama'=>$request->atas_nama,
            'nama_bank'=>$request->nama_bank,
            'cabang'=>$request->cabang,
            'no_rek'=>$request->no_rek,
        ];
        Rekening::create($data);
        return redirect()->route('rekening.index')->with('success_msg', 'Rekening berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function show(Rekening $rekening)
    {
        return view('rekening.detail', [
            'd'=>$rekening,
            'title'=>'Detail Rekening',
            'modul_link'=>route('rekening.index'),
            'modul'=>'Rekening',
            'action'=>false,
            'active'=>'rekening.index',
            'saveBtn'=>false,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekening $rekening)
    {
        return view('rekening.ubah', [
            'd'             => $rekening,
            'title'         => 'Ubah Rekening',
            'modul_link'    => route('rekening.index'),
            'modul'         => 'Rekening',
            'action'        => route('rekening.update', $rekening->id),
            'active'        => 'rekening.edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rekening $rekening)
    {
        $request->validate([
            'atas_nama'=>'required',
            'nama_bank'=>'required',
            'cabang'=>'required',
            'no_rek'=>'required|numeric',
        ]);
        $rekening->update([
            'atas_nama'=>$request->atas_nama,
            'nama_bank'=>$request->nama_bank,
            'cabang'=>$request->cabang,
            'no_rek'=>$request->no_rek,
        ]);
        return redirect()->route('rekening.index')->with('success_msg', 'Rekening berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekening $rekening)
    {
        $rekening->delete();
        return redirect()->route('rekening.index')->with('success_msg', 'Rekening berhasil dihapus');
    }
}
