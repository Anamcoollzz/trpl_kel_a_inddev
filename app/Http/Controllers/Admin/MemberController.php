<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('role', 'member')->get();
        return view('member.index', [
            'data'      => $data,
            'title'     => 'Member',
            'active'    => 'member.index',
            'createLink'=>false,
            'role'=>'admin',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.tambah', [
            'title'         => 'Tambah User',
            'modul_link'    => route('member.index'),
            'modul'         => 'User',
            'action'        => route('member.store'),
            'active'        => 'member.index',
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
        if(User::count() == 0){
            DB::statement('set foreign_key_checks=0;');
            User::truncate();
        }
        $data = [
            'nama'=>$request->nama,
            'uri_routing'=>$request->uri_routing,
        ];
        User::create($data);
        return redirect()->route('member.index')->with('success_msg', 'User berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(User $kategori)
    {
        return view('member.detail', [
            'd'=>$kategori,
            'title'=>'Detail User',
            'modul_link'=>route('member.index'),
            'modul'=>'User',
            'action'=>false,
            'active'=>'member.index',
            'saveBtn'=>false,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(User $kategori)
    {
        $user = $kategori;
        return view('member.ubah', [
            'd'             => $user,
            'title'         => 'Ubah User',
            'modul_link'    => route('member.index'),
            'modul'         => 'User',
            'action'        => route('member.update', $user->id),
            'active'        => 'member.edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $kategori)
    {
        $request->validate([
            'nama'=>'required',
            'uri_routing'=>'required',
        ]);
        $user->update([
            'nama'=>$request->nama,
            'uri_routing'=>$request->uri_routing,
        ]);
        return redirect()->route('member.index')->with('success_msg', 'User berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $kategori)
    {
        $kategori->delete();
        return redirect()->route('member.index')->with('success_msg', 'User berhasil dihapus');
    }

    public function verifikasi(Request $r, User $member)
    {
        $member->update([
            'status'=>'verified',
            'tahap_2'=>'sudah',
        ]);
        return redirect()->route('member.index')->with('success_msg', 'User '.$member->nama.' berhasil diverifikasi');
    }
}
