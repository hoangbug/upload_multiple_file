@extends('index')

@section('content')
    <div class="container-fluid mt-3">
        <div class="row mb-25">
            <div class="col-md-12">
                <div class="col-md-12 p-0 d-flex align-items-center">
                    <h3 class="text-dark font-weight-700 mr-5">Quản lý khách hàng</h3>
                    <h4>Thêm mới khách hàng</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row m-0 bg-white">
                    <div class="form-group col-md-12 mb-0 mt-25">
                        <label class="my-input" for="data-json">Data json</label>
                        <textarea class="form-control" id="data-json" rows="30" style="height: auto; resize: vertical"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row m-0 bg-white">
                    <div class="col-md-6 text-right mt-25 mb-25">
                        <a href="{{ route('customer.index') }}">
                            <button type="button" class="btn btn-secondary font-weight-700" id="cancel" name="cancel" style="height: 40px; width: 191px; border-radius: 25px; font-size: 17px;">Cancel</button>
                        </a>
                    </div>
                    <div class="col-md-6 mt-25 mb-25">
                        <button type="button" class="btn btn-success font-weight-700" id="add-data" name="add-property"
                            style="height: 40px; width: 215px; border-radius: 25px; font-size: 17px;">Thêm mới khách hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $(document).on('click', '#add-data', function(){
                var text = $('#data-json').val();
                if(text != ""){
                    $.ajax({
                        type: "POST",
                        url: "{{ route('add.data') }}",
                        data: { text: text },
                        dataType: "json",
                        success: function (data) {
                            
                        }
                    });
                }
            });
        });
    </script>
@endsection
