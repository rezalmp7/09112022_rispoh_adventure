<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <title>Rispo Adventure</title>

        <meta charset="UTF-8">
        <meta name="description" content="Solusi Tepat Rental Peralatan Camping">
        <meta name="keywords" content="Solusi Tepat Rental Peralatan Camping">
        <meta name="author" content="Rispo">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        
        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:wght@300;400;700&display=swap" rel="stylesheet">

        <link href="{{ url('/') }}/assets/css/style.css" rel="stylesheet">
    </head>
        
    <body id="home_page" style="background-image: url('{{ url('/') }}/assets/img/background_home.jpg');">
            <div class="container-fluid p-0 m-0">
                <div class="menu col-12 m-0 p-5">
                    <nav class="navbar navbar-expand-lg rounded-4 px-5">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="#"><b>Menu</b></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                                aria-controls="offcanvasNavbar">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/') }}/katalog">Katalog</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/') }}/tentang">Tentang</a>
                                            </li>
                                        </ul>
                                    </ul>
                                    <hr />
                                    <span class="navbar-text">
                                        <a class="nav-link" href="{{ url('/') }}/login">Login</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="content px-5 py-2">
                    <div class="card">
                        <div class="card-header fs-3 fw-bold">
                            Tentang
                        </div>
                        <div class="card-body">
                            <p class="text-black text-start">
                                <b>Rispoh Adventure Store</b> salah satu penyedia jasa penyewaan alat-alat hiking  dan camping yang lengkap di wilayah Kecamatan Watukumpul yang didirikan pada tahun 2017 oleh beberapa pemuda pecinta alam yang tergabung dalam organisai dengan nama yang sama. Barang yang kami miliki memiliki kualitas yang bagus dan terawat sesua dengan standar peralatan yang kami  miliki. Jadi bagi anda yang menyukai liburan dengan mendaki gunung atau camping di camp area tetapi belum memiliki alat-alat yang dibutuhkan dapat melakukan penyewaan di Rispoh Adventure karena selain kualitas alat yang baik juga kami memiliki harga sewa yang terjangkau.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
                crossorigin="anonymous"></script>
    </body>
        
</html>