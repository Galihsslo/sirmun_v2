<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {

        $data = Transaksi::all();
        return view('bendahara.pembayaran.index',compact('data'));
    }

    // public function view(string $id)
    // {
    //     $user = User::find($id)->first();
    //     $data = Transaksi::all();
    //     return view('bendahara.pembayaran.index',compact('data','user'));
    // }
}
