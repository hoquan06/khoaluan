@extends('admin.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 git card">
            <div class="card-body"> <h5 class="card-title">Thêm Mới Khuyến Mãi</h5>
                <form class="" id="formCreate">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="position-relative form-group">
                                <label>Tên Chương Trình(*)</label>
                                <input id="ten_chuong_trinh" placeholder="Nhập vào tên chương trình " type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="position-relative form-group">
                                <label>Mức Giảm(*)</label>
                                <input id="muc_giam" placeholder="Nhập vào mức giảm" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="position-relative form-group">
                                <label>Thời Gian Bắt Đầu(*)</label>
                                <input id="thoi_gian_bat_dau" placeholder="Nhập vào thời gian bắt đầu" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="position-relative form-group">
                                <label>Thời Gian Kết Thúc(*)</label>
                                <input id="thoi_gian_ket_thuc" placeholder="Nhập vào thời gian kết thúc" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="basic-default-name">Sản phẩm</label>
                            <select id="danh_muc_id" name="loai_chuong_trinh" class="select2 form-select select2-hidden-accessible">
                                @foreach($menuCon as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->ten_danh_muc }}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="text-center">
                        <button class="mt-1 btn btn-primary" type="button" id="themMoi">Thêm Mới Khuyến Mãi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive card">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Danh Sách Các Mặt Hàng Khuyến Mãi</h5>
                <table class="mb-0 table table-bordered table-hover" id="tableKhuyenMai">
                    <thead>
                        <tr>
                            <th class="text-nowrap text-center">#</th>
                            <th class="text-nowrap text-center">Tên Chương Trình</th>
                            <th class="text-nowrap text-center">Loại Sản Phẩm</th>
                            <th class="text-nowrap text-center">Mức Giảm</th>
                            <th class="text-nowrap text-center">Thời gian bắt đầu</th>
                            <th class="text-nowrap text-center">Thời gian kết thúc</th>
                            <th class="text-nowrap text-center">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody class="text-nowrap text-center">
                        <!-- @foreach($dsKhuyenMai as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->ten_chuong_trinh }}</td>
                                <td>{{ $value->ten_danh_muc}}</td>
                                <td>{{ number_format($value->muc_giam) }} VND</td>
                                <td>{{ $value->thoi_gian_bat_dau }}</td>
                                <td>{{ $value->thoi_gian_ket_thuc }}</td>
                                <td>
                                    <button class="btn btn-success">Sửa</button>
                                    <button class="btn btn-danger delete" data-iddelete="{{ $value->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                                </td>
                            </tr>
                        @endforeach -->
                    </tbody>
                </table>
            </div>
        </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa chương trình khuyến mãi </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Bạn muốn xóa chương trình khuyến mãi này?
            <input type="text" class="form-control" id="idDelete" hidden>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="button" id="acceptDelete" data-bs-dismiss="modal" class="btn btn-danger">Xóa</button>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh Sửa Khuyến Mãi</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="text" id="id_edit" hidden>
            <div class="mb-1">
                <label class="form-label" for="basic-default-name">Tên chương trình</label>
                <input type="text" class="form-control ten_danh_muc" id="ten_chuong_trinh_edit" placeholder="Nhập vào tên danh mục">
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-default-name">Sản phẩm</label>
                <select id="danh_muc_id_edit" name="loai_chuong_trinh" class="select2 form-select select2-hidden-accessible">
                    @foreach($menuCon as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->ten_danh_muc }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-default-name">Mức Giảm</label>
                <input type="text" class="form-control slug_danh_muc" id="muc_giam_edit" placeholder="Nhập vào slug danh mục">
            <div class="mb-1">
                <div class="position-relative form-group">
                    <label>Thời Gian Bắt Đầu(*)</label>
                    <input id="thoi_gian_bat_dau_edit" placeholder="Nhập vào thời gian kết thúc" type="date" class="form-control">
                </div>
            </div>
            <div class="mb-1">
                <div class="position-relative form-group">
                    <label>Thời Gian Kết Thúc(*)</label>
                    <input id="thoi_gian_ket_thuc_edit" placeholder="Nhập vào thời gian kết thúc" type="date" class="form-control">
                </div>
            </div>
        <div class="modal-footer">
          <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="button" id="update" data-bs-dismiss="modal" class="btn btn-primary">Sửa</button>
        </div>
      </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function loadTable() {
                $.ajax({
                    url         : '/admin/khuyen-mai/data',
                    type        : 'get',
                    success     : function(res){
                        var danhSachKM = res.khuyen_mai;
                        var noiDung = '';
                        $.each(danhSachKM, function(key, value){
                            noiDung += '<tr>';
                            noiDung += '<td>' + (key + 1) + '</td>';
                            noiDung += '<td>' + value.ten_chuong_trinh + '</td>';
                            noiDung += '<td>' + value.ten_danh_muc + '</td>';
                            noiDung += '<td>' + numberFormat(value.muc_giam) + '</td>';
                            noiDung += '<td>' + value.thoi_gian_bat_dau + '</td>';
                            noiDung += '<td>' + value.thoi_gian_ket_thuc + '</td>';
                            noiDung += '<td>';
                            noiDung += '<button class="btn btn-success edit me-1" data-idedit="' + value.id + '" data-bs-toggle="modal" data-bs-target="#editModal">Sửa</button>';
                            noiDung += '<button class="btn btn-danger delete" data-iddelete="' + value.id + '" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>';
                            noiDung += '</td>';
                            noiDung += '</tr>';

                        });
                        $("#tableKhuyenMai tbody").html(noiDung);
                    },
                });
            }

            loadTable();

            $("#themMoi").click(function(e){

                e.preventDefault();
                var payload = {
                    'ten_chuong_trinh'    : $("#ten_chuong_trinh").val(),
                    'muc_giam'            : $("#muc_giam").val(),
                    'danh_muc_id'         : $("#danh_muc_id").val(),
                    'thoi_gian_bat_dau'   : $("#thoi_gian_bat_dau").val(),
                    'thoi_gian_ket_thuc'  : $("#thoi_gian_ket_thuc").val(),
                };

                var id = $("#danh_muc_id").val();

                $.ajax({
                    url     : '/admin/khuyen-mai/index',
                    type    : 'post',
                    data    : payload,
                    success : function(res){
                        toastr.success("Thêm mới chương trình khuyến mãi thành công!!!");
                        loadTable();
                        $("#formCreate").trigger('reset');
                    },
                    error   : function(res){;
                        var danh_sach_loi = res.responseJSON.errors;
                        $.each(danh_sach_loi, function(key, value){
                            toastr.error(value[0]);
                        });
                    },
                });
            });

            $('body').on('click', '.delete', function(){
                var getId = $(this).data('iddelete');
                $("#idDelete").val(getId);
            });

            $("#acceptDelete").click(function(){
                var id = $("#idDelete").val();
                $.ajax({
                    url         : '/admin/khuyen-mai/delete/' + id,
                    type        : 'get',
                    success     : function(res){
                        if(res.status){
                            toastr.success("Xóa chương trình khuyến mãi thành công!!!");
                            loadTable();
                        } else{
                            toastr.error("Có lỗi xảy ra!!!");
                        }
                    },
                });
            });

            $('body').on('click', '.edit', function(){
                var id = $(this).data('idedit');
                $.ajax({
                    url         : '/admin/khuyen-mai/edit/' + id,
                    type        : 'get',
                    success     : function(res){
                        if(res.edit){
                            $("#ten_chuong_trinh_edit").val(res.data.ten_chuong_trinh);
                            $("#danh_muc_id_edit").val(res.data.danh_muc_id);
                            $("#muc_giam_edit").val(res.data.muc_giam);
                            $("#thoi_gian_bat_dau_edit").val(res.data.thoi_gian_bat_dau);
                            $("#thoi_gian_ket_thuc_edit").val(res.data.thoi_gian_ket_thuc);
                            $("#id_edit").val(res.data.id);
                        } else{
                            toastr.error("Khuyến mãi không tồn tại!!!");
                            window.setTimeout(() => {
                                $("#close").click();
                            }, 1000);
                        }
                    },
                });
            });

            $("#update").click(function(){
                var payload = {
                    'ten_chuong_trinh'         : $("#ten_chuong_trinh_edit").val(),
                    'danh_muc_id'              : $("#danh_muc_id_edit").val(),
                    'muc_giam'                 : $("#muc_giam_edit").val(),
                    'thoi_gian_bat_dau'        : $("#thoi_gian_bat_dau_edit").val(),
                    'thoi_gian_ket_thuc'       : $("#thoi_gian_ket_thuc_edit").val(),
                    'id'                       : $("#id_edit").val(),
                };


                $.ajax({
                    url         : '/admin/khuyen-mai/update',
                    type        : 'post',
                    data        : payload,
                    success     : function(res){
                        if(res.update){
                            toastr.success("Đã cập nhật khuyễn mãi thành công!!!");
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

            function numberFormat(number)
            {
                return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number);
            }
        });
    </script>
@endsection
