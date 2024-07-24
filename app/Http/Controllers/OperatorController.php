<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('operator.index');
    }
    public function view($id)
    {

        $data = Transaksi::find($id);
        return view('operator.pembayaran.view',compact('data'));
    }

    public function pembayaran(){

        $data = Transaksi::with('user')->get();
        return view('operator.pembayaran.index',compact('data'));;
    }

    public function bayar(Request $request){
        {

            $request->all();
            $data = Transaksi::find($request->id);
            // dd($request->all());
            // $order = Transaksi::select($request->all());

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => $request->id,
                    'gross_amount' => $request->jumlah,
                ),
                'customer_details' => array(
                    'first_name' => auth()->user()->name,
                    // 'phone' => $request->phone,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            // dd($snapToken);
            return view('operator.pembayaran.bayar', compact('snapToken', 'data'));
        }
    }
    public function invoice(Request $request)
    {
        $data = Transaksi::find($request->id);
        return view('operator.pembayaran.invoice', compact('data'));
    }
 public function callback(Request $request){
        $server_key = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$server_key);
        if ($hashed == $request->signature_key) {
            if($request->transaction_status == 'capture' ){
                $order = Transaksi::find($request->order_id);
                $order->update(['status' => 'paid']);
            }elseif($request->transaction_status == 'settlement'){
                $order = Transaksi::find($request->order_id);
                $order->update(['status' => 'paid']);
            }
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
