<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaksi;
use App\Models\Inventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class InventarisController extends Controller
{
    public function index(){
        $data = Inventaris::all();
        return view('operator.inventaris.index', compact('data'));
    }
    public function create(){
        $inventaris = Inventaris::all();
        return view('operator.inventaris.tambah', ['inventaris' => $inventaris]);
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'author_id' => 'required',
        ]);

        // dd($request->all());
        $foto = $request->file('image');
        $foto_ekstensi = $foto->extension();
        $nama_foto = date('YmdHis') . "." . $foto_ekstensi;
        $foto->move(public_path('foto_inventaris'), $nama_foto);
        // dd($request->all());
        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $nama_foto,
            'author_id' => $request->input('author_id'),
        ];
        Inventaris::create($data);
        return redirect('/operator/inventaris')->with('success', 'Data Berhasil Disimpan');
    }
    public function edit($id){
        $inventaris = Inventaris::find($id);
        $users = User::all();
        return view('operator.inventaris.edit', compact('inventaris', 'users'));
    }
    public function update(Request $request ,$id){
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'author_id' => 'required',

        ]);

        // dd($request->all());
        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'author_id' => $request->input('author_id'),
        ];
        if ($request->hasFile('foto')) {
            $request->validate([
                'foto'=>'mimes:png,jpg,jpeg'
            ],[
                'foto.mimes' => 'File harus berekstensi png,jpg,jpeg'
            ]);
            $foto = $request->file('foto');
            $foto_ekstensi = $foto->extension();
            $nama_foto = date('YmdHis') . "." . $foto_ekstensi;
            $foto->move(public_path('foto_inventaris'), $nama_foto);
            // dd($request->all());

            $data_foto = Inventaris::where('id', $id)->first();
            File::delete(public_path('foto_inventaris').'/' . $data_foto->foto);

            $data = [
                'foto' => $nama_foto
            ];
        }
        Inventaris::where('id', $id)->update($data);
        return redirect('/operator/inventaris')->with('success', 'Data Berhasil Di Edit');
    }
    public function destroy($id){
        $data = Inventaris::where('id', $id)->first();
        File::delete(public_path('foto_inventaris').'/' . $data->image);
        Inventaris::where('id', $id)->delete();
        return redirect('/operator/inventaris')->with('success', 'Data Berhasil Dihapus');
    }
}
