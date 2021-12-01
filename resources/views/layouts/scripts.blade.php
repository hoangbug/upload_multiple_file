<!-- CORE PLUGINS-->
<script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/vendors/metisMenu/dist/metisMenu.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/DataTables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/toastr.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts/sweetalert2.js') }}" type="text/javascript"></script>
{{-- Date Range Picker --}}
<script src="{{ asset('assets/js/scripts/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts/daterangepicker.min.js') }}" type="text/javascript"></script>

@yield('library-js')

<!-- CORE SCRIPTS-->
<script src="{{ asset('assets/js/app.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/custom.js') }}" type="text/javascript"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@yield('javascript')