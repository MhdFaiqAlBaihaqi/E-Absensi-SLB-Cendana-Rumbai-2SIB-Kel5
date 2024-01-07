<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Absensi;
use DB;
use Auth;
class AbsensiController extends Controller
{
    public function index()
    {
        $data=DB::select(DB::raw("select * from absensi join absensi_siswa"));
        $data = DB::table('absensi_siswa')
        ->join('siswa1', 'absensi_siswa.id_siswa', '=', 'siswa1.id')
        ->join('absensi', 'absensi_siswa.absensi_id', '=', 'absensi.absensi_id')
        ->join('kelas', 'siswa1.kelas', '=', 'kelas.id')
        ->select('siswa1.nama_siswa','siswa1.jenis_kelamin','siswa1.alamat','kelas.kelas')
        ->get();
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
   
        return redirect()->route('absensi.index')->with(['success' => 'Data berhasil Disimpan!']);
    }
    public function edit($id)
    {
        $data=DB::table('absensi_siswa')->where('absensisiswa_id', $id)->first();
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
            'keterangan' => 'required',
        ]);
    
        DB::update("UPDATE absensi_siswa SET  keterangan=? WHERE absensisiswa_id=?",
            [ $request->keterangan, $id]);
    
        return redirect()->route('absensi.history')->with(['success' => 'Data Berhasil Diupdate']);
    }
    
    public function destroy($id)
    {
        DB::table('absensi_siswa')->where('absensisiswa_id', $id)->delete();

      
        return redirect()->route('absensi.history')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function History() {
        $data = DB::table('absensi_siswa')
                            ->join('siswa1', 'absensi_siswa.id_siswa', '=', 'siswa1.id')
                            ->join('absensi', 'absensi_siswa.absensi_id', '=', 'absensi.absensi_id')
                            ->join('kelas', 'siswa1.kelas', '=', 'kelas.id')
                            ->join('users', 'users.id',  'kelas.kelas') // Sesuaikan join condition dengan relasi sebenarnya
                            ->select(
                                'absensi_siswa.absensisiswa_id',
                                'siswa1.nama_siswa',
                                'absensi.absensi_tanggal',
                                'absensi_siswa.keterangan',
                                'absensi.absensi_keterangan',
                                'kelas.kelas',
                                'users.name as name'
                            );
   
    
    return view('absensi.history', ['data' => $data]);
}

    
public function Rekap() {
    $data = DB::table('absensi_siswa')
                        ->join('siswa1', 'absensi_siswa.id_siswa', '=', 'siswa1.id')
                        ->join('absensi', 'absensi_siswa.absensi_id', '=', 'absensi.absensi_id')
                        ->join('kelas', 'siswa1.kelas', '=', 'kelas.id')
                        ->join('users', 'users.id',  'kelas.kelas') // Sesuaikan join condition dengan relasi sebenarnya
                        ->select(
                            'absensi_siswa.absensisiswa_id',
                            'siswa1.nama_siswa',
                            'absensi.absensi_tanggal',
                            'absensi_siswa.keterangan',
                            'absensi.absensi_keterangan',
                            'kelas.kelas',
                            'users.name as name'
                  
                        );

                        $data = DB::select(DB::raw("SELECT * FROM absensi_siswa"));
                        return view('absensi.Rekap', compact('data'));
}
    
}


