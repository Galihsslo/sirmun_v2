<?php

namespace App\Http\Controllers;

use App\Models\JenisPembayaran;
use index;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\User;

class DonasiController extends Controller
{
    public function index()
    {
        $data = Pembayaran::all();
        $pembayaran = Pembayaran::where('id_jenis', '=', 4)->with('jenisPembayaran', 'user')->get();
        return view('operator.donasi.index', compact('data','pembayaran'));
    }

    public function create()
    {
        $data = JenisPembayaran::all();
        $petugas = User::where('role', 'operator')->get();
        return view('operator.donasi.create',compact('data','petugas'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = new Pembayaran();
        $data->id = $request->id;
        $data->nama = $request->nama;
        $data->petugas = $request->petugas;
        $data->id_jenis = $request->id_jenis;
        $data->is_expense = $request->is_expense;
        $data->nominal = $request->nominal;
        $data->date = $request->date;
        $data->status = $request->status;
        $data->save();
        return redirect('operator/donasi');
    }

    public function edit($id)
    {
        $petugas = User::where('role', 'operator')->get();
        $jenis = JenisPembayaran::all();
        $data = Pembayaran::findOrFail($id);
        return view('operator.donasi.edit', compact('data','petugas','jenis'));
    }

    public function update(Request $request, $id)
    {
        $data = Pembayaran::find($id);
        $data->update($request->all());
        return redirect('operator/donasi');
    }
    public function destroy($id)
    {
        $data = Pembayaran::findOrFail($id);
        $data->delete();
        return redirect('operator/donasi');
    }
}
