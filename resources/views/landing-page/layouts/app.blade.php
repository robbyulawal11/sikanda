<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SIKANDA - Sistem Informasi Kerajinan Tangan Daerah Kota Sukabumi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Deskripsi" name="Website Kerajinan Tangan Kota Sukabumi">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/media/images/logo.png') }}" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets/lib/flaticon/font/flaticon.css') }}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <style>
        /* opsi satu top satu warna */
        body {
            background:
                url({{ asset('assets/img/back_top_right.png') }}) no-repeat top right,
                linear-gradient(to bottom, #E8EBA1, #C5CB5C) no-repeat;
            background-size: cover, auto;
            background-position: top, right;
            margin: 0;
            /* height: 550vh; */
        }


        /* opsi dua top beda warna */
        /* body {
            background:
                url({{ asset('assets/img/floral_top_right2.png') }}) no-repeat top right,
                linear-gradient(to bottom, #E8EBA1, #C5CB5C) no-repeat;
            background-size: cover, auto;
            background-position: top left, right;
            margin: 0;
            height: 550vh;
        } */

        /* opsi tiga bottom left */
        /* body {
            background:
                url({{ asset('assets/img/floral_bottom_left.png') }}) no-repeat bottom left,
                linear-gradient(to bottom, #E8EBA1, #C5CB5C) no-repeat;
            background-size: cover, auto;
            background-position: top left, right;
            margin: 0;
            height: 550vh;
        } */

        /* html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            background: linear-gradient(to bottom, #E8EBA1, #C5CB5C) no-repeat;
            background-attachment: fixed;
            margin: 0;
            min-height: 100%;
            position: relative;
        }

        .background-image {
            position: absolute;
            right: 0;
            width: 100%;
            height: auto;
            background: url('{{ asset('assets/img/floral_top_right2.png') }}') no-repeat;
        } */
        /* top: calc(100px + 600px); */
    </style>
</head>

<body class="body background-image">

    @include('landing-page.partials.navbar')

    {{-- @include('landing-page.pages.Home.home') --}}
    @yield('content')

    @include('landing-page.partials.footer')


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
