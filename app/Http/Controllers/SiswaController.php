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
        $data=DB::select(DB::raw("select * from siswa1"));
        return view('siswa.index', compact('data'));
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
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
             'nama_siswa' => 'required',
             'kelas' => 'required',
             'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
             'alamat' => 'required',
         ]);
     
         DB::insert("INSERT INTO `siswa1` (`id`, `nama_siswa`, `kelas`, `jenis_kelamin`, `alamat`) VALUES (?, ?, ?, ?, ?)",
             [Str::uuid()->toString(), $request->nama_siswa, $request->kelas, $request->jenis_kelamin, $request->alamat]);
     
         return redirect()->route('siswa.index')->with(['success' => 'Data berhasil Disimpan!']);
     }
     
     
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            'nama_siswa' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required',
        ]);
    
        DB::update("UPDATE siswa1 SET  nama_siswa=?, kelas=?, alamat=? WHERE id=?",
            [ $request->nama_siswa, $request->kelas, $request->alamat, $id]);
    
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Diupdate']);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('siswa1')->where('id', $id)->delete();

        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function absensi(Request $request, $id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return redirect()->route('siswa.index')->with(['error' => 'Siswa tidak ditemukan']);
        }

        $siswa->status_absensi = true;
        $siswa->keterangan = $request->input('keterangan');
        $siswa->tanggal_absensi = $request->input('tanggal_absensi');
        $siswa->save();

        return redirect()->route('siswa.index')->with(['success' => 'Absensi berhasil dilakukan untuk ' . $siswa->nama_siswa]);
    }
}