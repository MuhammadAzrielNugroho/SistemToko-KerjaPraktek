<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sistem Toko</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('sbadmin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        /* 🔥 FIX CONTENT KE KANAN */
        #content-wrapper {
            margin-left: 225px;
        }
    </style>
</head>

<body id="page-top">

<div id="wrapper">

    <!-- SIDEBAR -->
    @include('layouts.sidebar')

    <!-- CONTENT -->
    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            <!-- TOPBAR -->
            @include('layouts.topbar')

            <!-- MAIN -->
            <div class="container-fluid mt-4">
                @yield('content')
            </div>

        </div>

    </div>

</div>

<script src="{{ asset('sbadmin2/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('sbadmin2/js/sb-admin-2.min.js') }}"></script>

@yield('scripts')

</body>
</html>