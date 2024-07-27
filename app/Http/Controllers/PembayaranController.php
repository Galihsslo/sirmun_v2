<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index(){

        $data = Pembayaran::all();
        $pembayaran = Pembayaran::where('id_jenis','!=', 4)->with('jenisPembayaran', 'user')->get();
        return view('operator.pembayaran.index',compact('data','pembayaran'));
    }
    public function view($id)
    {

        $data = Pembayaran::find($id);
        return view('operator.pembayaran.view',compact('data'));
    }

    public function pembayaran(){

        $data = Pembayaran::with('user')->get();
        return view('operator.pembayaran.index',compact('data'));;
    }

    public function bayar(Request $request, $id){
        {

            $data = Pembayaran::find($id);
            // dd($data);
            // $request->all();
            // $data = Pembayaran::find($request->id);
            // dd($request->all());
            // $order = Pembayaran::select($request->all());

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
                    'order_id' => $data->id,
                    'gross_amount' => $data->nominal,
                ),
                'customer_details' => array(
                    'first_name' => auth()->user()->nama,
                    // 'phone' => $request->phone,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            return view('operator.pembayaran.bayar', compact('snapToken', 'data'));
        }
    }
    public function invoice(Request $request)
    {
        $data = Pembayaran::find($request->id);
        return view('operator.pembayaran.invoice', compact('data'));
    }
 public function callback(Request $request){
        $server_key = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$server_key);
        if ($hashed == $request->signature_key) {
            if($request->transaction_status == 'capture' ){
                $order = Pembayaran::find($request->order_id);
                // dd($order);
                $order->update(['status' => 'paid']);
            }elseif($request->transaction_status == 'settlement'){
                $order = Pembayaran::find($request->order_id);
                $order->update(['status' => 'paid']);
            }
        }
    }

}
