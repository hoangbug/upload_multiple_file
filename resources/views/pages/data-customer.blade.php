@extends('index')
@section('css')

@endsection
@section('content')
<div class="container-fluid mt-3">
    <div class="col-md-12">
        <div class="row mb-25">
            <div class="col-md-3 p-0 d-flex align-items-center">
                <h3 class="text-dark font-weight-700">Quản lý khách hàng</h3>
            </div>
            <div class="col-md-9 p-0 d-flex justify-content-end">
                <a href="{{ route('view.add') }}" target="_blank" class="d-flex justify-content-end" style="width: 60px;">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-12">
            <div class="row d-flex align-items-center bg-white m-0">
                <div class="col-md-3 mb-25 mt-25">
                    <label class="my-input" for="type-asset-search">Loại tài sản</label>
                    <select name="type-asset-search" id="type-asset-search" class="form-control">
                        <option value="">Loại tài sản</option>
                    </select>
                </div>
                <div class="col-md-3 mb-25 mt-25">
                    <label class="my-input" for="package-borrow-search">Tên gói vay</label>
                    <select name="package-borrow-search" id="package-borrow-search" class="form-control">
                        <option value="">Tên gói vay</option>
                    </select>
                </div>
                <div class="col-md-3 mb-25 mt-25">
                    <label class="my-input" for="name-store">Cửa hàng</label>
                    <select name="name-store" id="name-store" class="form-control">
                        <option value="">Cửa hàng</option>
                    </select>
                </div>
            </div>
        </div>
    </div> --}}


    <!-- Table -->
    <div class="row mt-5">
        <div class="col-md-12 mb-5 p-0">
            <div class="table-responsive">
                <table id="datatables" class="display table table-hover" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ tên</th>
                            <th>Giới tính</th>
                            <th>Căn cước công dân</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('library-js')

@endsection
@section('javascript')
<script>
    $(document).ready(function() {
        var dataTable = $('#datatables').DataTable({
            dom: 'lrtp',
            processing: true,
            serverSide: true,
            responsive: true,
            searching: true,
            bPaginate: true,
            // iDisplayLength: 20,
            // pageLength: 15,
            // "bStateSave": true,
            autofill: true,
            "order": [
                [0, "ASC"]
            ],
            ajax: {
                url: '{{ route('customer.index') }}',
                type: 'GET',
                data: function(param) {
                    // param.min_value = arrMinValue.slice(-1)[0];
                    // param.max_value = arrMaxValue.slice(-1)[0];
                }
            },
            lengthMenu: [
                [10, 25, 50, 100, 500, 1000, 2000, -1],
                [10, 25, 50, 100, 500, 1000, 2000, "All"]
            ],
            "pagingType": "full_numbers",
            // "language": {
            //     "paginate": {
            //         "first":    "«",
            //         "previous": "‹",
            //         "next":     "›",
            //         "last":     "»"
            //     }
            // },
            "language": {
                "decimal":        "",
                "emptyTable":     "No data available in table",
                "info":           "Showing START to END of TOTAL entries",
                "infoEmpty":      "Showing 0 to 0 of 0 entries",
                "infoFiltered":   "(filtered from MAX total entries)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "Hiển thị _MENU_ khách hàng",
                "loadingRecords": "Loading...",
                "processing":     "Processing...",
                "search":         "Search:",
                "zeroRecords":    "No matching records found",
                "paginate": {
                    "first":    "«",
                    "previous": "‹",
                    "next":     "›",
                    "last":     "»"
                },
                "aria": {
                    "sortAscending":  ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                }
                // "sLengthMenu": "Hiển thị _MENU_ khách hàng",
                // "sZeroRecords": "Không tìm thấy khách hàng nào",
                // "sInfo": "Hiển thị _START_ đến _END_ của _TOTAL_ khách hàng",
                // "paginate": {
                //     "first":    "«",
                //     "previous": "‹",
                //     "next":     "›",
                //     "last":     "»"
                // },
                // "sInfoEmpty": "Showing 0 to 0 of 0 records",
                // "sInfoFiltered": "(filtered from _MAX_ total records)"
            },
            columns: [
                {
                    data: 'id',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { data: 'name_customer', name: 'name_customer' },
                {
                    data: 'gender', render: function (data, type, row) {
                        if(data == 1){
                            return 'Nam';
                        }else if(data == 0){
                            return 'Nữ';
                        }else{
                            return data;
                        }
                    }
                },
                { data: 'identity_card', name: 'identity_card' },
                { data: 'address', name: 'address' },
                { data: 'phone', name: 'phone' },
                {
                    data: '',
                    render: function(data, type, row) {
                        return '<button type="button" class="btn btn-info view-property" data-url=' + row.id + ' data-toggle="modal" data-target="#view-property"><i class="fa fa-eye" aria-hidden="true"></i></button>\
                        <button type="button" class="btn btn-warning edit-property" data-url=' + row.id + ' data-toggle="modal" data-target="#edit-property"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>\
                        <button type="button" class="btn btn-danger delete-property" data-toggle="modal" data-target="#delete-property" data-url=' + row.id + '><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
                    }
                }
            ]
        });
    });
</script>

@endsection
