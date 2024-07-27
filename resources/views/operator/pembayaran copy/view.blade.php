@extends('layouts.operator.index')

@section('content')
    <div class="card-container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Detail </h1>
                <form action="/bayar" method="POST">
                    @csrf


                        <div class="mb-3">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" class="form-control" name="id" id="id"
                                value="{{ $data->id }}">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_transaksi" class="form-label">order id</label>
                            <input type="text" class="form-control" name="jenis_transaksi" id="jenis_transaksi"
                                value="{{ $data->id }}" >
                        </div>
                        <div class="mb-3">
                            <label for="jenis_transaksi" class="form-label">Jenis Transaksi</label>
                            <input type="text" class="form-control" name="jenis_transaksi" id="jenis_transaksi"
                                value="{{ $data->jenis_transaksi }}" >
                        </div>
                        <div class="mb-3">
                            <label for="petugas_id" class="form-label">Petugas</label>
                            <input type="id" class="form-control" name="petugas_id" id="petugas_id"
                                value="{{ $data->petugas_id }}" >
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan"
                                value="{{ $data->keterangan }}" >
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">jumlah</label>
                            <input type="text" class="form-control" name="jumlah" id="jumlah"
                            value="{{ $data->jumlah }}" >
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_transaksi" class="form-label">tanggal transaksi</label>
                            <input type="text" class="form-control" name="tanggal_transaksi" id="tanggal_transaksi"
                            value="{{ $data->tanggal_transaksi }}" >
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">status</label>
                            <input type="text" class="form-control" name="status" id="status"
                            value="{{ $data->status }}" >
                        </div>
                    <button type="submit" class="btn btn-primary">Bayar Sekarang</button>

                </form>
            </div>
        </div>
    </div>
@endsection
