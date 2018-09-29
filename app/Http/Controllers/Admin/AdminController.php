<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $data = User::where('role', 'admin')->get();
        return view('admin.index', [
            'data'      => $data,
            'title'     => 'Admin',
            'active'    => 'admin.index',
            'createLink'=>route('admin.create'),
            'role'=>'admin',
        ]);
    }

    public function create()
    {
        return view('admin.tambah', [
            'title'         => 'Tambah Admin',
            'modul_link'    => route('admin.index'),
            'modul'         => 'Admin',
            'action'        => route('admin.store'),
            'active'        => 'admin.index',
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
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|confirmed',
            'password_confirmation'=>'required|min:5',
            'avatar'=>'mimes:jpeg,png',
        ]);
        if(User::count() == 0){
            DB::statement('set foreign_key_checks=0;');
            User::truncate();
        }
        $data = [
            'nama'=>$request->nama,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'no_hp'=>$request->no_hp,
            'alamat'=>$request->alamat,
            'role'=>'admin',
        ];
        if($request->avatar){
            $path = $request->file('avatar')->store('public/avatar');
            $path = asset(str_replace('public/', 'storage/', $path));
            $data['avatar'] = $path;
        }
        User::create($data);
        return redirect()->route('admin.index')->with('success_msg', 'Admin berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $admin
     * @return \Illuminate\Http\Response
     */
    public function show(User $admin)
    {
        return view('admin.detail', [
            'd'=>$admin,
            'title'=>'Detail Admin',
            'modul_link'=>route('admin.index'),
            'modul'=>'Admin',
            'action'=>false,
            'active'=>'admin.index',
            'saveBtn'=>false,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        $user = $admin;
        return view('admin.ubah', [
            'd'             => $user,
            'title'         => 'Ubah Admin',
            'modul_link'    => route('admin.index'),
            'modul'         => 'Admin',
            'action'        => route('admin.update', $user->id),
            'active'        => 'admin.edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        $request->validate([
            'nama'=>'required',
            'email'=>'required|email|unique:users,email,'.$admin->id,
            'password'=>'nullable|min:5|confirmed',
            'password_confirmation'=>'nullable|min:5',
            'avatar'=>'mimes:jpeg,png',
        ]);
        $data = [
            'nama'=>$request->nama,
            'email'=>$request->email,
            'no_hp'=>$request->no_hp,
            'alamat'=>$request->alamat,
            'role'=>'admin',
        ];
        if($request->avatar){
            $path = $request->file('avatar')->store('public/avatar');
            $path = asset(str_replace('public/', 'storage/', $path));
            $data['avatar'] = $path;
        }
        if($request->password){
            $data['password'] = bcrypt($request->password);   
        }
        $admin->update($data);
        return redirect()->route('admin.index')->with('success_msg', 'Admin berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        $admin->delete();
        return redirect()->route('admin.index')->with('success_msg', 'Admin berhasil dihapus');
    }
}
