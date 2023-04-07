@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thêm Mới Banner</h4>
                </div>
                <div class="card-body">
                    <form novalidate id="novalidate">
                        <div class="mb-1">
                            <label class="form-label">Hình ảnh banner 1</label>
                            <div class="input-group">
                                <input id="banner_1" name="banner_1" class="form-control" type="text">
                                <input type="button" class="btn btn-info" id="lfm4" data-input="banner_1" data-preview="holder_4" value="Chọn ảnh">
                            </div>
                            <img id="holder_4" style="margin-top:15px;max-height:100px;">
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="basic-default-name">Link Banner 1</label>
                            <input type="text" class="form-control" id="link_banner_1"  placeholder="Nhập vào link banner">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Hình ảnh banner 2</label>
                            <div class="input-group">
                                <input id="banner_2" name="banner_2" class="form-control" type="text">
                                <input type="button" class="btn btn-info" id="lfm5" data-input="banner_2" data-preview="holder_5" value="Chọn ảnh">
                            </div>
                            <img id="holder_5" style="margin-top:15px;max-height:100px;">
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="basic-default-name">Link Banner 2</label>
                            <input type="text" class="form-control" id="link_banner_2"  placeholder="Nhập vào link banner">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Hình ảnh banner 3</label>
                            <div class="input-group">
                                <input id="banner_3" name="banner_3" class="form-control" type="text">
                                <input type="button" class="btn btn-info" id="lfm6" data-input="banner_3" data-preview="holder_6" value="Chọn ảnh">
                            </div>
                            <img id="holder_6" style="margin-top:15px;max-height:100px;">
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="basic-default-name">Link Banner 3</label>
                            <input type="text" class="form-control" id="link_banner_3"  placeholder="Nhập vào link banner">
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
        $('#lfm4').filemanager('image');
        $('#lfm5').filemanager('image');
        $('#lfm6').filemanager('image');
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
                    'banner_1' : $("#banner_1").val(),
                    'banner_2' : $("#banner_2").val(),
                    'banner_3' : $("#banner_3").val(),
                    'link_banner_1' : $("#link_banner_1").val(),
                    'link_banner_2' : $("#link_banner_2").val(),
                    'link_banner_3' : $("#link_banner_3").val(),
                };
                $.ajax({
                    url     : '/admin/banner/index',
                    type    : 'post',
                    data    : payload,
                    success : function(res){
                        toastr.success("Thêm mới banner thành công!!!");
                        $("#novalidate").trigger('reset');
                        $("#holder_4").attr('src', '');
                        $("#holder_5").attr('src', '');
                        $("#holder_6").attr('src', '');
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