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
    <link
        href="https://fonts.googleapis.com/css2?family=Inria+Serif:wght@300;400;700&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/vendor/DataTables/datatables.min.css" />

    {{-- Select2 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="{{ url('/') }}/assets/css/style.css" rel="stylesheet">

    <!-- JQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Icon Iconify -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iconify/2.0.0/iconify.min.js"
        integrity="sha512-lYMiwcB608+RcqJmP93CMe7b4i9G9QK1RbixsNu4PzMRJMsqr/bUrkXUuFzCNsRUo3IXNUr5hz98lINURv5CNA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        
    <!-- Custom JS -->
    <script src="{{ url('/') }}/assets/js/main.js"></script>

    {{-- SweetAlert2 JS --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Select2 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<body id="admin_page">
    <div class="container-fluid p-0 m-0">
        <div class="menu col-12 m-0">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img class="col-12 m-0 p-0" src="{{ url('/') }}/assets/img/logo_text.png" /></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body row">
                            <ul class="navbar-nav flex-grow-1 pe-3 col-lg-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}/admin/kategori">KATALOG KATEGORI</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}/admin/produk">KATALOG PRODUK</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}/admin/pesanan">DATA PEMESAN</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}/admin/user">DATA USER</a>
                                </li>
                            </ul>
                            <div class="col-lg-auto d-lg-block d-none">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img class="m-0 p-0 rounded-circle" style="height: 50px; width: 50px" src="{{ url('/') }}/assets/img/user.png" />
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item text-dark" href="{{ url('/') }}/logout">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-auto d-lg-none d-block">
                                <a class="nav-link menu-admin-a" style="font-family: 'Inter', sans-serif;" href="{{ url('/') }}/logout">LOGOUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>

    <!-- Iconify CDN -->
    <script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>

    <!-- DataTables JS -->
    <script type="text/javascript" src="{{ url('/') }}/assets/vendor/DataTables/datatables.min.js"></script>

</body>

</html>