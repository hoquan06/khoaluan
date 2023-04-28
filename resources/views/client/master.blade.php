<!DOCTYPE html>
<html lang="en">
<head>
    @include('client.shares.head')
</head>
<body>
    @include('client.shares.top')
    @yield('content')
    @include('client.shares.foot')
    <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
    @include('client.shares.bot')
    @yield('js')

    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#register").click(function(){
                var payload = {
                    'ho_va_ten'         : $("#ho_va_ten").val(),
                    'ngay_sinh'         : $("#ngay_sinh").val(),
                    'so_dien_thoai'     : $("#so_dien_thoai").val(),
                    'email'             : $("#email").val(),
                    'password'          : $("#password").val(),
                    're_password'       : $("#re_password").val(),
                    'dia_chi'           : $("#dia_chi").val(),
                    'agree'             : $("#agree").get(0).checked,
                };

                $.ajax({
                    url         : '/khach-hang/register',
                    type        : 'post',
                    data        : payload,
                    success     : function(res){
                        if(res.dangky){
                            toastr.success("Đã đăng ký thành công. Vui lòng kiểm tra email để kích hoạt tài khoản!!!");
                            setTimeout(function(){
                                $(location).attr('href','/khach-hang/login');
                            }, 3000);
                        }
                    },
                    error       : function(res){
                        var danh_sach_loi = res.responseJSON.errors;
                        $.each(danh_sach_loi, function(key, value){
                            toastr.error(value[0]);
                        });
                    }
                });
            });

            $("#login").click(function(e){
                e.preventDefault();
                var payload = {
                    'email'         : $("#email").val(),
                    'password'      : $("#password").val(),
                };
                $.ajax({
                    url             : '/khach-hang/login',
                    type            : 'post',
                    data            : payload,
                    success         : function(res){
                        if(res.login == 2){
                            toastr.success("Bạn đã đăng nhập thành công!!!");
                            setTimeout(() => {
                                // Kiểm tra nếu đang ở trang đăng nhập thì redirect về trang chủ
                                if(window.location.pathname == "/khach-hang/login"){
                                    window.location.href = "/";
                                }
                                else{
                                    // Nếu đang ở trang khác thì đứng im
                                    window.location.reload();
                                }
                            }, 1000);
                        } else if(res.login == 3){
                            toastr.warning("Tài khoản của bạn đã bị vô hiệu hóa!!!");
                            $("#password").val('');
                        } else if(res.login == 1){
                            toastr.warning("Bạn chưa xác thực mail, vui lòng kiểm tra lại!!!");
                        } else{
                            toastr.error("Sai tên đăng nhập hoặc mật khẩu, vui lòng kiểm tra lại!!!");
                            $("#password").val('');
                        }
                    },
                    error           : function(res){
                        var danh_sach_loi = res.responseJSON.errors;
                        $.each(danh_sach_loi, function(key, value){
                            toastr.error(value[0]);
                        });
                    }
                });
            });

            $(".addToCart").click(function(){
                var san_pham_id = $(this).data('id');
                var payload = {
                    'san_pham_id'       : san_pham_id,
                    'so_luong'          : 1,
                };

                $.ajax({
                    url             : '/khach-hang/gio-hang',
                    type            : 'post',
                    data            : payload,
                    success         : function(res){
                        if(res.giohang){
                            toastr.success("Đã thêm vào giỏ hàng!");
                        } else{
                            toastr.error("Vui lòng đăng nhập để sử dụng chức năng này!!!");
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

            $(".favourite").click(function(){
                var san_pham_id = $(this).data('id');
                var payload = {
                    'san_pham_id'   : san_pham_id,
                    'so_luong'      : 1
                };
                axios
                    .post('/khach-hang/yeu-thich', payload)
                    .then((res) => {
                        if(res.data.yeuthich == 1){
                            toastr.success("Đã xóa khỏi danh sách yêu thích!");
                        } else if(res.data.yeuthich == 2){
                            toastr.success("Đã thêm vào danh sách yêu thích!");
                        } else{
                            toastr.error("Vui lòng đăng nhập để sử dụng tính năng này!");
                        }
                    });
            });
        });
    </script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/643261d54247f20fefea9dfd/1gticsb7e';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>
</html>
