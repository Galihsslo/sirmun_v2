<?php

namespace App\Http\Controllers;

use App\Models\JenisPembayaran;
use index;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\User;

class TagihanController extends Controller
{
    public function index()
    {
        $data = Pembayaran::all();
        return view('bendahara.tagihan.index', compact('data'));
    }

    public function create()
    {
        $data = JenisPembayaran::all();
        $petugas = User::where('role', 'bendahara')->get();
        return view('bendahara.tagihan.create',compact('data','petugas'));
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
        return redirect('bendahara/tagihan');
    }

    public function edit($id)
    {
        $petugas = User::where('role', 'bendahara')->get();
        $jenis = JenisPembayaran::all();
        $data = Pembayaran::findOrFail($id);
        return view('bendahara.tagihan.edit', compact('data','petugas','jenis'));
    }

    public function update(Request $request, $id)
    {
        $data = Pembayaran::find($id);
        $data->update($request->all());
        return redirect('bendahara/tagihan');
    }
    public function destroy($id)
    {
        $data = Pembayaran::findOrFail($id);
        $data->delete();
        return redirect('bendahara/tagihan');
    }
}
