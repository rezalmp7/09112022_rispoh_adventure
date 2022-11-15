@extends('admin.template')

@section('content')
        <div class="content p-5">
            <div class="col-12 m-0 pb-5">
                <h2 class="text-center"><b>Pesanan</b></h2>
            </div>
            <div class="col-12 m-0 p-0">
                <div class="table-responsive col-12 m-0 p-0">
                    <table class="dataTables table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Pelanggan</th>
                                <th>Tanggal</th>
                                <th>Produk</th>
                                <th>Pembayaran</th>
                                <th>Lunas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $item)
                            <tr>
                                <td>{{ $item->kd_transaksi }}</td>
                                <td>
                                    <div class="m-0 p-0">{{ $item->nama_pelanggan }}</div>
                                    <small class="m-0 p-0">{{ $item->noHp_pelanggan }}</small>
                                    <hr class="p-0 m-0">
                                    <small class="m-0 p-0">{{ $item->alamat_pelanggan }}</small>
                                </td>
                                <td>
                                    {{ date('d-m-Y', strtotime($item->tgl_pesan)) }}
                                </td>
                                <td>
                                    @foreach ($pesanan[$item->id] as $a)
                                        <div class="m-0 p-0">{{ $a->nama_produk }}</div>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($pesanan[$item->id] as $a)
                                        <div class="m-0 p-0">{{ $a->qty }} Pcs</div>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($pesanan[$item->id] as $a)
                                        <div class="m-0 p-0">{{ $a->lama_sewa }} Hari</div>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ url('/') }}/admin/pesanan/show/{{ $item->id }}" class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ url('/') }}/admin/pesanan/print/{{ $item->id }}" target="_blank" class="btn btn-sm btn-primary">Print</a>
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