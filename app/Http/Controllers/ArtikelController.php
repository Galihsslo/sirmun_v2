<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //join tabel artikel dimana artikel.author_id = user.id
        // $artikel['artikel'] = artikel::join('user', 'user.id', '=', 'artikel.author_id')->get();
        // return view('admin.artikel.index', $artikel);
        $artikel = artikel::with('author')->get();
        return view('admin.artikel.index', compact('artikel'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('admin.artikel.tambah', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
        $foto->move(public_path('foto_artikel'), $nama_foto);
        // dd($request->all());
        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $nama_foto,
            'author_id' => $request->input('author_id'),
        ];
        artikel::create($data);
        return redirect('/admin/artikel')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $artikel = artikel::find($id);
        $users = User::all();
        return view('admin.artikel.edit', compact('artikel', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
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
            $foto->move(public_path('foto_artikel'), $nama_foto);
            // dd($request->all());

            $data_foto = artikel::where('id', $id)->first();
            File::delete(public_path('foto_artikel').'/' . $data_foto->foto);

            $data = [
                'foto' => $nama_foto
            ];
        }
        artikel::where('id', $id)->update($data);
        return redirect('/admin/artikel')->with('success', 'Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $data = artikel::where('id', $id)->first();
        File::delete(public_path('foto_artikel').'/' . $data->image);
        artikel::where('id', $id)->delete();
        return redirect('/admin/artikel')->with('success', 'Data Berhasil Dihapus');
    }
}
