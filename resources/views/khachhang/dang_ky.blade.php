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
                                    <input type="text" id="ho_va_ten" required="" class="form-control" placeholder="Nhập Họ Tên Của Bạn">
                                </div>
                                <div class="form-group">
                                    <input type="phone" id="so_dien_thoai" required="" class="form-control" placeholder="Nhập Số Điện Thoại">
                                </div>
                                <div class="form-group">
                                    <input type="email" id="email" required="" class="form-control" placeholder="Nhập Email Của Bạn">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required="" type="password" id="password" placeholder="Mật Khẩu">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required="" type="password" id="re_password" placeholder="Nhập Lại Mật Khẩu">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="dia_chi" required="" class="form-control" placeholder="Nhập Địa Chỉ Của Bạn">
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="agree" value="">
                                            <label class="form-check-label" for="agree"><span>Tôi đồng ý với <a href="">điều khoản & dịch vụ.</a></span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button id="register" type="button" class="btn btn-fill-out btn-block">Đăng ký</button>
                                </div>
                                <div class="different_login">
                                    <span> hoặc</span>
                                </div>
                                <ul class="btn-login list_none text-center">
                                    <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                                    <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                                </ul>
                                <div class="form-note text-center">Bạn đã có tài khoản? <a href="/agent/login">Đăng nhập</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
