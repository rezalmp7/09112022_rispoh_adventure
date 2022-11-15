@extends('admin.template')

@section('content')
        <div class="content p-5">
            <div class="col-12 m-0 pb-5">
                <h2 class="text-center"><b>Management Kategori</b></h2>
            </div>
            <div class="col-12 m-0 p-0">
                <div class="row flex-nowrap col-12 m-0 py-4" style="overflow-y: hidden; overflow-x: scroll;">
                    @foreach ($kategori as $a)
                    <div style="width: 180px" class="list_produk">
                        <div class="card col-12">
                            <div class="col-12 m-0 p-0 height-1-1 background-card-produk"
                                style="background-image: url({{ url('/') }}/images/{{ $a->image }});"></div>
                            <div class="card-body p-0">
                                <p class="card-text text-center p-0 m-0"><b>{{ $a->nama }}</b></p>
                            </div>
                            <div class="card-footer bg-transparent text-center">
                                <button type="button" onclick="editData({{ $a->id }})" class="btn btn-sm px-3 btn-warning">
                                    <iconify-icon icon="akar-icons:edit"></iconify-icon>
                                </button>
                                <a class="btn btn-sm px-3 btn-danger" href="{{ url('/') }}/admin/kategori/delete/{{ $a->id }}" onclick="return confirm('Yakin Hapus {{ $a->nama }}')">
                                    <iconify-icon icon="fluent:delete-24-regular"></iconify-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-12 m-0 p-4 text-end">
                    <button type="button" onclick="tambahData()" class="btn btn-sm px-3 btn-success">
                        Tambah Kategori
                    </button>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="form-modal" tabindex="-1" aria-labelledby="form-modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="form-modal-form" method="post" action="{{ url('/') }}/admin/kategori/store" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="title-form-modal">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input name="gambarLama" id="namaGambar" type="hidden">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Kategori</label>
                                <input type="text" id="namaKategori" class="form-control form-control-sm" name="nama" placeholder="Nama Kategori">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label" id='label-upload-gambar-kategori'>Gambar Kategori</label>
                                <input class="form-control form-control-sm" id="gambarKategori" name="gambar" type="file" id="formFile">
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
            function tambahData() {
                var ElementModal = document.getElementById('form-modal');
                var formModal = new bootstrap.Modal(ElementModal, {});

                document.getElementById('title-form-modal').innerHTML ="Tambah Data Kategori";

                document.getElementById('namaKategori').value = "";
                document.getElementById('namaGambar').value = "";
                document.getElementById('label-upload-gambar-kategori').innerHTML = "Upload Gambar";
                document.getElementById('gambarKategori').value = "";

                formModal.show();

                document.getElementById('form-modal-form').setAttribute("action", "{{ url('/') }}/admin/kategori/store");
            }
            
            function editData(id) {
                var ElementModal = document.getElementById('form-modal');
                var formModal = new bootstrap.Modal(ElementModal, {});
                $.ajax({
                    method: "GET",
                    url: "{{ url('/') }}/admin/kategori/getData/"+id,
                    dataType: "json"
                }).done(function(dataReturn) {
                    if(dataReturn.status == 1) {
                        let value = dataReturn.value;
                        document.getElementById('title-form-modal').innerHTML ="Edit Data Kategori";

                        document.getElementById('namaKategori').value = value.nama;
                        document.getElementById('namaGambar').value = value.image;
                        document.getElementById('label-upload-gambar-kategori').innerHTML = "Ganti Gambar";

                        formModal.show();

                        document.getElementById('form-modal-form').setAttribute("action", "{{ url('/') }}/admin/kategori/update/"+id);
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