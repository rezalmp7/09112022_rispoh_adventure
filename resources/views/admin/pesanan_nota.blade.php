<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            max-width: 100%;
            max-height: 100%;
        }
        body {
            padding: 5px;
            position: relative;
            width: 100%;
            height: 100%;
        }
        table th,
        table td {
            padding: .625em;
        text-align: center;
        }
        table .kop:before {
            content: ': ';
        }
        .left {
            text-align: left;
        }
        table #caption {
        font-size: 1.5em;
        margin: .5em 0 .75em;
        }
        table.border {
        width: 100%;
        border-collapse: collapse
        }

        table.border tbody th, table.border tbody td {
        border: thin solid #000;
        padding: 2px
        }
        .ttd td, .ttd th {
            padding-bottom: 4em;
        }
    </style>
</head>
<body>
    <div id="printable" class="container" style="padding: 20px">
        <table border="0" cellpadding="0" cellspacing="0" width="485" class="border" style="overflow-x:auto;">
            <thead>
                <tr>
                    <td colspan="6" width="485" id="caption">RISPOH ADVENTURE</td>
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
            </thead>
            <tbody>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Lama</th>
                    <th colspan="2">Jumlah Harga</th>
                </tr>
                @php
                    $total_harga = 0;
                @endphp
                @foreach ($pesanan as $item => $a)
                @php
                    $jumlah_harga = $a->qty*$a->harga*$a->lama_sewa;
                    $total_harga += $jumlah_harga;
                @endphp
                <tr>
                    <td align="right">{{ $item+1 }}</td>
                    <td>{{ $a->nama_produk }}</td>
                    <td align="right">{{ $a->qty }} pcs</td>
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
    <script>
        window.print();
    </script>
</body>
</html>