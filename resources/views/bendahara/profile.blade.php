@extends('layouts.bendahara.index')
@section('row')
    <div class="col-xl-12 col-lg-9">

        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pengguna</h6>
                {{-- <div class="dropdown no-arrow">
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
                </div> --}}
            </div>
            <!-- Card Body -->
            <div class="card-body">

                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-md-12">
                                    <div class="card border-0 shadow">
                                        <div class="card-header">
                                            <h6 class="m-0 font-weight-bold"><i class="fas fa-user-circle"></i> EDIT PROFILE</h6>
                                        </div>

                                        <div class="card-body">
                                            <form method="POST" action="#">
                                                @csrf
                                                @method('PUT')

                                                <div class="form-group">
                                                    <label class="text-uppercase">Nama</label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ old('name') ?? auth()->user()->nama }}" required autofocus
                                                        autocomplete="name" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-uppercase">Email</label>
                                                    <input type="email" name="email" class="form-control"
                                                        value="{{ old('email') ?? auth()->user()->email }}" required autofocus />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-uppercase">Alamat</label>
                                                    <input type="alamat" name="alamat" class="form-control"
                                                        value="{{ old('alamat') ?? auth()->user()->alamat }}" required autofocus />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-uppercase">Telpon</label>
                                                    <input type="telpon" name="telpon" class="form-control"
                                                        value="{{ old('telpon') ?? auth()->user()->telpon }}" required autofocus />
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
