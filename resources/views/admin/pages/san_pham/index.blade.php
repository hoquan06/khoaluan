@extends('admin.master')

@section('content')
<div class="row">
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
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label>Giá Bán(*)</label>
                                <input id="gia_ban" placeholder="Nhập vào giá bán" type="number" class="form-control">
                            </div>
                        </div>
                        {{-- <div class="col-md-5">
                            <div class="position-relative form-group">
                                <label>Giá Khuyến Mãi</label>
                                <input id="gia_khuyen_mai" placeholder="Nhập vào giá khuyến mãi" type="number" class="form-control">
                            </div>
                        </div> --}}
                        <div class="col-md-4">
                            <label>Số lượng(*)</label>
                            <div class="input-group input-group-lg bootstrap-touchspin">
                                <span class="input-group-btn bootstrap-touchspin-injected">
                                    <button class="btn btn-primary bootstrap-touchspin-down" id="minus" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg></button>
                                </span>
                                <input type="number" class="touchspin form-control" id="so_luong" value="1">
                                <span class="input-group-btn bootstrap-touchspin-injected">
                                    <button class="btn btn-primary bootstrap-touchspin-up" id="plus" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="position-relative form-group">
                                <label>Ảnh đại diện(*)</label>
                                <div class="input-group">
                                    <input id="hinh_anh" class="form-control" type="text">
                                    <input type="button" id="lfm" class="btn btn-info lfm" data-input="hinh_anh" data-preview="holder" value="Chọn ảnh">
                                </div>
                                <img id="holder" style="margin-top:15px;max-height:100px;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="position-relative form-group">
                                <label>Hình ảnh (nếu có)</label>
                                <div class="input-group">
                                    <input id="hinh_anh_2" class="form-control" type="text">
                                    <input type="button" id="lfm2" class="btn btn-info lfm" data-input="hinh_anh_2" data-preview="holder_2" value="Chọn ảnh">
                                </div>
                                <img id="holder_2" style="margin-top:15px;max-height:100px;">
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="position-relative form-group">
                                <label>Hình ảnh (nếu có)</label>
                                <div class="input-group">
                                    <input id="hinh_anh_3" class="form-control" type="text">
                                    <input type="button" id="lfm3" class="btn btn-info lfm" data-input="hinh_anh_3" data-preview="holder_3" value="Chọn ảnh">
                                </div>
                                <img id="holder_3" style="margin-top:15px;max-height:100px;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="position-relative form-group">
                                <label>Hình ảnh (nếu có)</label>
                                <div class="input-group">
                                    <input id="hinh_anh_4" class="form-control" type="text">
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
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label>Danh Mục(*)</label>
                                <select id="id_danh_muc" class="form-control">
                                    {{-- @foreach ($danh_sachDM as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->ten_danh_muc }}</option>
                                    @endforeach --}}
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
                    <div class="text-end">
                        <button class="mt-1 btn btn-primary" id="themMoi">Thêm Mới Sản Phẩm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="table-responsive card">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Danh Sách Sản Phẩm</h5>
                {{-- <div class="input-group mb-2">
                    <span class="input-group-text" id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span>
                    <input type="text" id="search" class="form-control" placeholder="Search...">
                    <button id="searchAction" type="button" class="btn btn-primary">Tìm kiếm</button>
                </div> --}}
                <table class="mb-0 table table-bordered table-hover" id="tableSanPham">
                    <thead>
                        <tr>
                            <th class="text-nowrap text-center">#</th>
                            <th class="text-nowrap text-center">Tên Sản Phẩm</th>
                            <th class="text-nowrap text-center">Số Lượng</th>
                            <th class="text-nowrap text-center">Giá Bán</th>
                            <th class="text-nowrap text-center">Giá Khuyến Mãi</th>
                            <th class="text-nowrap text-center">Ảnh đại diện</th>
                            <th class="text-nowrap text-center">Tình Trạng</th>
                            <th class="text-nowrap text-center">Danh Mục</th>
                            <th class="text-nowrap text-center">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody class="text-nowrap text-center">
                        {{-- @foreach ($dsSanPham as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->ten_san_pham }}</td>
                                <td>{{ $value->so_luong }}</td>
                                <td>{{ $value->gia_ban }} </td>
                                <td>{{ $value->gia_khuyen_mai }}</td>
                                <td> <img src="{{ $value->hinh_anh }}" style="height: 50px;"> </td>
                                @if ($value->tinh_trang)
                                    <td>
                                        <button data-id="{{ $value->id }}" class="btn btn-primary">Đang mở bán</button>
                                    </td>
                                @else
                                    <td>
                                        <button class="btn btn-danger">Tạm ngưng</button>
                                    </td>
                                @endif

                                <td>{{ $value->id_danh_muc }}</td>
                                <td>
                                    <button class="btn btn-primary">Chỉnh sửa</button>
                                    <button class="btn btn-danger">Xóa</button>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Sản Phẩm</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Bạn thực sự muốn xóa sản phẩm này?
            <input type="text" class="form-control" placeholder="Nhập vào id cần xóa" id="idDelete" hidden>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="button" id="acceptDelete" data-bs-dismiss="modal" class="btn btn-danger">Xóa sản phẩm</button>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh Sửa Sản Phẩm</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="text" id="id_edit" hidden>
            <div class="mb-1">
                <label class="form-label" for="basic-default-name">Tên sản phẩm(*)</label>
                <input type="text" class="form-control ten_san_pham_edit" id="ten_san_pham_edit" placeholder="Nhập vào tên sản phẩm">
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-default-name">Slug sản phẩm(*)</label>
                <input type="text" class="form-control slug_san_pham_edit" id="slug_san_pham_edit" placeholder="Nhập vào slug sản phẩm">
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label>Giá Bán(*)</label>
                        <input id="gia_ban_edit" placeholder="Nhập vào giá bán" type="number" class="form-control">
                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <div class="position-relative form-group">
                        <label>Giá Khuyến Mãi</label>
                        <input id="gia_khuyen_mai_edit" placeholder="Nhập vào giá khuyến mãi" type="number" class="form-control">
                    </div>
                </div> --}}
                <div class="col-md-4">
                    <label>Số lượng(*)</label>
                    <div class="input-group input-group-lg bootstrap-touchspin">
                        <span class="input-group-btn bootstrap-touchspin-injected">
                            <button class="btn btn-primary bootstrap-touchspin-down" id="minus_edit" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg></button>
                        </span>
                        <input type="number" class="touchspin form-control" id="so_luong_edit" value="0">
                        <span class="input-group-btn bootstrap-touchspin-injected">
                            <button class="btn btn-primary bootstrap-touchspin-up" id="plus_edit" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="mb-1">
                <label class="form-label">Ảnh đại diện(*)</label>
                <div class="input-group">
                    <input id="hinh_anh_edit" class="form-control" type="text">
                    <input type="button" class="btn btn-info lfm" id="lfm_edit" data-input="hinh_anh_edit" data-preview="holder_edit" value="Chọn ảnh">
                </div>
                <img id="holder_edit" style="margin-top:15px;max-height:100px;">
            </div>
            <div class="mb-1">
                <label class="form-label">Hình ảnh</label>
                <div class="input-group">
                    <input id="hinh_anh_2_edit" class="form-control" type="text">
                    <input type="button" class="btn btn-info lfm" id="lfm_edit_2" data-input="hinh_anh_2_edit" data-preview="holder_edit_2" value="Chọn ảnh">
                </div>
                <img id="holder_edit_2" style="margin-top:15px;max-height:100px;">
            </div>
            <div class="mb-1">
                <label class="form-label">Hình ảnh</label>
                <div class="input-group">
                    <input id="hinh_anh_3_edit" class="form-control" type="text">
                    <input type="button" class="btn btn-info lfm" id="lfm_edit_3" data-input="hinh_anh_3_edit" data-preview="holder_edit_3" value="Chọn ảnh">
                </div>
                <img id="holder_edit_3" style="margin-top:15px;max-height:100px;">
            </div>
            <div class="mb-1">
                <label class="form-label">Hình ảnh</label>
                <div class="input-group">
                    <input id="hinh_anh_4_edit" class="form-control" type="text">
                    <input type="button" class="btn btn-info lfm" id="lfm_edit_4" data-input="hinh_anh_4_edit" data-preview="holder_edit_4" value="Chọn ảnh">
                </div>
                <img id="holder_edit_4" style="margin-top:15px;max-height:100px;">
            </div>
            <div class="position-relative form-group mb-2">
                <label>Mô Tả Ngắn(*)</label>
                <textarea class="form-control" id="mo_ta_ngan_edit" cols="30" rows="5" placeholder="Nhập vào mô tả ngắn"></textarea>
            </div>
            <div class="position-relative form-group mb-2">
                <label>Mô Tả Chi Tiết(*)</label>
                <input name="mo_ta_chi_tiet" id="mo_ta_chi_tiet_edit" placeholder="Nhập vào mô tả chi tiết" type="text" class="form-control">
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-default-name">Danh mục cha(*)</label>
                <select id="id_danh_muc_edit" name="id_danh_muc_edit" class="select2 form-select select2-hidden-accessible">

                </select>
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-default-name">Tình trạng(*)</label>
                <select id="tinh_trang_edit" name="tinh_trang_edit" class="select2 form-select select2-hidden-accessible">
                    <option value="1">Đang mở bán</option>
                    <option value="0">Tạm ngưng</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="button" id="update" data-bs-dismiss="modal" class="btn btn-primary">Chỉnh sửa</button>
        </div>
      </div>
    </div>
