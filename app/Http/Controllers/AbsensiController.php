<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select(DB::raw('select * from Absensi'));
        return view('Absensi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Absensi.create');
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
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        // Insert data into the database
        DB::insert("INSERT INTO Absensi (id, nama, keterangan) VALUES (uuid(), ?, ?)", [
            $request->nama,
            $request->keterangan,
        ]);

        return redirect()->route('Absensi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // You can implement this method if needed
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('Absensi')->where('id', $id)->first();
        return view('Absensi.edit', compact('data'));
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
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        // Update data in the database
        DB::update("UPDATE Absensi SET nama=?, keterangan=? WHERE id=?", [
            $request->nama,
            $request->keterangan,
            $id,
        ]);

        return redirect()->route('Absensi.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('Absensi')->where('id', $id)->delete();

        return redirect()->route('Absensi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}