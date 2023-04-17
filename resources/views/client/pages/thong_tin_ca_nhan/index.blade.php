@extends('client.master')

@section('content')
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Thông Tin Cá Nhân</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Khách Hàng</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<div class="section" id="app">
	<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="dashboard_menu">
                    <ul class="nav nav-tabs flex-column" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>Quản lý</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Đơn hàng</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders_cancel" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Đơn hàng đã hủy</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="account-detail-tab" data-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>Tài khoản</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="account-detail-tab" data-toggle="tab" href="#change-password" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fa fa-key" aria-hidden="true"></i> Mật khẩu</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/khach-hang/logout"><i class="ti-lock"></i>Đăng xuất</a>
                      </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="tab-content dashboard_content">
                  	<div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                    	<div class="card">
                        	<div class="card-header">
                            </div>
                            <div class="card-body">
                            <p>Từ trang tổng quan tài khoản của bạn. Bạn có thể dễ dàng kiểm tra &amp; và xem <a href="javascript:void(0);" onclick="$('#orders-tab').trigger('click')">các đơn đặt hàng gần đây</a>, quản lý <a href="javascript:void(0);" onclick="$('#address-tab').trigger('click')">địa chỉ giao hàng và thanh toán</a> <a href="javascript:void(0);" onclick="$('#account-detail-tab').trigger('click')">cũng như chỉnh sửa mật khẩu và chi tiết tài khoản của mình.</a></p>

                            </div>
                        </div>
                  	</div>
                  	<div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>Đơn hàng khả dụng</h3>
                            </div>
                            <div class="card-body" id="tableDonHang">
                    			<div class="table-responsive">
                                    <table class="table text-nowrap text-center">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Ngày đặt</th>
                                                <th>Tình trạng</th>
                                                <th>Thực trả</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- <template v-for='(value, key) in list'>
                                                <tr>
                                                    <td>@{{key + 1}}</td>
                                                    <td>@{{ GetNow(value.created_at) }}</td>
                                                    <td v-if="tinh_trang == 0">Chờ xác nhận</td>
                                                    <td v-else-if="tinh_trang == 1">Đang chuẩn bị hàng</td>
                                                    <td>@{{numberFormat(value.thuc_tra)}}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-fill-out btn-sm">Xem</a>
                                                        <a href="#" class="btn btn-fill-out btn-sm">Hủy</a>
                                                    </td>
                                                </tr>
                                            </template> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                  	</div>
                    <div class="tab-pane fade" id="orders_cancel" role="tabpanel" aria-labelledby="orders-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>Đơn hàng đã hủy</h3>
                            </div>
                            <div class="card-body">
                    			<div class="table-responsive">
                                    <table class="table text-nowrap text-center" id="tableDonHuy">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Ngày đặt</th>
                                                <th>Tình trạng</th>
                                                <th>Tổng tiền</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- <tr>
                                                <td>#1234</td>
                                                <td>March 15, 2020</td>
                                                <td>Processing</td>
                                                <td>$78.00 for 1 item</td>
                                                <td>
                                                    <a href="#" class="btn btn-fill-out btn-sm">Xem</a>
                                                </td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                  	</div>
                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
						<div class="card">
                        	<div class="card-header">
                                <h3>Chỉnh Sửa Thông Tin Tài Khoản</h3>
                            </div>
                            <div class="card-body">
                    			<!-- <p>Already have an account? <a href="#">Log in instead!</a></p> -->
                                <form method="post">
                                    <div class="row">
                                        @if(Auth::guard('khach_hang')->check())
                                            <div class="form-group col-md-6">
                                                <label>Họ và tên<span class="required">*</span></label>
                                                <input required="" id="ho_va_ten" class="form-control" value = "{{Auth::guard('khach_hang')->user()->ho_va_ten}}"  type="text">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Ngày sinh<span class="required">*</span></label>
                                                <input required="" id="ngay_sinh"  class="form-control" value = "{{Auth::guard('khach_hang')->user()->ngay_sinh}}"  type="date">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Số điện thoại<span class="required">*</span></label>
                                                <input required=""  id="so_dien_thoai" class="form-control" value = "{{Auth::guard('khach_hang')->user()->so_dien_thoai}}" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Email <span class="required">*</span></label>
                                                <input required=""  id="email" class="form-control" value = "{{Auth::guard('khach_hang')->user()->email}}" type="email">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Địa chỉ<span class="required">*</span></label>
                                                <input required=""  id="dia_chi" class="form-control" value = "{{Auth::guard('khach_hang')->user()->dia_chi}}"  type="text">
                                            </div>
                                            <div class="col-md-12">
                                                <button type="button"  data-id = "{{Auth::guard('khach_hang')->user()->id }}" id="update" class="btn btn-fill-out edit"  data-toggle="modal" data-target="#deleteModal" >Cập Nhật</button>
                                            </div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
					</div>
                    <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="account-detail-tab">
						<div class="card">
                        	<div class="card-header">
                                <h3>Thay Đổi Mật Khẩu</h3>
                            </div>
                            <div class="card-body">
                    			<!-- <p>Already have an account? <a href="#">Log in instead!</a></p> -->
                                <form method="post" action="">
                                    {{-- <div class="form-group col-md-6">
                                        <label>Mật Khẩu Cũ<span class="required">*</span></label>
                                        <input required="" id="password" class="form-control" placeholder="Nhập vào mật khẩu cũ" type="text">
                                    </div> --}}
                                    <div class="form-group">
                                        <label>Mật Khẩu Mới<span class="required">*</span></label>
                                        <input required="" id="password" class="form-control" placeholder="Nhập vào mật khẩu mới" type="password">
                                    </div>
                                    <div class="form-group">
                                        <label>Xác Nhận Mật Khẩu<span class="required">*</span></label>
                                        <input required="" id="re_password" class="form-control" placeholder="Xác nhận mật khẩu" type="password">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-fill-out changePassword">Thay Đổi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- <div class="section bg_default small_pt small_pb">
	<div class="container">
    	<div class="row align-items-center">
            <div class="col-md-6">
                <div class="heading_s1 mb-md-0 heading_light">
                    <h3>Đăng ký để trở thành hội viên</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="newsletter_form">
                    <form>
                        <input type="text" required="" class="form-control rounded-0" placeholder="Nhập vào email của bạn">
                        <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Hủy đơn hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc muốn hủy đơn hàng này không? Điều này không thể hoàn tác!
                    <input type="text" class="form-control" placeholder="Nhập vào id cần xóa" id="idDelete" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button class="btn btn-danger delete" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Hủy đơn hàng</button>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js" ></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('body').on('click', '.edit', function(){
            var id = $(this).data('id');

            $.ajax({
                url         : '/khach-hang/edit/' + id,
                type        : 'get',
                success     : function(res){
                    if(res.edit){
                        $("#ho_va_ten").val(res.data.ho_va_ten);
                        $("#ngay_sinh").val(res.data.ngay_sinh);
                        $("#so_dien_thoai").val(res.data.so_dien_thoai);
                        $("#email").val(res.data.email);
                        $("#dia_chi").val(res.data.dia_chi);
                    } else{
                        toastr.error("Tài khoản không tồn tại!!!");
                        setTimeout(function() {
                            $("#close").click();
                        }, 800);
                    }
                },
            });
        });

        $("#update").click(function(){
            var payload = {
                'ho_va_ten'              : $("#ho_va_ten").val(),
                'ngay_sinh'              : $("#ngay_sinh").val(),
                'so_dien_thoai'          : $("#so_dien_thoai").val(),
                'email'                  : $("#email").val(),
                'dia_chi'                : $("#dia_chi").val(),
            };

            $.ajax({
                url             : '/khach-hang/update/',
                type            : 'post',
                data            : payload,
                success         : function(res){
                    if(res.update){
                        toastr.success("Cập nhật thành công!!!");
                    } else{
                        toastr.error("Tài khoản không tồn tại!!!");
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
                url             : '/khach-hang/don-hang/data',
                type            : 'get',
                success         : function(res){
                    var noiDung = '';
                    $.each(res.donhang, function(key, value){
                        var tinhTrang = '';
                        if(value.tinh_trang == 0){
                            tinhTrang = 'Chờ xác nhận';
                        } else if(value.tinh_trang == 1){
                            tinhTrang = 'Đang giao';
                        } else{
                            tinhTrang = 'Đã nhận hàng';
                        }
                        noiDung += '<tr>',
                        noiDung += '<td>' + (key + 1) + '</td>';
                        noiDung += '<td>' + GetNow(value.created_at) + '</td>';
                        noiDung += '<td>' + tinhTrang + '</td>';
                        noiDung += '<td>' + numberFormat(value.thuc_tra) + '</td>';
                        noiDung += '<td>';
                        noiDung += '<a href="/khach-hang/don-hang/chi-tiet/' + value.id + '" class="btn btn-fill-out btn-sm">Xem</a>';
                        noiDung += '<a data-id="' + value.id + '" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" class="btn btn-fill-out btn-sm cancelOrder">Hủy</a>';
                        noiDung += '</td>';
                        noiDung += '</tr>';
                    });

                    var noiDungHuy = '';
                    $.each(res.donhuy, function(key, value){
                        if(value.tinh_trang == -1){
                            var tinhTrang = 'Đã hủy';
                        }
                        noiDungHuy += '<tr>';
                        noiDungHuy += '<td>' + (key+1) + '</td>';
                        noiDungHuy += '<td>' + GetNow(value.created_at) + '</td>';
                        noiDungHuy += '<td>' + tinhTrang + '</td>';
                        noiDungHuy += '<td>' + numberFormat(value.thuc_tra) + '</td>';
                        noiDungHuy += '<td>';
                        noiDungHuy += '<a href="/khach-hang/don-hang/chi-tiet/' + value.id + '" class="btn btn-fill-out btn-sm">Xem</a>';
                        noiDungHuy += '</td>';
                        noiDungHuy += '</tr>';
                    });
                    $("#tableDonHang tbody").html(noiDung);
                    $("#tableDonHuy tbody").html(noiDungHuy);
                }
            });
        };
        loadTable();

        function GetNow(){
            var currentdate = new Date();
            var datetime = currentdate.getDate() + "-"
                    + (currentdate.getMonth()+1)  + "-"
                    + currentdate.getFullYear();
                    // + currentdate.getHours() + ":"
                    // + currentdate.getMinutes() + ":"
                    // + currentdate.getSeconds();
            return datetime;
        };
        function numberFormat(number){
            return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number);
        };

        $('body').on('click', '.cancelOrder', function(){
            var idcancel = $(this).data('id');
            $("#idDelete").val(idcancel);
        });

        $(".delete").click(function(){
            var id = $("#idDelete").val();
            axios
                .get('/khach-hang/don-hang/huy/' + id)
                .then((res) => {
                    if(res.data.huy == 1){
                        toastr.success("Hủy đơn hàng thành công!");
                        loadTable();
                    } else if(res.data.huy == 2){
                        toastr.warning("Hủy không thành công do đơn hàng đang được vận chuyển!");
                    } else{
                        toastr.error("Đơn hàng không tồn tại!");
                    }
                })
        });

        $(".changePassword").click(function(){
            var payload = {
                'password'          : $("#password").val(),
                're_password'       : $("#re_password").val(),
            }
            axios
                .post('/khach-hang/thay-doi-mat-khau', payload)
                .then((res) => {
                    if(res.data.doimatkhau){
                        toastr.success("Đã thay đổi mật khẩu thành công!");
                        $("#password").val('');
                        $("#re_password").val('');
                    } else{
                        toastr.error("Đã xảy ra lỗi!");
                    }
                })
                .catch((res) => {
                    var danh_sach_loi = res.response.data.errors;
                    $.each(danh_sach_loi, function(key, value){
                        toastr.error([value[0]]);
                    });
                });
        });
    });
    // var app = new Vue({
    //     el          : '#app',
    //     data        : {
    //         list    : [],
    //         tinh_trang: this.list,
    //     },

    //     created(){
    //         this.loadTable();
    //     },
    //     methods: {
    //         loadTable(){
    //             axios
    //                 .get('/khach-hang/don-hang/data')
    //                 .then((res) => {
    //                     this.list = res.data.donhang;
    //                 })
    //         },
    //         GetNow(){
    //             var currentdate = new Date();
    //             var datetime = currentdate.getDate() + "-"
    //                     + (currentdate.getMonth()+1)  + "-"
    //                     + currentdate.getFullYear();
    //                     // + currentdate.getHours() + ":"
    //                     // + currentdate.getMinutes() + ":"
    //                     // + currentdate.getSeconds();
    //             return datetime;
    //         },
    //         numberFormat(number){
    //             return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number);
    //         },
    //     }
    // });
</script>
@endsection
