<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaksi;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class BendaharaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendapatan = Pembayaran::where('is_expense', 'N')->get(['nominal', 'date']);
        $pengeluaran = Pembayaran::where('is_expense', 'Y')->get(['nominal', 'date']);

        $dataPendapatan = $pendapatan->map(function ($item) {
            return [
                'nominal' => $item->nominal,
                'date' => $item->date,
            ];
        });

        $dataPengeluaran = $pengeluaran->map(function ($item) {
            return [
                'nominal' => $item->nominal,
                'date' => $item->date,
            ];
        });

        $data = Pembayaran::all();
        $amount = Pembayaran::where('status', 'paid')->where('is_expense', 'N')->sum('nominal');
        $expense = Pembayaran::where('status', 'paid')->where('is_expense', 'Y')->sum('nominal');
        $selisih = $amount - $expense;
        return view('bendahara.index', compact(
            'data',
            'amount',
            'expense',
            'selisih',
            'dataPengeluaran',
            'dataPendapatan'
        ));
    }
    public function profile()
    {
        return view('bendahara.profile');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = User::orderBy('id', 'desc')->get();
        return view('bendahara.tambah', ['data' => $data]);
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
