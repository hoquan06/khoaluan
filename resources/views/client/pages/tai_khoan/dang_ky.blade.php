@extends('client.master')

@section('content')
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Đăng ký</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Đăng ký</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<div class="main_content">
    <div class="login_register_wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>Tạo tài khoản</h3>
                            </div>
                            <form method="post">
                                <div class="form-group">
                                    <input type="text" id="ho_va_ten" required="" class="form-control" placeholder="Nhập họ tên của bạn">
                                </div>
                                <div class="form-group">
                                    <input type="phone" id="so_dien_thoai" required="" class="form-control" placeholder="Nhập số điện thoại">
                                </div>
                                <div class="form-group">
                                    <input type="email" id="email" required="" class="form-control" placeholder="Nhập email của bạn">
                                </div>
                                <div class="form-group">
                                    <input type="date" id="ngay_sinh" required="" class="form-control" placeholder="Nhập ngày sinh của bạn">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required="" type="password" id="password" placeholder="Mật khẩu">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required="" type="password" id="re_password" placeholder="Nhập lại mật khẩu">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="dia_chi" required="" class="form-control" placeholder="Nhập địa chỉ của bạn">
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="agree" value="">
                                            <label class="form-check-label" for="agree"><span>Tôi đồng ý với <a href="/khach-hang/dieu-khoan-dich-vu">điều khoản & dịch vụ.</a></span></label><br/>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    {!! NoCaptcha::renderJs() !!}
		                            {!! NoCaptcha::display() !!}
                                </div> --}}
                                <div class="form-group">
                                    <button id="register" type="button" class="btn btn-fill-out btn-block">Đăng ký</button>
                                </div>
                                <div class="different_login">
                                    <span> hoặc</span>
                                </div>
                                <ul class="btn-login list_none text-center">
                                    <li><a data-toggle="modal" data-target="#updateModal" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                                    <li><a data-toggle="modal" data-target="#updateModal" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                                </ul>
                                <div class="form-note text-center">Bạn đã có tài khoản? <a href="/khach-hang/login">Đăng nhập</a></div>
                            </form>
                        </div>
                    </div>
                </div>
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

        // $("#register").click(function(){
        //     var payload = {
        //         'ho_va_ten'         : $("#ho_va_ten").val(),
        //         'ngay_sinh'         : $("#ngay_sinh").val(),
        //         'so_dien_thoai'     : $("#so_dien_thoai").val(),
        //         'email'             : $("#email").val(),
        //         'password'          : $("#password").val(),
        //         're_password'       : $("#re_password").val(),
        //         'dia_chi'           : $("#dia_chi").val(),
        //         'agree'             : $("#agree").get(0).checked,
        //     };
        //     console.log(payload);

        //     $.ajax({
        //         url         : '/khach-hang/register',
        //         type        : 'post',
        //         data        : payload,
        //         success     : function(res){
        //             if(res.dangky){
        //                 toastr.success("Đã đăng ký thành công. Vui lòng kiểm tra email để kích hoạt tài khoản!!!");
        //                 setTimeout(function(){
        //                     $(location).attr('href','/khach-hang/login');
        //                 }, 3000);
        //             }
        //         },
        //         error       : function(res){
        //             var danh_sach_loi = res.responseJSON.errors;
        //             $.each(danh_sach_loi, function(key, value){
        //                 toastr.error(value[0]);
        //             });
        //         }
        //     });
        // });
    });
</script>
@endsection
<div class="modal fade modal-danger text-left" id="updateModal" tabindex="-1" aria-labelledby="myModalLabel120" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="myModalLabel120">Tiếc quá</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Tính năng này đang được chúng tôi nâng cấp, vui lòng thử lại sau!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect waves-float waves-light" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
