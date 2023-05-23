@extends('admin.master')

@section('content')
<div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body text-center table-responsive"><h5 class="card-title">Đơn hàng đã được hoàn phí</h5>
                <table class="mb-0 table table-bordered table-hover" id="tableDonHang">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tên Khách Hàng</th>
                            <th class="text-center">Số điện thoại</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Mã Đơn Hàng</th>
                            <th class="text-center">Giá Trị Đơn Hàng</th>
                            <th class="text-center">Trạng Thái</th>
                            <th class="text-center">Thao Tác</th>

                        </tr>
                    </thead>
                    <tbody class="text-nowrap text-center">
                        @foreach ($daHoanPhi as $key => $value)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$value->ho_va_ten}}</td>
                                <td>{{$value->so_dien_thoai}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->ma_don_hang}}</td>
                                <td>{{number_format($value->thuc_tra)}} đ</td>
                                <td>Đã hoàn phí</td>
                                <td>
                                    <button data-id="{{$value->id}}" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-success delete">Xóa</button>
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
              <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Đơn Hàng</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn thực sự muốn xóa đơn hàng này?
                <input type="text" class="form-control" id="idDelete" hidden>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
              <button type="button" id="acceptDelete" data-bs-dismiss="modal" class="btn btn-danger">Xóa</button>
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

            var row = '';
            $(".hoanPhi").click(function(){
                var id = $(this).data('id');
                $("#idhoanPhi").val(id);
                row = $(this).closest('tr');
            });
            $("#chapNhanHoanPhi").click(function(){
                var id = $("#idhoanPhi").val();

                $.ajax({
                    url             : '/admin/don-hang/xac-nhan/' + id,
                    type            : 'get',
                    success         : function(res){
                        if(res.status){
                            toastr.success("Xác nhận thành công!");
                            row.remove();
                        } else{
                            toastr.error("Đơn hàng không tồn tại!");
                        }
                    }
                });
            });
            var row = '';
            $('body').on('click', '.delete', function(){
                var getId = $(this).data('id');
                $("#idDelete").val(getId);
                row = $(this).closest('tr');
            });

            $("#acceptDelete").click(function(){
                var id = $("#idDelete").val();
                $.ajax({
                    url         : '/admin/don-hang/delete/' + id,
                    type        : 'get',
                    success     : function(res){
                        if(res.xoa == 0){
                            toastr.error(res.message);
                        } else if(res.xoa == 1){
                            toastr.error(res.message);
                        } else if(res.xoa == 2){
                            toastr.success(res.message);
                            row.remove();
                        } else{
                            toastr.error(res.message);
                        }
                    },
                });
            });
        });
</script>
@endsection
