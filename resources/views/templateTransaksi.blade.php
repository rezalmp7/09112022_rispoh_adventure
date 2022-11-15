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
</head>

<body id="basic_page">
    <div class="container-fluid p-0 m-0">
        <div class="menu col-12 m-0 px-5" style="background-image: url('{{url('/')}}/assets/img/background_home.jpg');">
            <div class="col-12 m-0 p-0">
                <div class="row col-12 m-0 p-5">
                    <div class="col m-0 p-0 fs-3 title-transaksi">
                        <iconify-icon class="me-3" icon="clarity:shopping-cart-line"></iconify-icon><b>Keranjang</b>
                    </div>
                    <div class="col m-0 p-0 text-end">
                        <a href="{{ url('/') }}/checkout" class="btn btn-sm btn-success transaksi-button">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>

    <!-- Iconify CDN -->
    <script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>


</body>

</html>