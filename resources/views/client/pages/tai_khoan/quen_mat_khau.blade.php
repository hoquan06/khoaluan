@extends('client.master')

@section('content')
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Quên mật khẩu</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Quên mật khẩu</li>
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
                                <h3>Quên mật khẩu</h3>
                            </div>
                            <form action='/' method="post" id="create">
                                <div class="form-group">
                                    <input type="email" id="email" required="" class="form-control" placeholder="Nhập email của bạn">
                                </div>
                                {{-- <div class="form-group">
                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display() !!}
                                </div> --}}
                                <div class="form-group">
                                    <button type="button" class="btn btn-fill-out btn-block resetPassword">Quên mật khẩu</button>
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
            $(".resetPassword").click(function(e){
                e.preventDefault();
                var payload = {
                    'email'         : $("#email").val(),
                }
                axios
                    .post('/khach-hang/quen-mat-khau', payload)
                    .then((res) => {
                        if(res.data.reset){
                            $("#email").val('');
                            toastr.success("Chúng tôi đã gửi mã xác nhận tới địa chỉ email của bạn!");
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
