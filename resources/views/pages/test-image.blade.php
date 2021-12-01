@extends('index')

@section('content')
    <div class="container-fluid mt-3">
        <div class="row mb-25">
            <div class="col-md-12">
                <div class="col-md-12 p-0 d-flex align-items-center">
                    <h3 class="text-dark font-weight-700 mr-5">Manage image</h3>
                    <h4>Add new image</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row m-0 bg-white">
                    <div class="form-group col-md-12 mb-0 mt-25">
                        <label class="my-input" for="data-json">Data image</label>
                        <input type="file" accept="image/*" class="form-control" id="data-image" name="data-image" multiple>
                    </div>
                    <div class="form-group col-md-12 mb-0 mt-25" id="load-image">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row m-0 bg-white">
                    <div class="col-md-12 text-center mt-25 mb-25">
                        <button type="button" class="btn btn-success font-weight-700" id="get_multiple" name="get_multiple" style="height: 40px; width: 191px; border-radius: 25px; font-size: 17px;">Test data</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        function base64ToBlob(base64, mime) {
            mime = mime || '';
            var sliceSize = 1024;
            var byteChars = window.atob(base64);
            var byteArrays = [];

            for (var offset = 0, len = byteChars.length; offset < len; offset += sliceSize) {
                var slice = byteChars.slice(offset, offset + sliceSize);

                var byteNumbers = new Array(slice.length);
                for (var i = 0; i < slice.length; i++) {
                    byteNumbers[i] = slice.charCodeAt(i);
                }

                var byteArray = new Uint8Array(byteNumbers);

                byteArrays.push(byteArray);
            }

            return new Blob(byteArrays, {type: mime});
        }

        $(document).ready(function() {
            var files = [];
            var arrFile = [];
            var arrTempFile = [];
            $(document).on('change', '#data-image', function(){
                $('#load-image').html('');
                files = [];
                arrFile = [];
                arrTempFile = [];
                
                files = $('#data-image')[0].files;
                files = Array.from(files);
                // temp_files = $('#data-image')[0].files;
                // data_files = Array.from(temp_files);
                for (var i = 0; i < files.length; i++) {
                    // var temp_number  = Math.floor(Math.random() * 1000);
                    files[i].id = i + 1;
                    // files.push(data_files[i]);
                    var reader = new FileReader();
                    reader.onload = function (data) {
                        for (var i = 0; i < files.length; i++) {
                            if(data.target.result == arrTempFile[i]){
                            }else{
                                arrTempFile.push(data.target.result);
                                arrFile.push({
                                    id: (arrFile.length+1),
                                    data: data.target.result
                                });
                                var temp = '\
                                    <div id="image_load'+ (arrFile.length+1) +'">\
                                        <img src="'+ data.target.result +'" alt="Girl in a jacket" width="300" height="300">\
                                        <button class="btn btn-danger btn-circle remove_image" type="button" data-id="'+ (arrFile.length+1) +'"><i class="fa fa-times"></i></button>\
                                    </div>';
                                break;
                            }
                        }
                        $('#load-image').append(temp);
                    };
                    reader.readAsDataURL(document.getElementById("data-image").files[i]);
                }
                console.log(arrTempFile);
                console.log(arrFile);
                // console.log(arrFile.id.slice(-1)[0]);
                console.log(files);
            });

            $(document).on('click', '.remove_image', function(){
                var id = $(this).attr('data-id');
                $('#image_load'+id).remove();
                for (let i = 0; i < files.length; i++) {
                    if(id == (files[i].id)){
                        files.splice(i, 1);
                        break;
                    }
                    
                }
                console.log(files);
                for (let i = 0; i < arrFile.length; i++) {
                    if(id == (arrFile[i].id)){
                        arrFile.splice(i, 1);
                        break;
                    }
                    
                }
            });

            $(document).on('click', '#get_multiple', function(){
                console.log(arrFile);
                console.log(files);
                var formData = new FormData();
                for (let i = 0; i < arrFile.length; i++) {
                    var image = arrFile[i].data.replace(/^data:image\/(png|jpg|jpeg);base64,/, "");
                    var blob = base64ToBlob(image, files[i].type);
                    formData.append('picture[]', blob);
                }
                $.ajax({
                    type: "POST",
                    url: "{{ route('get.image') }}",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        
                    }
                });
            });



        });
    </script>
@endsection
