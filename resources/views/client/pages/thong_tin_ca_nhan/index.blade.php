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
                            <div class="card-body">
                    			<div class="table-responsive">
                                    <table class="table text-nowrap text-center">
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
                                            @foreach ($data as $key=>$value)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{Carbon\Carbon::parse($value->created_at)-> format('H:i:s d-m-y')}}</td>
                                                    <td>{{$value->tinh_trang}}</td>
                                                    <td>{{$value->thuc_tra}}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-fill-out btn-sm">Xem</a>
                                                        <a href="#" class="btn btn-fill-out btn-sm">Hủy</a>
                                                    </td>
                                                </tr>
                                            @endforeach
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
                                    <table class="table text-nowrap text-center">
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
                                            <tr>
                                                <td>#1234</td>
                                                <td>March 15, 2020</td>
                                                <td>Processing</td>
                                                <td>$78.00 for 1 item</td>
                                                <td>
                                                    <a href="#" class="btn btn-fill-out btn-sm">Xem</a>
                                                    <a href="#" class="btn btn-fill-out btn-sm">Hủy</a>
                                                </td>
                                            </tr>
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
                                <form method="post">
                                    <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Mật Khẩu Cũ<span class="required">*</span></label>
                                                <input required="" id="ho_va_ten" class="form-control" placeholder="Nhập vào mật khẩu cũ" type="text">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Mật Khẩu Mới<span class="required">*</span></label>
                                                <input required="" id="ho_va_ten" class="form-control" placeholder="Nhập vào mật khẩu mới" type="text">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Xác Nhận Mật Khẩu<span class="required">*</span></label>
                                                <input required="" id="ho_va_ten" class="form-control"  type="text">
                                            </div>
                                            <div class="col-md-12">
                                            <button type="button"  id="update" class="btn btn-fill-out edit"  data-toggle="modal" data-target="#deleteModal" >Thay Đổi</button>
                                            </div>
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
@section('js')
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
    });
</script>
@endsection
