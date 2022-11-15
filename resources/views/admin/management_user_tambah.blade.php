@extends('admin.template')

@section('content')
        <div class="content p-5">
            <div class="col-12 m-0 pb-5">
                <h2 class="text-center"><b>Tambah Management User</b></h2>
            </div>
            <div class="col-12 m-0 p-0 row justify-content-center">
                <div class="col-md-4 m-0 p-0">
                    <form method="POST" action="{{ url('/') }}/admin/user/store">
                        @csrf
                        <div class="mb-3">
                            <label for="inputNama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="inputNama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="inputUsername" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        @if (\Session::has('message'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: "{{ \Session::get('message') }}",
                showConfirmButton: false,
                timer: 1500
            })
        </script>
        @endif
        <script>
        $(document).ready(function () {
            $('.dataTables').DataTable();
        });
        </script>
@endsection