<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
    <div id="printable" class="container" style="padding: 20px">
        <h2 class="text-center py-4">Laporan Pesanan</h2>
        <table class="dataTables table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Produk</th>
                    <th>Pembayaran</th>
                    <th>Lunas</th>
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>

    <script>
        window.print();
    </script>
</body>
</html>