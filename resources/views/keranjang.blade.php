@extends('templateTransaksi')

@section('content')
        <div class="content p-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                </ol>
            </nav>
            <div class="p-5 m-0">
                <div class="row col-12 m-0 p-0">
                    <form method="POST" action="{{ url('/') }}/keranjang/update">
                        @csrf
                        <div class="col-12 m-0 py-4 clearfix">
                            <a href="{{ url('/') }}/katalog" class="btn btn-sm btn-success">Belanja Lagi</a>
                            <button type="submit" class="btn btn-sm btn-primary float-end">Update</button>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Lama Sewa</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataKeranjang as $a)
                                <tr>
                                    <input type="hidden" name="id_produk[]" value="{{ $a['id_produk'] }}">
                                    <td>{{ $a["nama_produk"] }}</td>
                                    <td>
                                        <input type="number" value="{{ $a["jumlah"] }}" class="form-control" name="jumlah[]">
                                    </td>
                                    <td>Rp {{ number_format($a["harga_produk"]) }}/24 Jam</td>
                                    <td>
                                        <select class="form-select" aria-label="Default select example" name="lama[]">
                                            <option value="1" @if($a['lama'] == 1) selected @endif>24 Jam / 1 Hari</option>
                                            <option value="2" @if($a['lama'] == 2) selected @endif>48 Jam / 2 Hari</option>
                                            <option value="3" @if($a['lama'] == 3) selected @endif>72 Jam / 3 Hari</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="{{ url('/') }}/keranjang/destroy/{{ $a['id_produk'] }}" onclick="return confirm('Yakin Hapus Produk??')" class="btn btn-sm btn-danger">Hapus</a>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <!-- Call Function -->
        <script>
            set_height_1_1();
        </script>
@endsection