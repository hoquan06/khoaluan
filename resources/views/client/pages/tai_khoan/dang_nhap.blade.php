@extends('client.master')

@section('content')
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Đăng nhập</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Đăng nhập</li>
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
                                <h3>Đăng nhập</h3>
                            </div>
                            <form method="post" action=''>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" required="" class="form-control" placeholder="Nhập email đăng nhập">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="password" required="" type="password" id="password" placeholder="Mật khẩu">
                                </div>
                                <div class="form-group">
                                    <button id="login" type="submit" class="btn btn-fill-out btn-block">Đăng nhập</button>
                                </div>
                                <div class="different_login">
                                    <span> hoặc</span>
                                </div>
                                <ul class="btn-login list_none text-center">
                                    <li><a data-toggle="modal" data-target="#updateModal" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                                    <li><a data-toggle="modal" data-target="#updateModal" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                                </ul>
                                <div class="form-note text-center">Bạn chưa có tài khoản? <a href="/khach-hang/register">Đăng ký</a></div>
                                <div class="form-note text-center"><a href="/khach-hang/quen-mat-khau">Quên mật khẩu?</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
@section('js')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // $("#login").click(function(e){
            //     e.preventDefault();
            //     var payload = {
            //         'email'         : $("#email").val(),
            //         'password'      : $("#password").val(),
            //     };
            //     $.ajax({
            //         url             : '/khach-hang/login',
            //         type            : 'post',
            //         data            : payload,
            //         success         : function(res){
            //             if(res.login == 2){
            //                 toastr.success("Bạn đã đăng nhập thành công!!!");
            //                 setTimeout(() => {
            //                     $(location).attr('href', '/');
            //                 }, 2000);
            //             } else if(res.login == 1){
            //                 toastr.warning("Bạn chưa xác thực mail, vui lòng kiểm tra lại!!!");
            //             } else{
            //                 toastr.error("Sai tên đăng nhập hoặc mật khẩu, vui lòng kiểm tra lại!!!");
            //                 $("#password").val('');
            //             }
            //         },
            //         error           : function(res){
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
