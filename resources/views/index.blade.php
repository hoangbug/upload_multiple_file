<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        @include('layouts.navbar')
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        @include('layouts.sidebar')
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                @yield('content')
            </div>
            <!-- END PAGE CONTENT-->
            <footer class="page-footer">
                @include('layouts.footer')
            </footer>
        </div>
    </div>
    <!-- BEGIN THEME CONFIG PANEL-->

    {{-- @include('layouts.settings') --}}

    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        {{-- <div class="hourglass page-preloader"></div> --}}
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->

    <!-- SCRIPTS-->
    @include('layouts.scripts')
</body>

</html>
