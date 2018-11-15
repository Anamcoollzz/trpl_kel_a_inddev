<?php

namespace App\Http\Controllers\Admin;

use App\Pengaturan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Pengaturan  $pengaturan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaturan $pengaturan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengaturan  $pengaturan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengaturan $pengaturan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengaturan  $pengaturan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengaturan $pengaturan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengaturan  $pengaturan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaturan $pengaturan)
    {
        //
    }

    public function privacyPolicy()
    {
        return view('pengaturan.privacy-policy',[
            'title'         => 'Privacy Policy',
            'modul_link'    => '#',
            'modul'         => 'Pengaturan',
            'action'        => route('pengaturan.privacy-policy-post'),
            'active'        => 'pengaturan.privacy-policy',
            'd'=>Pengaturan::where('key','privacy-policy')->first(),
        ]);
    }

    public function privacyPolicyPost(Request $r)
    {
        $r->validate([
            'privacy_policy'=>'required',
        ]);
        Pengaturan::updateOrCreate([
            'key'=>'privacy-policy'
        ],[
            'value'=>$r->privacy_policy
        ]);
        return redirect()->back()->with('success_msg', 'Privacy Policy berhasil diperbarui');
    }
}
