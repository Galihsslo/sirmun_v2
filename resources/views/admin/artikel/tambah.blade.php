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
                                                    <input type="title" name="title" class="form-control"
                                                        placeholder="Masukkan title" required autofocus />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-uppercase">title</label>
                                                    <input type="text" name="title" class="form-control"
                                                        placeholder="Masukkan title" required autofocus />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-uppercase">Content</label>
                                                    <input type="text" name="content" class="form-control"
                                                        placeholder="Masukkan content" required autofocus />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-uppercase">Content</label>
                                                    <input type="text" name="content" class="form-control"
                                                        placeholder="Masukkan content" required autofocus />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-uppercase">role</label>
                                                            <select name="role" id="role" class="form-select" aria-label="Default select example">
                                                                <option placeholder="Pilih Role"selected>{{ auth()->user()->nama }}</option>
                                                                <option placeholder="Pilih Role">Admin</option>
                                                                <option placeholder="Pilih Role">Bendahara</option>
                                                                <option placeholder="Pilih Role">Operator</option>
                                                            </select>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="foto" class="form-label">Masukkan Foto</label>
                                                    <input class="form-control" type="file" id="foto" name="foto" multiple>
                                                  </div>
                                                <div class="form-group">
                                                    <label class="text-uppercase">telpon</label>
                                                    <input type="telpon" name="telpon" class="form-control"
                                                        placeholder="Masukkan Telpon" required autofocus />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-uppercase">password</label>
                                                    <input type="text" name="password" class="form-control"
                                                        placeholder="Masukkan Password" required autofocus />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-uppercase">Alamat</label>
                                                    <input type="alamat" name="alamat" class="form-control"
                                                        placeholder="Masukkan Alamat" required autofocus />
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-primary text-uppercase" type="submit">
                                                        Tambah Pengguna
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
