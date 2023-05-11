@extends('admin.master')

@section('content')
<div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body text-center table-responsive"><h5 class="card-title">Danh Sách Giao Dịch</h5>
                <table class="mb-0 table table-bordered table-hover" id="tableDanhMuc">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tên Khách Hàng</th>
                            <th class="text-center">Mã Đơn Hàng</th>
                            <th class="text-center">Mã Giao Dịch</th>
                            <th class="text-center">Số Tiền</th>
                            <th class="text-center">Thời Gian Thanh Toán</th>
                            <th class="text-center">Trạng Thái</th>
                            <th class="text-center">Message</th>

                        </tr>
                    </thead>
                    <tbody class="text-nowrap text-center">
                        @foreach($donHang as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->ho_va_ten }}</td>
                                <td>{{ Str::length($value->ma_don_hang) > 14 ? Str::substr($value->ma_don_hang, 0, 14) . '...' :  $value->ma_don_hang}} </td>
                                <td>{{ $value->transId }}</td>
                                <td>{{ number_format($value->so_tien) }} VND</td>
                                <td>{{ $value->ngay_thanh_toan }}</td>
                                <td>
                                    @if ($value->trang_thai == 1)
                                        <button class="btn btn-success">Success</button>
                                    @else
                                        <button class="btn btn-danger">Error</button>
                                    @endif
                                </td>
                                <td>{{ $value->message }}</td>
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
                    url         : '/admin/don-hang/accept/' + idDonHang ,
                    type        : 'get',
                    success     : function(res){
                        if(res.doitrangthai == 0){
                            toastr.error('Đơn hàng đã bị hủy!');
                        } else if(res.doitrangthai == 1){
                            if(res.tinhtrang){
                                self.html("Đang giao");
                                self.removeClass('btn-info');
                                self.addClass('btn-primary');
                                toastr.success("Đơn hàng đã được duyệt!!!");
                            }
                        } else if(res.doitrangthai == 2){
                                self.html("Đã giao");
                                self.removeClass('btn-primary');
                                self.addClass('btn-success');
                                toastr.success("Đơn hàng đã được giao!!!");
                        } else{
                            toastr.warning("Đơn hàng đã được giao!");
                            // toastr.warning("Đơn hàng đã được giao!");
                        }
                    }
                });
            });
        });
    </script>
@endsection
