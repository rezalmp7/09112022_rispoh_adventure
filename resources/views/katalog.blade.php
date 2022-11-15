@extends('template')

@section('content')
    
        <div class="content p-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Katalog</li>
                </ol>
            </nav>
            <div class="p-5 m-0">
                <div class="row col-12 m-0 p-0">
                    @foreach ($kategori as $item)
                    <div class="col-2 list_kategori">
                        <a href="{{ url('/') }}/produk/{{ $item->id }}">
                            <div class="card col-12">
                                <div class="col-12 m-0 p-0 height-1-1 background-card-produk" style="background-image: url({{ url('/') }}/images/{{ $item->image }});"></div>
                                <div class="card-body p-0 mb-2">
                                    <p class="card-text text-center"><b>{{ $item->nama }}</b></p>
                                </div>
                            </div>
                        </a>
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