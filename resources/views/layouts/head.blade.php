<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Thông tin khách hàng</title>
<link rel="icon" href="https://happymoney.vn/web/images/favicon.png">
<!-- GLOBAL MAINLY STYLES-->
<link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/themify-icons/css/themify-icons.css') }}" rel="stylesheet" />
<!-- PLUGINS STYLES-->
<link href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />

<link href="{{ asset('assets/vendors/DataTables/datatables.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/toastr.css') }}" rel="stylesheet" />

{{-- Date Range Picker --}}
<link href="{{ asset('assets/css/daterangepicker.css') }}" rel="stylesheet" />

<!-- THEME STYLES-->
<link href="{{ asset('assets/css/main.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />

<!-- PAGE LEVEL STYLES-->
@yield('css')
