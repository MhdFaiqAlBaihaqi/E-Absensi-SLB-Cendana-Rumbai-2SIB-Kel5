<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use DB;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $data = DB::select(DB::raw("SELECT * FROM users"));
        return view('user.index', compact('data'));
    }
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required',
            'kelas' => 'required',
        ]);
    
        // Menggunakan Eloquent untuk menyimpan data
        User::create([
            'id' => Str::uuid()->toString(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'kelas' => $request->kelas,
        ]);
    
        return redirect()->route('user.index')->with(['success' => 'Data berhasil Disimpan!']);
    }

   
    public function edit($id)
    {
        $data = DB::table('users')->where('id', $id)->first();
        return view('user.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
           
            'name' => 'required',
            'email' => 'required',           
            'role' => 'required',
            
        ]);

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,         
            'role' => $request->role,
        ];
        DB::table('users')->where('id', $id)->update($updateData);

        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Diupdate']);
    }

    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function logout()
    {
       

        return redirect('/login')->with('success', 'Logout berhasil.');
    }
    public function show()
    {
        //
    }
    public function showUser()
    {
     
        $data = DB::select(DB::raw("SELECT * FROM users"));
        return view('user.index', compact('data'));
    }
}