@extends('admin.master')

@section('content')
<div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body text-center"><h5 class="card-title">Danh Sách Đơn Hàng</h5>
                <table class="mb-0 table table-bordered table-hover" id="tableDanhMuc">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Mã Đơn Hàng</th>
                            <th class="text-center">Địa Chỉ Giao Hàng</th>
                            <th class="text-center">Tình Trạng</th>
                            <th class="text-center">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody class="text-nowrap text-center">
                        @foreach($donHang as $key => $value)
                            <tr> 
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->ma_don_hang }}</td>               
                            <td>{{ $value->dia_chi_giao_hang }}</td>               
                                @if($value->tinh_trang == 0)
                                    <td>
                                        <button data-id="{{ $value->id }}" class="doiTrangThai btn btn-success">Duyệt</button>
                                    </td>
                                @else
                                    <td>
                                        <button data-id="{{ $value->id }}" class="btn btn-danger doiTrangThai">Hủy Duyệt</button>
                                    </td>
                                @endif              
                                <td>
                                    <a href="/admin/don-hang/view/{{ $value->id }}" class="btn btn-success">Xem</a>
                                    <button class="btn btn-danger delete" data-iddelete="{{ $value->id }}"  data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
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
            $('body').on('click', '.delete', function(){
                var getId = $(this).data('iddelete');
                $("#idDelete").val(getId);
                row = $(this).closest('tr');
            });

            $("#acceptDelete").click(function(){
                var id = $("#idDelete").val();
                $.ajax({
                    url         : '/admin/don-hang/delete/' + id,
                    type        : 'get',
                    success     : function(res){
                        if(res.xoa){
                            toastr.success("Xóa đơn hàng thành công!!!");
                            row.remove();
                        } else{
                            toastr.error("Đơn hàng không tồn tại!!!");
                        }
                    },
                });
            });

            $('body').on('click', '.doiTrangThai', function(){
                var idDonHang = $(this).data('id');      
                var self = $(this);
                $.ajax({
                    url         : '/admin/don-hang/accept/' + idDonHang,
                    type        : 'get',
                    success     : function(res){
                        if(res.doitrangthai){
                            if(res.tinhtrang){
                                self.html("Hủy Duyệt");
                                self.removeClass('btn-success');
                                self.addClass('btn-danger');
                                toastr.success("Đơn Hàng đã được duyệt!!!");
                            } else{
                                self.html("Duyệt");
                                self.removeClass('btn-danger');
                                self.addClass('btn-success');
                             
                                toastr.success("Hủy duyệt đơn hàng thành công!!!");
                            }
                        } else{
                            toastr.error("Đơn hàng không tồn tại!!!");
                        }
                    }
                });
            });
        });
    </script>
@endsection