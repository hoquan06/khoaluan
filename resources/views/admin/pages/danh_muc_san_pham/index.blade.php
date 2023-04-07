@extends('admin.master')

@section('content')
<div class="row">
    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Thêm Mới Danh Mục Sản Phẩm</h4>
            </div>
            <div class="card-body">
                <form id="jquery-val-form" novalidate="novalidate">
                    <div class="mb-1">
                        <label class="form-label" for="basic-default-name">Tên danh mục(*)</label>
                        <input type="text" class="form-control" id="ten_danh_muc" name="ten_danh_muc" placeholder="Nhập vào tên danh mục">
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="basic-default-name">Slug danh mục(*)</label>
                        <input type="text" class="form-control" id="slug_danh_muc" name="slug_danh_muc" placeholder="Nhập vào slug danh mục">
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Hình ảnh(*)</label>
                        <div class="input-group">
                            <input id="hinh_anh" name="hinh_anh" class="form-control" type="text">
                            <input type="button" class="btn btn-info" id="lfm1" data-input="hinh_anh" data-preview="holder" value="Chọn ảnh">
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="basic-default-name">Danh mục cha(*)</label>
                        <select id="id_danh_muc_cha" name="id_danh_muc_cha" class="select2 form-select select2-hidden-accessible">
                            {{-- <option value="0">Root</option>
                            @foreach ($danh_muc_cha as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->ten_danh_muc }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="basic-default-name">Tình trạng(*)</label>
                        <select id="tinh_trang" name="tinh_trang" class="select2 form-select select2-hidden-accessible">
                            <option value="1">Đang mở bán</option>
                            <option value="0">Tạm ngưng</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" id="themMoi" class="btn btn-primary waves-effect waves-float waves-light">Thêm mới danh mục</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body text-center"><h5 class="card-title">Danh Sách Danh Mục</h5>
                <table class="mb-0 table table-bordered table-hover" id="tableDanhMuc">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tên Danh Mục</th>
                            <th class="text-center">Danh Mục Cha</th>
                            <th class="text-center">Tình Trạng</th>
                            <th class="text-center">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody class="text-nowrap text-center">
                        {{-- @foreach ($data as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->ten_danh_muc }}</td>
                                @if ($value->id_danh_muc_cha == 0)
                                    <td>Root</td>
                                @else
                                    <td>{{ $value->ten_danh_muc_cha }}</td>
                                @endif
                                @if ($value->tinh_trang == 0)
                                    <td>
                                        <button data-id="{{ $value->id }}" class="doiTrangThai btn btn-primary">Đang mở bán</button>
                                    </td>
                                @else
                                <td>
                                    <button data-id="{{ $value->id }}" class="btn btn-danger doiTrangThai">Tạm ngưng</button>
                                </td>
                                @endif
                                <td>
                                    <button class="btn btn-success edit" data-idedit="{{ $value->id }}" data-bs-toggle="modal" data-bs-target="#editModal">Chỉnh sửa</button>
                                    <button class="btn btn-primary delete" data-iddelete="{{ $value->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Danh Mục Sản Phẩm</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Bạn thực sự muốn xóa danh mục này?
            <input type="text" class="form-control" placeholder="Nhập vào id cần xóa" id="idDeleteDanhMuc" hidden>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="button" id="acceptDelete" data-bs-dismiss="modal" class="btn btn-danger">Xóa danh mục</button>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh Sửa Danh Mục Sản Phẩm</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="text" id="id_edit" hidden>
            <div class="mb-1">
                <label class="form-label" for="basic-default-name">Tên danh mục</label>
                <input type="text" class="form-control ten_danh_muc" id="ten_danh_muc_edit" name="ten_danh_muc_edit" placeholder="Nhập vào tên danh mục">
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-default-name">Slug danh mục</label>
                <input type="text" class="form-control slug_danh_muc" id="slug_danh_muc_edit" name="slug_danh_muc_edit" placeholder="Nhập vào slug danh mục">
            </div>
            <div class="mb-1">
                <label class="form-label">Hình ảnh</label>
                <div class="input-group">
                    <input id="hinh_anh_edit" name="hinh_anh_edit" class="form-control" type="text">
                    <input type="button" class="btn btn-info" id="lfm2" data-input="hinh_anh_edit" data-preview="holder_edit" value="Chọn ảnh">
                </div>
                <img id="holder_edit" style="margin-top:15px;max-height:100px;">
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-default-name">Danh mục cha</label>
                <select id="id_danh_muc_cha_edit" name="id_danh_muc_cha_edit" class="select2 form-select select2-hidden-accessible">
                    {{-- <option value="0">Root</option>
                    @foreach ($danh_muc_cha as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->ten_danh_muc }}</option>
                    @endforeach --}}
                </select>
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-default-name">Tình trạng</label>
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
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        $('#lfm1').filemanager('image');
        $('#lfm2').filemanager('image');
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

            function loadTable() {
                $.ajax({
                    url         : '/admin/danh-muc-san-pham/data',
                    type        : 'get',
                    success     : function(res){
                        var danhSachDM = res.danh_sach;
                        var noiDung = '';
                        $.each(danhSachDM, function(key, value){
                            if(value.id_danh_muc_cha == 0) {
                                var tenDMCha = 'Root';
                            } else{
                                var tenDMCha = value.ten_danh_muc_cha;
                            }

                            if(value.tinh_trang == 1){
                                var tenTrangThai = 'Đang mở bán';
                                var mauTrangThai = 'btn-primary';
                            } else{
                                var tenTrangThai = 'Tạm ngưng';
                                var mauTrangThai = 'btn-danger';
                            }
                            noiDung += '<tr>';
                            noiDung += '<td>' + (key + 1) + '</td>';
                            noiDung += '<td>' + value.ten_danh_muc + '</td>';
                            noiDung += '<td>' + tenDMCha + '</td>';
                            noiDung += '<td>';
                            noiDung += '<button data-id="' + value.id + '" class="doiTrangThai btn ' + mauTrangThai + '">' + tenTrangThai + '</button>';
                            noiDung += '</td>';
                            noiDung += '<td class="text-center">';
                            noiDung += '<button class="btn btn-success edit me-1" data-idedit="' + value.id + '" data-bs-toggle="modal" data-bs-target="#editModal">Chỉnh sửa</button>';
                            noiDung += '<button class="btn btn-danger delete" data-iddelete="' + value.id + '" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>';
                            noiDung += '</td>';
                            noiDung += '</tr>';
                        });
                        var danhMucCha = res.danh_muc_cha;
                        var noiDungDMCha =  '<option value="0">Root</option>';
                        $.each(danhMucCha, function(key, value){
                            noiDungDMCha += '<option value="' + value.id + '">' + value.ten_danh_muc + '</option>';
                        });
                        $("#id_danh_muc_cha").html(noiDungDMCha);
                        $("#id_danh_muc_cha_edit").html(noiDungDMCha);
                        $("#tableDanhMuc tbody").html(noiDung);
                    },
                });
            }

            loadTable();

            $("#ten_danh_muc").keyup(function(){
                var ten  = $("#ten_danh_muc").val();
                var slug = toSlug(ten);
                $("#slug_danh_muc").val(slug);
            });

            $(".ten_danh_muc").keyup(function(){
                var ten  = $("#ten_danh_muc_edit").val();
                var slug = toSlug(ten);
                $("#slug_danh_muc_edit").val(slug);
            });

            $("#themMoi").click(function(e){
                e.preventDefault();
                var payload = {
                    'ten_danh_muc'              : $("#ten_danh_muc").val(),
                    'slug_danh_muc'             : $("#slug_danh_muc").val(),
                    'hinh_anh'                  : $("#hinh_anh").val(),
                    'id_danh_muc_cha'           : $("#id_danh_muc_cha").val(),
                    'tinh_trang'                : $("#tinh_trang").val(),
                };

                $.ajax({
                    url     : '/admin/danh-muc-san-pham/index',
                    type    : 'post',
                    data    : payload,
                    success : function(res){
                        toastr.success("Đã thêm mới danh mục!!!", "Thành công!");
                        loadTable();
                        $("#jquery-val-form").trigger("reset");
                        $("#holder").attr('src', '');
                    },
                    error   : function(res){
                        var danh_sach_loi = res.responseJSON.errors;
                        $.each(danh_sach_loi, function(key, value){
                            toastr.error(value[0]);
                        });
                    },
                });
            });

            $('body').on('click', '.doiTrangThai', function(){
                var idDanhMuc = $(this).data('id');
                var self = $(this);
                $.ajax({
                    url         : '/admin/danh-muc-san-pham/doi-trang-thai/' + idDanhMuc,
                    type        : 'get',
                    success     : function(res){
                        if(res.doitrangthai){
                            toastr.success("Đổi trạng thái thành công!!!");
                            if(res.tinhtrang){
                                self.html("Đang mở bán");
                                self.removeClass('btn-danger');
                                self.addClass('btn-primary');
                            } else{
                                self.html("Tạm ngưng");
                                self.removeClass('btn-primary');
                                self.addClass('btn-danger');
                            }
                        } else{
                            toastr.error("Danh mục sản phẩm không tồn tại!!!");
                        }
                    }
                });
            });

            $('body').on('click', '.delete', function(){
                var getId = $(this).data('iddelete');
                $("#idDeleteDanhMuc").val(getId);
            });

            $("#acceptDelete").click(function(){
                var id = $("#idDeleteDanhMuc").val();
                $.ajax({
                    url         : '/admin/danh-muc-san-pham/delete/' + id,
                    type        : 'get',
                    success     : function(res){
                        if(res.xoa){
                            toastr.success("Xóa danh mục thành công!!!");
                            loadTable();
                        } else{
                            toastr.error("Danh mục không tồn tại!!!");
                        }
                    },
                });
            });

            $('body').on('click', '.edit', function(){
                var id = $(this).data('idedit');
                $.ajax({
                    url         : '/admin/danh-muc-san-pham/edit/' + id,
                    type        : 'get',
                    success     : function(res){
                        if(res.edit){
                            $("#ten_danh_muc_edit").val(res.data.ten_danh_muc);
                            $("#slug_danh_muc_edit").val(res.data.slug_danh_muc);
                            $("#hinh_anh_edit").val(res.data.hinh_anh);
                            $("#holder_edit").attr("src", res.data.hinh_anh);
                            $("#id_danh_muc_cha_edit").val(res.data.id_danh_muc_cha);
                            $("#tinh_trang_edit").val(res.data.tinh_trang);
                            $("#id_edit").val(res.data.id);
                        } else{
                            toastr.error("Danh mục không tồn tại!!!");
                            window.setTimeout(() => {
                                $("#close").click();
                            }, 1000);
                        }
                    },
                });
            });

            $("#update").click(function(){
                var payload = {
                    'ten_danh_muc'              : $("#ten_danh_muc_edit").val(),
                    'slug_danh_muc'             : $("#slug_danh_muc_edit").val(),
                    'hinh_anh'                  : $("#hinh_anh_edit").val(),
                    'id_danh_muc_cha'           : $("#id_danh_muc_cha_edit").val(),
                    'tinh_trang'                : $("#tinh_trang_edit").val(),
                    'id'                        : $("#id_edit").val(),
                };
                $.ajax({
                    url         : '/admin/danh-muc-san-pham/update',
                    type        : 'post',
                    data        : payload,
                    success     : function(res){
                        if(res.update){
                            toastr.success("Đã cập nhật thành công!!!");
                            loadTable();
                            $("#holder").attr('src', '');
                            $("#close").click();
                        }
                    },
                    error       : function(res){
                        var danh_sach_loi = res.responseJSON.errors;
                        $.each(danh_sach_loi, function(key, value){
                            toastr.error(value[0]);
                        });
                    }
                });
            });
        });
    </script>
@endsection
