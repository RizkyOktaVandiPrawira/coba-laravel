<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
        {
        $objek = \App\Buku::latest()->paginate(10);
        $data['objek'] = $objek;
        return view('buku_index', $data);
        } 
    
    public function tambah()
        {
        $data ['objek'] = new \App\Buku();
        $data['action'] = 'UserController@simpan';
        $data['method'] = 'POST';
        $data['nama_tombol'] = 'SIMPAN';
        return view('buku_index', $data);
        }
    public function simpan(Request $request)
        {
            $request->validate([
                'name'=> 'required|min:2',
                'email'=> 'required|email|unique:buku,email',
                'password'=> 'same:password_confirmation'
            ])
        $objek = new \App\Buku();
        $objek -> name = $request ->name;
        $objek -> email = $request ->email;
        $objek -> password = bcrypt($request ->password);
        $objek -> save();
        return back() ->with('pesan', 'Data Sudah Tersimpan');
        } 
    public function edit()
        {
        $data ['objek'] = \App\Buku::findOrFail ($id);
        $data['action'] = ['UserController@update', $id];
        $data['method'] = 'PUT';
        $data['nama_tombol'] = 'UPDATE';
        return view('buku_index', $data);
        }

        public function update(Request $request, $id)
        {
            $request->validate([
                'name'=> 'required|min:2',
                'email'=> 'required|email|unique:buku,email'. $id,
                'password'=> 'same:password_confirmation'
            ])
        $objek = new \App\Buku::FindOrFail($id);
        $objek -> name = $request ->name;
        $objek -> email = $request ->email;
        if ($request->password !="") {
            $objek -> password = bcrypt($request ->password);
        }
        
        $objek -> save();
        return redirect('admin/buku/index') ->with('pesan', 'Data Sudah Terupdate');
        }
        
        public function hapus($id)
        {
            $objek = \App\Buku::findOrFile($id);
            $objek->delete();
            return back()->with('pesan', 'Data Berhasil Dihapus');
        }
        }
    
