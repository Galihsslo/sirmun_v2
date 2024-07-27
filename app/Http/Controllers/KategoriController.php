<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPembayaran;

class KategoriController extends Controller
{
    public function kategori(){
        $data = JenisPembayaran::all();
        return view('bendahara.kategori.index',compact('data'));
    }
    public function edit($id){

        $kategori = JenisPembayaran::find($id);
        return view('bendahara.kategori.edit',compact('kategori'));
    }
    public function update(Request $request, $id){


            $request->validate([
                'nama' => 'required',
                'status' => 'required',
                'periode' => 'required',
                'keterangan' => 'required',
            ]);

            $data = [
                'nama' => $request->input('nama'),
                'status' => $request->input('status'),
                'periode' => $request->input('periode'),
                'keterangan' => $request->input('keterangan'),
            ];
            JenisPembayaran::where('id', $id)->update($data);
            return redirect('/kategori')->with('success', 'Data Berhasil Disimpan');
            // dd($request->all());

        }


    public function create(){
        return view('bendahara.kategori.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'status' => 'required',
            'periode' => 'required',
            'keterangan' => 'required',
        ]);

        JenisPembayaran::create([
            'nama' => $request->input('nama'),
            'status' => $request->input('status'),
            'periode' => $request->input('periode'),
            'keterangan' => $request->input('keterangan'),
        ]);

        return redirect('/kategori')->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy($id){
        JenisPembayaran::find($id)->delete();
        return redirect('/kategori')->with('success', 'Data Berhasil Dihapus');
    }
}
