<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index($id)
    {

        $user = User::find($id)->first();
        $data = Transaksi::all();
        return view('bendahara.pembayaran.index',compact('data','user'));
    }
}
