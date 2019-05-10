<?php

namespace App\Http\Controllers;

use App\RekeningMember;
use Illuminate\Http\Request;
use Auth;

class RekeningkuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekeningku = RekeningMember::where('user_id',Auth::id())->orderBy('default','desc')->get();
        return view('frontend.rekeningku.saya',[
            'title'=>'Rekening Saya',
            'data'=>$rekeningku,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.rekeningku.create',[
            'title'=>'Tambah Rekening'
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
        $jmlRek = RekeningMember::where('user_id',Auth::id())->count();
        $rekeningku = new RekeningMember();
        $rekeningku->atas_nama = $request->atas_nama;
        $rekeningku->nama_bank = $request->nama_bank;
        $rekeningku->cabang = $request->cabang;
        $rekeningku->no_rek = $request->no_rek;
        $rekeningku->user_id = Auth::id();
        if($jmlRek > 0){
            $rekeningku->default = 'tidak';
        }
        $rekeningku->save();
        return redirect()->route('rekeningku')->with('success_msg','Rekening berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RekeningMember  $rekeningMember
     * @return \Illuminate\Http\Response
     */
    public function show(RekeningMember $rekeningMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RekeningMember  $rekeningMember
     * @return \Illuminate\Http\Response
     */
    public function edit(RekeningMember $rekening)
    {
        return view('frontend.rekeningku.ubah',[
            'title'=>'Ubah Rekening',
            'd'=>$rekening
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RekeningMember  $rekeningMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekeningMember $rekening)
    {
        $request->validate([
            'atas_nama'=>'required',
            'nama_bank'=>'required',
            'cabang'=>'required',
            'no_rek'=>'required|numeric',
        ]);
        $rekening->atas_nama = $request->atas_nama;
        $rekening->nama_bank = $request->nama_bank;
        $rekening->cabang = $request->cabang;
        $rekening->no_rek = $request->no_rek;
        $rekening->save();
        return redirect()->route('rekeningku')->with('success_msg','Rekening berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RekeningMember  $rekeningMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekeningMember $rekening)
    {
        $rekening->delete();
        $rk = RekeningMember::all();
        if(count($rk) > 0){
            $rk = RekeningMember::latest()->first();
            $rk->default = 'ya';
            $rk->save();
        }
        return redirect()->route('rekeningku')->with('success_msg','Rekening berhasil dihapus');
    }
}
