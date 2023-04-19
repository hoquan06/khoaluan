@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thêm Mới Slide</h4>
                </div>
                <div class="card-body">
                    <form novalidate id="novalidate">
                        <div class="mb-1">
                            <label class="form-label">Hình ảnh slide 1</label>
                            <div class="input-group">
                                <input id="slide_1" name="slide_1" class="form-control" type="text">
                                <input type="button" class="btn btn-info" id="lfm1" data-input="slide_1" data-preview="holder_1" value="Chọn ảnh">
                            </div>
                            <img id="holder_1" style="margin-top:15px;max-height:100px;">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Hình ảnh slide 2</label>
                            <div class="input-group">
                                <input id="slide_2" name="slide_1" class="form-control" type="text">
                                <input type="button" class="btn btn-info" id="lfm2" data-input="slide_2" data-preview="holder_2" value="Chọn ảnh">
                            </div>
                            <img id="holder_2" style="margin-top:15px;max-height:100px;">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Hình ảnh slide 3</label>
                            <div class="input-group">
                                <input id="slide_3" name="slide_1" class="form-control" type="text">
                                <input type="button" class="btn btn-info" id="lfm3" data-input="slide_3" data-preview="holder_3" value="Chọn ảnh">
                            </div>
                            <img id="holder_3" style="margin-top:15px;max-height:100px;">
                        </div>
                        <div class="text-center">
                            <button type="button" id="add" class="btn btn-primary waves-effect waves-float waves-light">Thêm mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        $('#lfm1').filemanager('image');
        $('#lfm2').filemanager('image');
        $('#lfm3').filemanager('image');
    </script>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#add").click(function(e){
                e.preventDefault();
                var payload = {
                    'slide_1'  : $("#slide_1").val(),
                    'slide_2'  : $("#slide_2").val(),
                    'slide_3'  : $("#slide_3").val(),
                };

                $.ajax({
                    url     : '/admin/slide/index',
                    type    : 'post',
                    data    : payload,
                    success : function(res){
                        toastr.success("Thêm mới slide thành công!!!");
                        $("#novalidate").trigger('reset');
                        $("#holder_1").attr('src', '');
                        $("#holder_2").attr('src', '');
                        $("#holder_3").attr('src', '');
                    },
                    error   : function(res){;
                        var danh_sach_loi = res.responseJSON.errors;
                        $.each(danh_sach_loi, function(key, value){
                            toastr.error(value[0]);
                        });
                    },
                });
            });
        });
    </script>
@endsection
