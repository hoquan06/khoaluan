@extends('admin.master')

@section('content')
<div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body text-center"><h5 class="card-title">Danh sách tài khoản đã đăng ký</h5>
                <table class="mb-0 table table-bordered table-hover" id="tableDanhMuc">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tên Tài Khoản</th>
                            <th class="text-center">Gmail</th>
                            <th class="text-center">SDT</th>
                            <th class="text-center">Ngày Tháng Năm Sinh</th>
                            <th class="text-center">Địa Chỉ</th>
                            <th class="text-center">Loại Tài Khoản</th>
                            <th class="text-center">Thao Tác</th>

                        </tr>
                    </thead>
                    <tbody class="text-nowrap text-center">
                        @foreach($data as $key => $value)
                           <tr>
                                <td>{{ $key + 1}}</td>
                                <td>{{ $value->ho_va_ten}}</td>
                                <td>{{ $value->ngay_sinh}}</td>
                                <td>{{ $value->so_dien_thoai}}</td>
                                <td>{{ $value->email}}</td>
                                <td>{{ $value->dia_chi}}</td>
                                @if ($value->loai_tai_khoan == 1)
                                    <td>Đã kích hoạt</td>
                                @else
                                    <td>Chưa kích hoạt</td>
                                @endif
                                <td>
                                    <button class="btn btn-danger delete" data-iddelete="{{ $value->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                                    @if ($value->is_lock)
                                        <button data-id="{{ $value->id }}" class="khoaTaiKhoan btn btn-primary">Mở Khóa</button>
                                    @else
                                        <button data-id="{{ $value->id }}" class="btn btn-danger khoaTaiKhoan">Khóa</button>
                                    @endif
                                </td>
                           </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Tài Khoản</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Bạn thực sự muốn xóa tài khoản này?
            <input type="text" class="form-control" id="idDelete" hidden>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="button" id="acceptDelete" data-bs-dismiss="modal" class="btn btn-danger">Xóa tài khoản</button>
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

            $('body').on('click', '.khoaTaiKhoan', function(){

                var idTaiKhoan = $(this).data('id');

                var self = $(this);
                $.ajax({
                    url         : '/admin/tai-khoan/lock/' + idTaiKhoan,
                    type        : 'get',
                    success     : function(res){
                        if(res.status){  
                            if(res.lock){
                                self.html("Mở Khóa");
                                self.removeClass('btn-danger');
                                self.addClass('btn-primary');   
                                toastr.success("Khóa tài khoản thành công!!!");                                   
                            } else{
                                self.html("Khóa");
                                self.removeClass('btn-primary');
                                self.addClass('btn-danger');   
                                toastr.success("Mở khóa tài khoản thành công!!!");     
                            }
                        } else{                         
                            toastr.error("Tài khoản không tồn tại!!!");
                        }
                    }
                });
            });
   
            var row = '';
            $('body').on('click', '.delete', function(){
                var getId = $(this).data('iddelete');
                $("#idDelete").val(getId);
                row = $(this).closest('tr');
            });

            $("#acceptDelete").click(function(){
                var id = $("#idDelete").val();
                $.ajax({
                    url         : '/admin/tai-khoan/delete/' + id,
                    type        : 'get',
                    success     : function(res){
                        if(res.xoa){
                            toastr.success("Xóa tài khoản thành công!!!");
                            row.remove();
                        } else{
                            toastr.error("Tài khoản không tồn tại!!!");
                        }
                    },
                });
            });
        });
    </script>
@endsection