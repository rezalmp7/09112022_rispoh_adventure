@extends('admin.template')

@section('content')
        <div class="content p-5">
            <div class="col-12 m-0 pb-5">
                <h2 class="text-center"><b>Pesanan</b></h2>
            </div>
            <div class="col-12 m-0 p-0">
                <div class="table-responsive col-12 m-0 p-0">
                    <table class="table table-borderless" style="width:100%">
                        <tbody>
                            <tr>
                                <th colspan="6" class="col-12 m-0 p-4 text-center fs-4" id="caption">RISPOH ADVENTURE</th>
                            </tr>
                            <tr>
                                <td colspan="2">Nama Pelanggan</td>
                                <td class="left kop">{{ $transaksi->nama_pelanggan }}</td>
                                <td></td>
                                <td>Alamat</td>
                                <td class="left kop">{{ $transaksi->alamat_pelanggan }}</td>
                            </tr>
                            <tr>
                                <td colspan="2">No Hp</td>
                                <td class="left kop">{{ $transaksi->noHp_pelanggan }}</td>
                                <td></td>
                                <td>Tanggal</td>
                                <td class="left kop">{{ date('d/m/Y', strtotime($transaksi->tgl_pesan)) }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <tbody>
                    </table>
                    <table class="table table-striped mt-5" style="width:100%">
                        <thead>
                            <tr>
                                <th colspan="6" class="col-12 m-0 p-4 text-center fs-5" id="caption">Produk</th>
                            </tr>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Produk</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Lama</th>
                                <th colspan="2">Jumlah Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total_harga = 0;
                            @endphp
                            @foreach ($pesanan as $item => $a)
                            @php
                                $jumlah_harga = $a->qty*$a->harga*$a->lama_sewa;
                                $total_harga += $jumlah_harga;
                            @endphp
                            <tr>
                                <td>{{ $item+1 }}</td>
                                <td>{{ $a->nama_produk }}</td>
                                <td>{{ $a->qty }} pcs</td>
                                <td>Rp {{ $a->harga }}</td>
                                <td>{{ $a->lama_sewa }} Hari</td>
                                <td colspan="2">Rp {{ number_format($jumlah_harga) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <th colspan="5"> TOTAL</th>
                                <td>Rp {{ number_format($total_harga) }}</td>
                            </tr>
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