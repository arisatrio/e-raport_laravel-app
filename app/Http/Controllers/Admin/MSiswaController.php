<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\User;

class MSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $murid = User::where('role_id', 4)->get();
        $t = range(Carbon::now()->year, 2020);

        return view('_admin.MSiswa.index', compact('murid', 't'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'username'  => 'required|unique:users,username',
            'angkatan'  => 'required'
        ]);

        User::create([
            'role_id'   => 4,
            'name'      => $request->name,
            'username'  => $request->username,
            'email'     => $request->username,
            'angkatan'  => $request->angkatan,
            'password'  => bcrypt('@123456'),
        ]);

        return redirect()->route('admin.siswa.index')->with('messages', 'Data Siswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $murid = User::find($id);

        return view('_admin.MSiswa.show', compact('murid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $murid = User::find($id);

        return view('_admin.MSiswa.edit', compact('murid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      => 'required',
            'username'  => 'required',
            'email'     => 'required',
            'nohp'      => 'required',
        ]);

        $murid = User::find($id);
        $murid->update([
            'name'      => $request->name,
            'username'  => $request->username,
            'email'     => $request->email,
            'nohp'      => $request->nohp,
            'alamat'    => $request->alamat,
        ]);

        return redirect()->route('admin.siswa.index')->with('messages', 'Data siswa berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $murid = User::find($id);
        $murid->delete();

        return redirect()->route('admin.siswa.index')->with('messages', 'Data siswa berhasil dihapus');
    }
}
