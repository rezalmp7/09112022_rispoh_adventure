@extends('template')

@section('content')
    
        <div class="content p-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/') }}/katalog">Kategori</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $kategori->nama }}</li>
                </ol>
            </nav>
            <div class="p-5 m-0">
                <h4 class="pb-5 text-center">{{ $kategori->nama }}</h4>
                <div class="row col-12 m-0 p-0">
                    @foreach ($produk as $item)
                    <div class="col-2 list_produk">
                        <div class="card col-12">
                            <div class="col-12 m-0 p-0 height-1-1 background-card-produk"
                                style="background-image: url({{ url('/') }}/images/{{ $item->image }});"></div>
                            <div class="card-body p-0">
                                <p class="card-text text-center p-0 m-0"><b>{{ $item->nama }}</b></p>
                                <small style="font-size: 10px" class="col-12 m-0 p-0 text-center d-block">Rp {{ number_format($item->harga) }}/hari</small>
                                <small style="font-size: 10px" class="col-12 m-0 p-0 text-center d-block">Stok {{ $item->stok }} Pcs</small>
                            </div>
                            <div class="card-footer bg-transparent text-center">
                                <a href="{{ url('/') }}/keranjang/store/{{ $item->id }}" class="btn btn-sm px-3 btn-success" style="font-size: 10px">Pesan</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <!-- Call Function -->
        <script>
            set_height_1_1();
        </script>
@endsection