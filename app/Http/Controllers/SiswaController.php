<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use DB;
class SiswaController extends Controller
{

    public function index()
    {
        $data=DB::select(DB::raw("SELECT siswa1.*, kelas.kelas as nama_kelas FROM `siswa1`, kelas WHERE siswa1.kelas=kelas.id"));
        return view('siswa.index', compact('data'));
    }
    
 
    public function create()
    {
        return view('siswa.create');
    }

     public function store(Request $request)
     {
         $this->validate($request, [
             'nama_siswa' => 'required',
             'kelas' => 'required',
             'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
             'alamat' => 'required',
         ]);
     
         DB::insert("INSERT INTO `siswa1` (`id`, `nama_siswa`, `kelas`, `jenis_kelamin`, `alamat`) VALUES (?, ?, ?, ?, ?)",
             [Str::uuid()->toString(), $request->nama_siswa, $request->kelas, $request->jenis_kelamin, $request->alamat]);
     
         return redirect()->route('siswa.index')->with(['success' => 'Data berhasil Disimpan!']);
     }
     
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=DB::table('siswa1')->where('id', $id)->first();
        return view('siswa.edit', compact('data'));
      
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_siswa' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required',
        ]);
    
        DB::update("UPDATE siswa1 SET  nama_siswa=?, kelas=?, alamat=? WHERE id=?",
            [ $request->nama_siswa, $request->kelas, $request->alamat, $id]);
    
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Diupdate']);
    }
    public function destroy($id)
    {
        DB::table('siswa1')->where('id', $id)->delete();

        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function showSiswa()
    {
 
        $data=DB::select(DB::raw("SELECT siswa1.*, kelas.kelas as nama_kelas FROM `siswa1`, kelas WHERE siswa1.kelas=kelas.id"));
        return view('siswa.index', compact('data'));
}
}