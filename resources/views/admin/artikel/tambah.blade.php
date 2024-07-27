@extends('layouts.admin.index')
@section('row')
<div class="col-xl-12 col-lg-9">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Artikel</h6>
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
                                            <h6 class="m-0 font-weight-bold"><i class="fas fa-user-circle"></i> Tambah Artikel</h6>
                                        </div>

                                        <div class="card-body">
                                            <form method="POST" action="{{ route('artikel.store') }}" enctype="multipart/form-data">
                                                @csrf
                                                @method('POST')

                                                <div class="form-group">
                                                    <label class="text-uppercase">Judul</label>
                                                    <input type="nama" name="title" class="form-control"
                                                        placeholder="Masukkan Nama" required autofocus />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-uppercase">content</label>
                                                    <input type="content" name="content" class="form-control"
                                                        placeholder="Masukkan content" required autofocus />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="image" class="form-label">Masukkan Foto</label>
                                                    <input class="form-control" type="file" id="image" name="image" multiple>
                                                </div>
                                                {{-- <div class="form-group">
                                                    <label class="text-uppercase">author_id</label>
                                                    <input type="author_id" name="author_id" class="form-control"
                                                        placeholder="Masukkan author_id" required autofocus />
                                                </div> --}}
                                                <div class="mb-3">
                                                    <label for="author_id" class="form-label">Pilih Penulis</label>
                                                    <select class="form-control" id="author_id" name="author_id" required>
                                                        <option value="">-- Pilih Penulis --</option>
                                                        @foreach($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-primary text-uppercase" type="submit">
                                                        Tambah Artikel
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
