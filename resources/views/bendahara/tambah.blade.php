@extends('layouts.bendahara.index')
@section('row')
    <div class="col-xl-12 col-lg-9">

        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pengguna</h6>
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



                                {{-- <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                    role="grid" aria-describedby="dataTable_info" style="width: 100%;">

                                    <thead>
                                        <tr role="row">
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending" style="width: 50px;">
                                                Nama</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width:   40px;">Email</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 76px;">Role</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 31px;">Foto</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 20px;">Telpon</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 20px;">Alamat</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 99px;">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr class="odd">
                                            <td class="sorting_1"></td>
                                            <td>as</td></td>
                                            <td>da</td>
                                            <td>
                                                <a href="/admin/user/1/edit" class="btn btn-primary btn-sm md-1">Edit</a>
                                                <a href="/admin/user/1/delete" class="btn btn-danger btn-sm ">Delete</a>
                                            </td>
                                        </tr>

                                    </tbody>

                                </table> --}}
                                {{-- <form>
                                    <div class="form-group">
                                        <label for="kegiatan">Kegiatan</label>
                                        <input type="text" class="form-control" name="kegiatan" id="kegiatan" placeholder="Nama Kegiatan">
                                    </div>
                                </form> --}}
                                <div class="col-md-12">
                                    <div class="card border-0 shadow">
                                        <div class="card-header">
                                            <h6 class="m-0 font-weight-bold"><i class="fas fa-user-circle"></i> Tambah Pengguna</h6>
                                        </div>

                                        <div class="card-body">
                                            <form method="POST" action="#" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <div class="form-group">
                                                    <label class="text-uppercase">Nama</label>
                                                    <input type="nama" name="nama" class="form-control"
                                                        value="Masukkan Nama" required autofocus />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-uppercase">email</label>
                                                    <input type="email" name="email" class="form-control"
                                                        value="{{ old('email') ?? auth()->user()->email }}" required autofocus />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-uppercase">role</label>
                                                            <select name="role" id="role" class="form-select" aria-label="Default select example">
                                                                @foreach ($data as $user )
                                                                <option value="{{ $user->role }}"selected>{{ $user->role }}</option>

                                                                @endforeach
                                                              </select>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-uppercase">foto</label>
                                                    <input type="foto" name="foto" class="form-control"
                                                        value="{{ old('foto') ?? auth()->user()->foto }}" required autofocus />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-uppercase">telpon</label>
                                                    <input type="telpon" name="telpon" class="form-control"
                                                        value="{{ old('telpon') ?? auth()->user()->telpon }}" required autofocus />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-uppercase">password</label>
                                                    <input type="password" name="password" class="form-control"
                                                        value="********" required autofocus />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-uppercase">Alamat</label>
                                                    <input type="alamat" name="alamat" class="form-control"
                                                        value="{{ old('alamat') ?? auth()->user()->alamat }}" required autofocus />
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-primary text-uppercase" type="submit">
                                                        Update Profile
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
