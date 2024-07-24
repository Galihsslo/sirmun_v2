<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('admin.user.index', ['data' => $data]);
    }

    public function search(Request $request) {
        $query = $request->input('query');
        $results = User::where('nama', 'LIKE', "%{$query}%")->get(); // Sesuaikan dengan kolom yang Anda cari

        return view('admin.user.index', compact('results')); // Kembali ke view yang sama dengan hasil pencarian

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = User::all();
        return view('admin.user.tambah', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'role' => 'required',
            'foto' => 'required|mimes:png,jpg,jpeg',
            'telpon' => 'required',
            'password' => 'required',
            'alamat' => 'required'
        ]);

        // dd($request->all());
        $foto = $request->file('foto');
        $foto_ekstensi = $foto->extension();
        $nama_foto = date('YmdHis') . "." . $foto_ekstensi;
        $foto->move(public_path('foto_user'), $nama_foto);
        // dd($request->all());
        $data = [
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'foto' => $nama_foto,
            'telpon' => $request->input('telpon'),
            'password' => bcrypt($request->input('password')),
            'alamat' => $request->input('alamat')
        ];
        User::create($data);
        return redirect('/admin/user')->with('success', 'Data Berhasil Disimpan');
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
    public function edit(Request $request, $id)
    {
        $data = User::find($id);
        // dd($data);
        // $data = User::where('id', $id)->first();
        return view('admin.user.edit', compact('data' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'role' => 'required',
            'foto' => 'required|mimes:png,jpg,jpeg',
            'telpon' => 'required',
            'password' => 'required',
            'alamat' => 'required'
        ]);

        // dd($request->all());
        $data = [
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'telpon' => $request->input('telpon'),
            'password' => bcrypt($request->input('password')),
            'alamat' => $request->input('alamat')
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
            $foto->move(public_path('foto_user'), $nama_foto);
            // dd($request->all());

            $data_foto = User::where('id', $id)->first();
            File::delete(public_path('foto_user').'/' . $data_foto->foto);

            $data = [
                'foto' => $nama_foto
            ];
        }
        User::where('id', $id)->update($data);
        return redirect('/admin/user')->with('success', 'Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $data = User::where('id', $id)->first();
        File::delete(public_path('foto_user').'/' . $data->foto);
        User::where('id', $id)->delete();
        return redirect('/admin/user')->with('success', 'Data Berhasil Dihapus');
    }
}
