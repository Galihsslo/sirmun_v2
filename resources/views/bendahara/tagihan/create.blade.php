@extends('layouts.admin.index')
@section('row')
    <div class="col-xl-12 col-lg-9">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tagihan</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">

                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-md-12">
                                <div class="card border-0 shadow">
                                    <div class="card-header">
                                        <h6 class="m-0 font-weight-bold"><i class="fas fa-user-circle"></i> Tambah Tagihan
                                        </h6>
                                    </div>

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('store.tagihan') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <div class="mb-3">
                                                <label class="text-uppercase">petugas</label>
                                                <select class="form-control" id="petugas" name="petugas" required>
                                                    @foreach($petugas as $petugas)
                                                        <option value="{{ $petugas->id }}">{{ $petugas->nama }}</option>
                                                    @endforeach
                                                    </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-uppercase" for="id_jenis">Jenis Pembayaran</label>
                                                <select class="form-control" id="id_jenis" name="id_jenis" required>
                                                @foreach($data as $jenis)
                                                    <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="mt-3">
                                                <label class="text-uppercase">Nama</label>
                                                <input type="text" name="nama" class="form-control" required
                                                    autofocus />
                                            </div>

                                            <div class="mb-3">
                                                <label for="is_expense" class="form-label text-uppercase">Kategori</label>
                                                <select class="form-control" id="is_expense" name="is_expense" required>
                                                    <option value="N"> Pemasukan</option>
                                                    <option value="Y"> Pengeluaran</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-uppercase">Nominal</label>
                                                <input type="number" name="nominal" class="form-control" required
                                                    autofocus />
                                            </div>
                                            <div class="form-group">
                                                <label class="text-uppercase">Tanggal Bayar</label>
                                                <input type="date" name="date" class="form-control" required
                                                    autofocus />
                                            </div>
                                            <div class="form-group">
                                                <label class="text-uppercase">Status Tagihan</label>
                                                <select class="form-control" id="status" name="status" required>
                                                    <option value="unpaid"> Belum Dibayar</option>
                                                    <option value="paid"> Sudah Dibayar</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary text-uppercase" type="submit">
                                                    Tambah Kategori
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
@if (Session::get('success'))
    <div class="alert alert-success">{{ Session::get('success') }}"></div>
@endif
