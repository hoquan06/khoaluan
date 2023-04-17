@extends('client.master')

@section('content')
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Cập nhật mật khẩu</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Cập nhật mật khẩu</li>
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
                                <h3>Cập nhật mật khẩu</h3>
                            </div>
                            <form method="post" action=''>
                                <div class="form-group">
                                    <input id="hash_reset" type="" value="{{$hash_reset}}" hidden>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="password" required="" type="password" id="password" placeholder="Nhập mật khẩu mới">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="re_password" required="" type="password" id="re_password" placeholder="Xác nhận mật khẩu">
                                </div>
                                {{-- <div class="form-group">
                                    {!! NoCaptcha::renderJs() !!}
		                            {!! NoCaptcha::display() !!}
                                </div> --}}
                                <div class="form-group">
                                    <button type="button" class="btn btn-fill-out btn-block updatePassword">Cập nhật mật khẩu</button>
                                </div>
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
            $(".updatePassword").click(function(){
                var payload = {
                    'hash_reset'            : $("#hash_reset").val(),
                    'password'              : $("#password").val(),
                    're_password'           : $("#re_password").val(),
                };

                axios
                    .post('/khach-hang/cap-nhat-mat-khau', payload)
                    .then((res) => {
                        if(res.data.changepass){
                            toastr.success("Đã cập nhật mật khẩu thành công!");
                            setTimeout(function() {
                                $(location).attr('href','/khach-hang/login');
                            }, 800);
                        }
                    })
                    .catch((res) => {
                        var danh_sach_loi = res.response.data.errors;
                        $.each(danh_sach_loi, function(key, value){
                            toastr.error(value[0]);
                        });
                    });
            });
        });
    </script>
@endsection
