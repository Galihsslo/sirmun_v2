@extends('layouts.operator.index')

@section('content')
    <div class="card" >
        <div class="card-body">
            <div id="snap-container">
        <div class="card">
            <div class="card-body">
              <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                  <div class="col-xl-9">
                    <p style="color: #7e8d9f;font-size: 20px;">Faktur {{ $data->nama }}<strong>->{{ $data->id }}</strong></p>
                  </div>
                  <div class="col-xl-3 float-end">
                    <a data-mdb-ripple-init class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                        class="fas fa-print text-primary"></i> Print</a>
                    <a data-mdb-ripple-init class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                        class="far fa-file-pdf text-danger"></i> Export</a>
                  </div>
                  <hr>
                </div>

                <div class="container">
                  {{-- <div class="col-md-12">
                    <div class="text-center">
                      <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>

                    </div>

                  </div> --}}


                  <div class="row">
                    <div class="col-xl-8">
                      <ul class="list-unstyled">
                        <li class="text-muted">To: <span style="color:#5d9fc5 ;">{{ $data->petugas }}</span></li>
                        <li class="text-muted">Street, City</li>
                        <li class="text-muted">State, Country</li>
                        <li class="text-muted"><i class="fas fa-phone"></i> 123-456-789</li>
                      </ul>
                    </div>
                    <div class="col-xl-4">
                      <p class="text-muted">Invoice</p>
                      <ul class="list-unstyled">
                        <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                            class="fw-bold">ID:</span>{{ $data->id }}</li>
                        <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                            class="fw-bold">Creation Date: </span>{{ $data->date }}</li>
                        <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                            class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold">
                                {{ $data->status }}</span></li>
                      </ul>
                    </div>
                  </div>

                  <div class="row my-2 mx-1 justify-content-center">
                    <table class="table table-striped table-borderless">
                      <thead style="background-color:#84B0CA ;" class="text-white">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Description</th>
                          <th scope="col">Qty</th>
                          <th scope="col">Unit Price</th>
                          <th scope="col">Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>{{ $data->id }}</td>
                          <td>{{ $data->id_jenis }}</td>
                          <td>{{ $data->nama }}</td>
                          <td>Rp.{{ $data->nominal }}</td>

                      </tbody>

                    </table>
                  </div>
                  <div class="row">
                    <div class="col-xl-8">
                      <p class="ms-3">Add additional notes and payment information</p>

                    </div>
                    <div class="col-xl-3">
                      <ul class="list-unstyled">
                        <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>$1110</li>
                        <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Tax(15%)</span>$111</li>
                      </ul>
                      <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span
                          style="font-size: 25px;">$1221</span></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-xl-10">
                      <p>Thank you for your purchase</p>
                    </div>
                    <div class="col-xl-2">
                      <button  type="button" id="pay-button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary text-capitalize"
                        style="background-color:#60bdf3 ;">Pay Now</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
          // Also, use the embedId that you defined in the div above, here.
          window.snap.embed('{{ $snapToken }}', {
            embedId: 'snap-container',
            onSuccess: function (result) {
              /* You may add your own implementation here */
            //   alert("payment success!"); console.log(result);
            window.location.href = '/invoice/{{ $data->id }}';
            },
            onPending: function (result) {
              /* You may add your own implementation here */
              alert("wating your payment!"); console.log(result);
            },
            onError: function (result) {
              /* You may add your own implementation here */
              alert("payment failed!"); console.log(result);
            },
            onClose: function () {
              /* You may add your own implementation here */
              alert('you closed the popup without finishing the payment');
            }
          });
        });
      </script>


@endsection
