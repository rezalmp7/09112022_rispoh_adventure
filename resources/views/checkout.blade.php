@extends('templateTransaksi')

@section('content')
        <div class="content p-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Pemesanan</li>
                </ol>
            </nav>
            <div class="p-5 m-0">
                <div class="row col-12 m-0 p-0">
                    <form method="POST" action="{{ url('/') }}/checkout/store" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 m-0 p-0 row justify-content-center">
                            <div class="col-6 border rounded p-4 bg-secondary bg-opacity-10">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label"><b>Nama Pemesan</b></label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" placeholder="Nama Pemesan">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label"><b>Alamat Pemesan</b></label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3" placeholder="Alamat"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label"><b>No Hp</b></label>
                                    <input type="text" class="form-control" name="noHp" id="exampleFormControlInput1" placeholder="No Hp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label"><b>Upload Identitas</b></label>
                                    <input class="form-control" name="identitas" type="file" id="formFile">
                                </div>
                                <div class="col-12 mb-3 text-end">
                                    <button class="btn btn-sm btn-success" type="submit">Proses</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Call Function -->
        <script>
            set_height_1_1();
        </script>
@endsection