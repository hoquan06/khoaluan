@extends('admin.master')
@section('content')
<div class="col-md-12">
    <div class="main-card mb-3 card">
        <div class="card-body text-center table-responsive"><h5 class="card-title">Danh Sách Đơn Hàng Giao Thất Bại</h5>
            <table class="mb-0 table table-bordered table-hover" id="tableDonHang">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Tên Khách Hàng</th>
                        <th class="text-center">Mã Đơn Hàng</th>
                        <th class="text-center">Địa Chỉ Giao Hàng</th>
                        <th class="text-center">Giá Trị Đơn Hàng</th>
                        <th class="text-center">Loại Thanh Toán</th>
                        <th class="text-center">Tình Trạng</th>
                        <th class="text-center">Thao Tác</th>

                    </tr>
                </thead>
                <tbody class="text-nowrap text-center">

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

        function loadTable(){
            $.ajax({
                url             : '/admin/don-hang/that-bai/getDataGiaoThatBai',
                type            : 'get',
                success         : function(res){
                    var noiDung = '';
                    $.each(res.status, function(key, value){
                        var loaiThanhToan = '';
                        if(value.loai_thanh_toan == 0) {
                            loaiThanhToan = '<td>Thanh toán khi nhận hàng</td>';
                        } else {
                            loaiThanhToan = '<td>Chuyển khoản</td>';
                        }

                        var tinhTrang = '';
                        if(value.tinh_trang == 3) {
                            tinhTrang = '<td> Giao không thành công </td>';
                        }
                        noiDung += '<tr>';
                        noiDung += '<td>' + (key + 1) + '</td>';
                        noiDung += '<td>' + value.ho_va_ten + '</td>';
                        noiDung += '<td>' + value.ma_don_hang + '</td>';
                        noiDung += '<td>' + value.dia_chi_giao_hang + '</td>';
                        noiDung += '<td>' + (value.thuc_tra) + ' VND</td>';
                        noiDung +=  loaiThanhToan;
                        noiDung +=  tinhTrang;
                        noiDung += '<td>';
                        noiDung += '<a href="/admin/don-hang/view/' + value.id  + '" class="btn btn-info me-1">Xem</a>';
                        noiDung += '<button class="btn btn-danger delete me-1" data-iddelete="'+ value.id +'"  data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>';
                        noiDung += '</td>';
                        noiDung += '</tr>';
                    });
                    $("#tableDonHang tbody").html(noiDung);
                },
            });
        }
        loadTable();

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
                    if(res.xoa == 0){
                        toastr.error(res.message)
                    } else if(res.xoa == 1){
                        toastr.success("Xóa đơn hàng thành công!!!");
                        row.remove();
                    } else{
                        toastr.error("Đơn hàng không tồn tại!!!");
                    }
                },
            });
        });
    });
</script>
@endsection
