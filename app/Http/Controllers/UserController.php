<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use DB;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Request;


class UserController extends Controller
{
    public function index()
    {
        $data = DB::select(DB::raw("SELECT * FROM users"));
        return view('user.index', compact('data'));
    }

    // ... (Other methods)

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required',
            'nama' => 'required',
            'role' => 'required',
            'password'=>'required',
          
        ]);

        DB::insert("INSERT INTO `user` (`id`, `nip`, `nama`, `role`, `password`) VALUES (uuid(), ?, ?, ?, ?)",
        [$request->nip, $request->nama, $request->role, $request->password]);
    return redirect()->route('user.index')->with(['success' => 'Data berhasil Disimpan!']);
    }
    

    public function edit($id)
    {
        $data = DB::table('user')->where('id', $id)->first();
        return view('user.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nip' => 'required',
            'nama' => 'required',
            'role' => 'required',
            'password' => 'required'
        ]);

        $updateData = [
            'nip' => $request->nip,
            'nama' => $request->nama,
            'role' => $request->role,
            'password' => $request->password,
        ];

      

        DB::table('user')->where('id', $id)->update($updateData);

        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Diupdate']);
    }

    public function destroy($id)
    {
        DB::table('user')->where('id', $id)->delete();

        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function logout()
    {
        Auth::logout();

        return redirect('/login')->with('success', 'Logout berhasil.');
    }
   

}