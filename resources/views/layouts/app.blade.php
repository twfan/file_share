<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- plugins -->
    <link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href={{ asset('assets/css/bootstrap.min.css') }} rel="stylesheet" type="text/css" />
    <link href={{ asset('assets/css/icons.min.css') }} rel="stylesheet" type="text/css" />
    <link href={{ asset('assets/css/app.css') }} rel="stylesheet" type="text/css" />

     <!-- Vendor js -->
     <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
     <script src="{{  asset('assets/js/vendor.min.js') }}"></script>

     <!-- datatable js -->
     <script src="{{  asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
     <script src="{{  asset('assets/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
     <script src="{{  asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
     <script src="{{  asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
     
     <script src="{{  asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
     <script src="{{  asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
     <script src="{{  asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
     <script src="{{  asset('assets/libs/datatables/buttons.flash.min.js') }}"></script>
     <script src="{{  asset('assets/libs/datatables/buttons.print.min.js') }}"></script>

     <script src="{{  asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
     <script src="{{  asset('assets/libs/datatables/dataTables.select.min.js') }}"></script>


</head>
<body>
    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>
