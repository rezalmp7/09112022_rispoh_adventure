@extends('admin.template')

@section('content')
        <div class="content p-5">
            <div class="col-12 m-0 pb-5">
                <h2 class="text-center"><b>Management User</b></h2>
            </div>
            <div class="col-12 m-0 p-0">
                <div class="col-12 m-0 py-3 mb-3 text-end">
                    <a href="{{ url('/') }}/admin/user/tambah" class="btn btn-sm btn-success">Tambah User</a>
                </div>
                <div class="table-responsive col-12 m-0 p-0">
                    <table class="dataTables table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item => $a)
                            <tr>
                                <td>{{ $item+1 }}</td>
                                <td>{{ $a->name }}</td>
                                <td>{{ $a->username }}</td>
                                <td>
                                    <a type="button" href="{{ url('/') }}/admin/user/edit/{{ $a->id }}" class="btn btn-sm px-3 btn-warning">
                                        <iconify-icon icon="akar-icons:edit"></iconify-icon>
                                    </a>
                                    @if($a->id != 1)
                                    <a class="btn btn-sm px-3 btn-danger" href="{{ url('/') }}/admin/user/delete/{{ $a->id }}" onclick="return confirm('Yakin Hapus {{ $a->nama }}')">
                                        <iconify-icon icon="fluent:delete-24-regular"></iconify-icon>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
        $(document).ready(function () {
            $('.dataTables').DataTable();
        });
        </script>
@endsection