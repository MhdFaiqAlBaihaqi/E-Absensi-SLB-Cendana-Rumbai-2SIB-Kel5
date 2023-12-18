<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Absensi;
use DB;

class AbsensiController extends Controller
{
    public function index()
    {
        $data=DB::select(DB::raw("select * from absensi"));
        return view('absensi.index', compact('data'));
    }
    public function input_absensi($id){
        $kelas = DB::select(DB::raw("select * from kelas where id=".$id.""));
        $siswa = DB::select(DB::raw("select * from siswa1 where kelas='".$id."'"));
        return view('absensi.create',compact('siswa','kelas'));
        
    }
    public function create()
    {
        return view('absensi.create');
    }
   
    public function store(Request $request)
    {
        $this->validate($request, [
            'absensi_kelas' => 'required',
            'absensi_tanggal' => 'required',
            'absensi_keterangan' => 'required',
        ]);
        $siswa_all= $request->siswa_id;
       
        DB::insert("INSERT INTO `absensi` (`absensi_kelas`, `absensi_tanggal`,`absensi_keterangan`) VALUES (?, ?, ?)",
            [ $request->absensi_kelas, $request->absensi_tanggal, $request->absensi_keterangan]);
            $id_absensi=DB::select(DB::raw("select max(absensi_id) as id from absensi"));
        for ($i=0; $i < count($siswa_all); $i++) { 
            // echo $request->siswa_id[$i];
            DB::insert("INSERT INTO `absensi_siswa`(`absensisiswa_id`, `id_siswa`, `absensi_id`, `keterangan`)  VALUES (uuid(),?, ?, ?)",
           [ $request->siswa_id[$i], $id_absensi[0]->id, $request->absensi_keterangan_kehadiran[$i]]);
       }
    // print_r($request->siswa_id);
    // print_r($request->absensi_keterangan_kehadiran);
        return redirect()->route('absensi.index')->with(['success' => 'Data berhasil Disimpan!']);
    }
    public function edit($id)
    {
        $data=DB::table('absensi')->where('absensi_id', $id)->first();
        return view('absensi.edit', compact('data'));
      
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
            'absensi_kelas' => 'required',
            'absensi_tanggal' => 'required',
            'absensi_keterangan' => 'required',
        ]);
    
        DB::update("UPDATE absensi SET  absensi_kelas=?, absensi_tanggal=?, absensi_keterangan=? WHERE absensi_id=?",
            [ $request->absensi_kelas, $request->absensi_tanggal, $request->absensi_keterangan, $id]);
    
        return redirect()->route('absensi.index')->with(['success' => 'Data Berhasil Diupdate']);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('absensi')->where('absensi_id', $id)->delete();

        //redirect to index
        return redirect()->route('absensi.index')->with(['auccess' => 'Data Berhasil Dihapus!']);
    }
}