</div>
@section('js')
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js"></script>
<script>
    // $('.lfm').filemanager('image');
    $("#lfm").filemanager('image');
    $("#lfm2").filemanager('image');
    $("#lfm3").filemanager('image');
    $("#lfm4").filemanager('image');
    $("#lfm_edit").filemanager('image');
    $("#lfm_edit_2").filemanager('image');
    $("#lfm_edit_3").filemanager('image');
    $("#lfm_edit_4").filemanager('image');
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
    CKEDITOR.replace('mo_ta_chi_tiet', options);
    CKEDITOR.replace('mo_ta_chi_tiet_edit', options);
</script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function toSlug(str) {
            str = str.toLowerCase();
            str = str
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '');
            str = str.replace(/[đĐ]/g, 'd');
            str = str.replace(/([^0-9a-z-\s])/g, '');
            str = str.replace(/(\s+)/g, '-');
            str = str.replace(/-+/g, '-');
            str = str.replace(/^-+|-+$/g, '');
            return str;
        }

        $("#ten_san_pham").keyup(function(){
            var ten = $("#ten_san_pham").val();
            var slug = toSlug(ten);
            $("#slug_san_pham").val(slug);
        });

        $("#ten_san_pham_edit").keyup(function(){
            var ten = $("#ten_san_pham_edit").val();
            var slug = toSlug(ten);
            $("#slug_san_pham_edit").val(slug);
        });

        $("#minus").click(function(){
            var so = $("#so_luong").val();
            if(so <= 1){
                toastr.error("Số lượng phải lớn hơn hoặc bằng 1");
            } else{
                so--;
                $("#so_luong").val(so);s
            }
        });
        $("#plus").click(function(){
            var so = $("#so_luong").val();
            so++;
            $("#so_luong").val(so);
        });
        $("#minus_edit").click(function(){
            var so = $("#so_luong_edit").val();
            if(so <= 1){
                toastr.error("Số lượng phải lớn hơn hoặc bằng 1");
            } else{
                so--;
                $("#so_luong_edit").val(so);s
            }
        });
        $("#plus_edit").click(function(){
            var so = $("#so_luong_edit").val();
            so++;
            $("#so_luong_edit").val(so);
        });

        $("#themMoi").click(function(e){
            e.preventDefault();

            var payload = {
                'ten_san_pham'        : $("#ten_san_pham").val(),
                'slug_san_pham'       : $("#slug_san_pham").val(),
                'so_luong'            : $("#so_luong").val(),
                'gia_ban'             : $("#gia_ban").val(),
                'gia_khuyen_mai'      : $("#gia_khuyen_mai").val(),
                'hinh_anh'            : $("#hinh_anh").val(),
                'hinh_anh_2'          : $("#hinh_anh_2").val(),
                'hinh_anh_3'          : $("#hinh_anh_3").val(),
                'hinh_anh_4'          : $("#hinh_anh_4").val(),
                'mo_ta_ngan'          : $("#mo_ta_ngan").val(),
                'mo_ta_chi_tiet'      : CKEDITOR.instances['mo_ta_chi_tiet'].getData(),
                'tinh_trang'          : $("#tinh_trang").val(),
                'id_danh_muc'         : $("#id_danh_muc").val(),
            };

            $.ajax({
                url             : '/admin/san-pham/index',
                type            : 'post',
                data            : payload,
                success         : function(res){
                    if(res.themMoi){
                        loadTable();
                        $("#formCreate").trigger('reset');
                        $("#holder").attr('src', '');
                        $("#holder_2").attr('src', '');
                        $("#holder_3").attr('src', '');
                        $("#holder_4").attr('src', '');
                        CKEDITOR.instances.mo_ta_chi_tiet.setData('');
                        toastr.success("Thêm mới sản phẩm thành công!!!");
                    }
                },
                error           : function(res){
                    var danh_sach_loi = res.responseJSON.errors;
                    $.each(danh_sach_loi, function(key, value){
                        toastr.error(value[0]);
                    });
                },
            });
        });

        function loadTable(){
            $.ajax({
                url             : '/admin/san-pham/data',
                type            : 'get',
                success         : function(res){
                    var noiDung = '';
                    $.each(res.danhsachSP, function(key, value){
                        if (value.tinh_trang){
                            var tenTrangThai = 'Đang mở bán';
                            var mauTrangThai = 'btn-primary';
                        } else{
                            var tenTrangThai = 'Tạm ngưng';
                            var mauTrangThai = 'btn-danger';
                        }
                        noiDung += '<tr>';
                        noiDung += '<td>' + (key + 1) + '</td>';
                        noiDung += '<td>' + value.ten_san_pham + '</td>';
                        noiDung += '<td>' + value.so_luong + '</td>';
                        noiDung += '<td>' + numberFormat(value.gia_ban) + ' VND</td>';
                        noiDung += '<td>' + numberFormat(value.gia_khuyen_mai) + ' VND</td>';
                        noiDung += '<td> <img src="' + value.hinh_anh + '" style="height: 50px;"> </td>';
                        noiDung += '<td>';
                        noiDung +=  '<button data-id="' + value.id + '" class="doiTrangThai btn ' +  mauTrangThai + '">' + tenTrangThai + '</button>';
                        noiDung += '</td>';
                        noiDung += '<td>' + value.ten_danh_muc + '</td>';
                        noiDung += '<td>';
                        noiDung +=  '<button data-idedit="' + value.id + '" data-bs-toggle="modal" data-bs-target="#editModal" class="edit btn btn-primary me-1">Chỉnh sửa</button>';
                        noiDung +=  '<button data-iddelete="' + value.id + '" data-bs-toggle="modal" data-bs-target="#deleteModal" class="delete btn btn-danger">Xóa</button>';
                        noiDung += '</td>';
                        noiDung += '</tr>';
                    });
                    var noiDungDM = '';
                    $.each(res.danhsachDM, function(key, value){
                        noiDungDM += '<option value="' + value.id + '">' + value.ten_danh_muc + '</option>';
                    });
                    $("#tableSanPham tbody").html(noiDung);
                    $("#id_danh_muc").html(noiDungDM);
                    $("#id_danh_muc_edit").html(noiDungDM);
                },
            });
        }

        // function loadTableSearch(){
        //     $.ajax({
        //         url             : '/admin/san-pham/data-search',
        //         type            : 'post',
        //         success         : function(res){
        //             var noiDung = '';
        //             $.each(res.search, function(key, value){
        //                 if (value.tinh_trang){
        //                     var tenTrangThai = 'Đang mở bán';
        //                     var mauTrangThai = 'btn-primary';
        //                 } else{
        //                     var tenTrangThai = 'Tạm ngưng';
        //                     var mauTrangThai = 'btn-danger';
        //                 }
        //                 noiDung += '<tr>';
        //                 noiDung += '<td>' + (key + 1) + '</td>';
        //                 noiDung += '<td>' + value.ten_san_pham + '</td>';
        //                 noiDung += '<td>' + value.so_luong + '</td>';
        //                 noiDung += '<td>' + numberFormat(value.gia_ban) + ' VND</td>';
        //                 noiDung += '<td>' + numberFormat(value.gia_khuyen_mai) + ' VND</td>';
        //                 noiDung += '<td> <img src="' + value.hinh_anh + '" style="height: 50px;"> </td>';
        //                 noiDung += '<td>';
        //                 noiDung +=  '<button data-id="' + value.id + '" class="doiTrangThai btn ' +  mauTrangThai + '">' + tenTrangThai + '</button>';
        //                 noiDung += '</td>';
        //                 noiDung += '<td>' + value.ten_danh_muc + '</td>';
        //                 noiDung += '<td>';
        //                 noiDung +=  '<button data-idedit="' + value.id + '" data-bs-toggle="modal" data-bs-target="#editModal" class="edit btn btn-primary me-1">Chỉnh sửa</button>';
        //                 noiDung +=  '<button data-iddelete="' + value.id + '" data-bs-toggle="modal" data-bs-target="#deleteModal" class="delete btn btn-danger">Xóa</button>';
        //                 noiDung += '</td>';
        //                 noiDung += '</tr>';
        //             });
        //             var noiDungDM = '';
        //             $.each(res.danhsachDM, function(key, value){
        //                 noiDungDM += '<option value="' + value.id + '">' + value.ten_danh_muc + '</option>';
        //             });
        //             $("#tableSanPham tbody").html(noiDung);
        //             $("#id_danh_muc").html(noiDungDM);
        //             $("#id_danh_muc_edit").html(noiDungDM);
        //         },
        //     });
        // }
        loadTable();

        $('body').on('click', '.doiTrangThai', function(){
            var idSanPham = $(this).data('id');
            var self = $(this);
            $.ajax({
                url             : '/admin/san-pham/doi-trang-thai/' + idSanPham,
                type            : 'get',
                success         : function(res){
                    if(res.doitrangthai){
                        toastr.success("Đổi trạng thái thành công!!!");
                        if(res.tinhtrang){
                            self.html('Đang mở bán');
                            self.removeClass('btn-danger');
                            self.addClass('btn-primary');
                        } else{
                            self.html('Tạm ngưng');
                            self.removeClass('btn-primary');
                            self.addClass('btn-danger');
                        }
                    } else{
                        toastr.error("Sản phẩm không tồn tại!!!");
                    }
                },
            });
        });

        $('body').on('click', '.delete', function(){
            var idXoa = $(this).data('iddelete');
            $("#idDelete").val(idXoa);
        });

        $("#acceptDelete").click(function(){
            var id =  $("#idDelete").val();
            $.ajax({
                url         : '/admin/san-pham/delete/' + id,
                type        : 'get',
                success     : function(res){
                    if(res.xoa){
                        toastr.success('Đã xóa sản phẩm thành công!!!');
                        loadTable();
                    } else{
                        toastr.error("Sản phẩm không tồn tại!!!");
                    }
                },
            });
        });

        $('body').on('click', '.edit', function(){
            var id = $(this).data('idedit');

            $.ajax({
                url         : '/admin/san-pham/edit/' + id,
                type        : 'get',
                success     : function(res){
                    if(res.edit){
                        $("#ten_san_pham_edit").val(res.data.ten_san_pham);
                        $("#slug_san_pham_edit").val(res.data.slug_san_pham);
                        $("#so_luong_edit").val(res.data.so_luong);
                        $("#gia_ban_edit").val(res.data.gia_ban);
                        $("#gia_khuyen_mai_edit").val(res.data.gia_khuyen_mai);
                        $("#hinh_anh_edit").val(res.data.hinh_anh);
                        $("#hinh_anh_2_edit").val(res.data.hinh_anh_2);
                        $("#hinh_anh_3_edit").val(res.data.hinh_anh_3);
                        $("#hinh_anh_4_edit").val(res.data.hinh_anh_4);
                        $("#holder_edit").attr('src', res.data.hinh_anh);
                        $("#holder_edit_2").attr('src', res.data.hinh_anh_2);
                        $("#holder_edit_3").attr('src', res.data.hinh_anh_3);
                        $("#holder_edit_4").attr('src', res.data.hinh_anh_4);
                        $("#mo_ta_ngan_edit").val(res.data.mo_ta_ngan);
                        CKEDITOR.instances['mo_ta_chi_tiet_edit'].setData(res.data.mo_ta_chi_tiet);
                        $("#tinh_trang_edit").val(res.data.tinh_trang);
                        $("#id_danh_muc_edit").val(res.data.id_danh_muc);
                        $("#id_edit").val(res.data.id);
                    } else{
                        toastr.error("Sản phẩm không tồn tại!!!");
                        setTimeout(function() {
                            $("#close").click();
                        }, 800);
                    }
                },
            });
        });

        $("#update").click(function(){
            var payload = {
                'ten_san_pham'              : $("#ten_san_pham_edit").val(),
                'slug_san_pham'             : $("#slug_san_pham_edit").val(),
                'so_luong'                  : $("#so_luong_edit").val(),
                'gia_ban'                   : $("#gia_ban_edit").val(),
                'gia_khuyen_mai'            : $("#gia_khuyen_mai_edit").val(),
                'hinh_anh'                  : $("#hinh_anh_edit").val(),
                'hinh_anh_2'                : $("#hinh_anh_2_edit").val(),
                'hinh_anh_3'                : $("#hinh_anh_3_edit").val(),
                'hinh_anh_4'                : $("#hinh_anh_4_edit").val(),
                'mo_ta_ngan'                : $("#mo_ta_ngan_edit").val(),
                'mo_ta_chi_tiet'            : CKEDITOR.instances['mo_ta_chi_tiet_edit'].getData(),
                'tinh_trang'                : $("#tinh_trang_edit").val(),
                'id_danh_muc'               : $("#id_danh_muc_edit").val(),
                'id'                        : $("#id_edit").val(),
            };

            $.ajax({
                url             : '/admin/san-pham/update',
                type            : 'post',
                data            : payload,
                success         : function(res){
                    if(res.update){
                        toastr.success("Cập nhật thành công!!!");
                        loadTable();
                    } else{
                        toastr.error("Sản phẩm không tồn tại!!!");
                    }
                },
                error           : function(res){
                    var danh_sach_loi = res.responseJSON.errors;
                    $.each(danh_sach_loi, function(key, value){
                        toastr.error(value[0]);
                    });
                },
            });
        });

        function numberFormat(number){
            return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number);
        };

        // $("#searchAction").click(function(){
        //     var payload = {
        //         'tenSanPham' : $('#search').val(),
        //     };
        //     axios
        //         .post('/admin/san-pham/search', payload)
        //         .then((res) => {
        //             if(res.data.search){
        //                 toastr.success("Đã tìm thấy sản phẩm!");
        //                 loadTableSearch();
        //             } else{
        //                 toastr.error("not ok");
        //             }
        //         });
        // });
    });
</script>
@endsection
