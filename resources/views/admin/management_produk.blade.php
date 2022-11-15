@extends('admin.template')

@section('content')
        <div class="content p-5">
            <div class="col-12 m-0 pb-5">
                <h2 class="text-center"><b>Management Produk</b></h2>
            </div>
            <div class="col-12 m-0 p-0">
                <div class="row flex-nowrap col-12 m-0 py-4" style="overflow-y: hidden; overflow-x: scroll;">
                    @foreach ($produk as $a)
                    <div style="width: 180px" class="list_produk">
                        <div class="card col-12">
                            <div class="col-12 m-0 px-1">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" onclick="toggleTersedia(this, {{ $a->id }})" @if($a->tersedia == 1) checked @endif id="toggleTersedia-{{ $a->id }}" name="tersedia" type="checkbox" value="tersedia">
                                    <label class="form-check-label" for="toggleTersedia-{{ $a->id }}">Tersedia</label>
                                </div>
                            </div>
                            <div class="col-12 m-0 p-0 height-1-1 background-card-produk"
                                style="background-image: url({{ url('/') }}/images/{{ $a->image }});"></div>
                            <div class="card-body p-0">
                                <p class="card-text text-center p-0 m-0"><b>{{ $a->nama }}</b></p>
                                <small style="font-size: 10px" class="col-12 m-0 p-0 text-center d-block">Rp {{ number_format($a->harga) }}/hari</small>
                            </div>
                            <div class="card-footer bg-transparent text-center">
                                <button type="button" onclick="editData({{ $a->id }})" class="btn btn-sm px-3 btn-warning">
                                    <iconify-icon icon="akar-icons:edit"></iconify-icon>
                                </button>
                                <a class="btn btn-sm px-3 btn-danger" href="{{ url('/') }}/admin/produk/delete/{{ $a->id }}" onclick="return confirm('Yakin Hapus {{ $a->nama }}')">
                                    <iconify-icon icon="fluent:delete-24-regular"></iconify-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-12 m-0 p-4 text-end">
                    <button type="button" onclick="tambahData()" class="btn btn-sm px-3 btn-success">
                        Tambah Produk
                    </button>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="form-modal" tabindex="-1" aria-labelledby="form-modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="form-modal-form" method="post" action="{{ url('/') }}/admin/produk/store" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="title-form-modal">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input name="gambarLama" value="" id="namaGambarLama" type="hidden">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
                                <input type="text" id="namaProduk" class="form-control form-control-sm" name="nama" placeholder="Nama Produk">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Harga Produk</label>
                                <input type="number" id="hargaProduk" class="form-control form-control-sm" name="harga" placeholder="Harga Produk">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Kategori Produk</label>
                                <div class="col-12 m-0 p-0">
                                    <select class="form-control col-12 d-block " name="kategoriProduk" id="kategoriProduk" required>
                                        <option>-- Kategori Produk --</option>
                                        @foreach ($kategori as $b)
                                        <option value="{{ $b->id }}">{{ $b->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tersedia" value="tersedia" id="checkTersedia">
                                <label class="form-check-label" for="checkTersedia">
                                    Tersedia
                                </label>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label" id='label-upload-gambar-produk'>Gambar Produk</label>
                                <input class="form-control form-control-sm" id="gambarProduk" name="gambar" type="file" id="formFile">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-success">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Call Function -->
        <script>
            $(document).ready(function() {
                $('#kategoriProduk').select2({
                    dropdownParent: $("#form-modal"),
                    width: '100%'
                });
            });
            function toggleTersedia(element, id) {
                console.log('Check Klik');
                let elementInput = element;
                $.ajax({
                    method: "GET",
                    url: "{{ url('/') }}/admin/produk/toggleTersedia/"+id,
                    dataType: "json"
                }).done(function(dataReturn) {
                    if(dataReturn.status == 1) {
                        let notiv;
                        if(dataReturn.tersediaBaru == 1) {
                            elementInput.checked = true;
                            notiv = "Produk Tersedia";
                        } else {
                            elementInput.checked = false;
                            notiv = "Produk Tidak Tersedia";
                        }
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: notiv,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else {
                        Swal.fire({
                            icon: 'Gagal',
                            title: 'Oops...',
                            text: 'Tidak ada data yang cocok!',
                        })
                    }
                });
            }
            function tambahData() {
                var ElementModal = document.getElementById('form-modal');
                var formModal = new bootstrap.Modal(ElementModal, {});

                document.getElementById('title-form-modal').innerHTML ="Tambah Data Produk";

                document.getElementById('namaProduk').value = "";
                document.getElementById('namaGambarLama').value = "";
                document.getElementById('label-upload-gambar-produk').innerHTML = "Upload Gambar";
                document.getElementById('gambarProduk').value = "";
                
                formModal.show();

                document.getElementById('form-modal-form').setAttribute("action", "{{ url('/') }}/admin/produk/store");
            }
            
            function editData(id) {
                var ElementModal = document.getElementById('form-modal');
                var formModal = new bootstrap.Modal(ElementModal, {});
                $.ajax({
                    method: "GET",
                    url: "{{ url('/') }}/admin/produk/getData/"+id,
                    dataType: "json"
                }).done(function(dataReturn) {
                    if(dataReturn.status == 1) {
                        let value = dataReturn.value;
                        document.getElementById('title-form-modal').innerHTML ="Edit Data Produk";
                        document.getElementById('namaProduk').value = value.nama;
                        document.getElementById('hargaProduk').value = value.harga;
                        document.getElementById('namaGambarLama').value = value.image;

                        let kategoriProduk = document.getElementById('kategoriProduk').options;

                        for (var i = 0; i < kategoriProduk.length; i++) {
                            if(kategoriProduk[i].value == value.kategori) {
                                $('#kategoriProduk').val(i).trigger('change');
                            }
                        }

                        document.getElementById('label-upload-gambar-produk').innerHTML = "Ganti Gambar";
                        document.getElementById('gambarProduk').value = "";

                        if(value.tersedia == 1) {
                            document.getElementById('checkTersedia').setAttribute('checked', 'true');
                        } else {
                            document.getElementById('checkTersedia').removeAttribute('checked');
                        }

                        formModal.show();

                        document.getElementById('form-modal-form').setAttribute("action", "{{ url('/') }}/admin/produk/update/"+id);
                    } else {
                        Swal.fire({
                            icon: 'Gagal',
                            title: 'Oops...',
                            text: 'Tidak ada data yang cocok!',
                        })
                    }
                });
            }

        </script>
        <script>
            set_height_1_1();
        </script>
@endsection