@if ($errors->any())
    {{-- <div class="alert alert-danger">

    </div> --}}
    <div class="alert alert-danger modal-dialog modal-xl">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
    </div>
@endif
{{-- @if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            Swal.fire({{ $error }});
        </script>
    @endforeach
@endif --}}
