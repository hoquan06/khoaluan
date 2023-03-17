@extends('admin.master')

@section('content')
<div class="col-md-12">
    <div class="main-card mb-3 git card">
        <div class="card-body"> <h5 class="card-title">Thêm Mới Sản Phẩm</h5>
            <form class="" id="formCreate">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <div class="position-relative form-group">
                            <label>Tên Sản Phẩm(*)</label>
                            <input id="ten_san_pham" placeholder="Nhập vào tên sản phẩm" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label>Slug Sản Phẩm(*)</label>
                            <input id="slug_san_pham" placeholder="Nhập vào slug sản phẩm" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-5">
                        <div class="position-relative form-group">
                            <label>Giá Bán(*)</label>
                            <input id="gia_ban" placeholder="Nhập vào giá bán" type="number" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="position-relative form-group">
                            <label>Giá Khuyến Mãi</label>
                            <input id="gia_khuyen_mai" placeholder="Nhập vào giá khuyến mãi" type="number" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label>Số lượng(*)</label>
                        <div class="input-group input-group-lg bootstrap-touchspin">
                            <span class="input-group-btn bootstrap-touchspin-injected"><button class="btn btn-primary bootstrap-touchspin-down" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg></button></span><input type="number" class="touchspin form-control" value="0"><span class="input-group-btn bootstrap-touchspin-injected"><button class="btn btn-primary bootstrap-touchspin-up" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></button></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label>Ảnh đại diện(*)</label>
                            <div class="input-group">
                                <input id="hinh_anh" name="hinh_anh" class="form-control" type="text">
                                <input type="button" id="lfm" class="btn btn-info lfm" data-input="hinh_anh" data-preview="holder" value="Chọn ảnh">
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label>Hình ảnh (nếu có)</label>
                            <div class="input-group">
                                <input id="hinh_anh_2" name="hinh_anh_2" class="form-control" type="text">
                                <input type="button" id="lfm2" class="btn btn-info lfm" data-input="hinh_anh_2" data-preview="holder_2" value="Chọn ảnh">
                            </div>
                            <img id="holder_2" style="margin-top:15px;max-height:100px;">
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label>Hình ảnh (nếu có)</label>
                            <div class="input-group">
                                <input id="hinh_anh_3" name="hinh_anh_3" class="form-control" type="text">
                                <input type="button" id="lfm3" class="btn btn-info lfm" data-input="hinh_anh_3" data-preview="holder_3" value="Chọn ảnh">
                            </div>
                            <img id="holder_3" style="margin-top:15px;max-height:100px;">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <label>Hình ảnh (nếu có)</label>
                            <div class="input-group">
                                <input id="hinh_anh_4" name="hinh_anh_4" class="form-control" type="text">
                                <input type="button" id="lfm4" class="btn btn-info lfm" data-input="hinh_anh_4" data-preview="holder_4" value="Chọn ảnh">
                            </div>
                            <img id="holder_4" style="margin-top:15px;max-height:100px;">
                        </div>
                    </div>
                </div>
                <div class="position-relative form-group mb-2">
                    <label>Mô Tả Ngắn(*)</label>
                    <textarea class="form-control" id="mo_ta_ngan" cols="30" rows="5" placeholder="Nhập vào mô tả ngắn"></textarea>
                </div>
                <div class="position-relative form-group mb-2">
                    <label>Mô Tả Chi Tiết(*)</label>
                    <input name="mo_ta_chi_tiet" id="mo_ta_chi_tiet" placeholder="Nhập vào mô tả chi tiết" type="text" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label>Danh Mục(*)</label>
                            <select id="id_danh_muc" class="form-control">

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label>Tình Trạng(*)</label>
                            <select id="tinh_trang" class="form-control">
                                <option value=1>Đang Mở Bán</option>
                                <option value=0>Tạm Ngưng</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button class="mt-1 btn btn-primary" id="createSanPham">Thêm Mới Sản Phẩm</button>
            </form>
        </div>
    </div>
</div>
<div>
    <div class="table-response">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Danh Sách Sản Phẩm</h5>
                <table class="mb-0 table table-bordered" id="tableSanPham">
                    <thead>
                        <tr>
                            <th class="text-nowrap text-center">#</th>
                            <th class="text-nowrap text-center">Tên Sản Phẩm</th>
                            <th class="text-nowrap text-center">Giá Bán</th>
                            <th class="text-nowrap text-center">Giá Khuyến Mãi</th>
                            <th class="text-nowrap text-center">Ảnh đại diện</th>
                            <th class="text-nowrap text-center">Tình Trạng</th>
                            <th class="text-nowrap text-center">Danh Mục</th>
                            <th class="text-nowrap text-center">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody class="text-nowrap text-center">
                        <td>1</td>
                        <td>Iphone</td>
                        <td>12000000</td>
                        <td>10000000</td>
                        <td>12</td>
                        <td>Mở</td>
                        <td>ok</td>
                        <td>
                            <button class="btn btn-primary">Chỉnh sửa</button>
                            <button class="btn btn-danger">Xóa</button>
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
    $("#lfm").filemanager('image');
    $("#lfm2").filemanager('image');
    $("#lfm3").filemanager('image');
    $("#lfm4").filemanager('image');
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
    CKEDITOR.replace('mo_ta_chi_tiet', options);
    CKEDITOR.replace('mo_ta_chi_tiet_edit', options);
</script>
@endsection
