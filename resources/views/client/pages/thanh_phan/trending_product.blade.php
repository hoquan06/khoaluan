<div class="section small_pt small_pb">
    <div class="custom-container">
        <div class="row">
            <div class="col-xl-3 d-none d-xl-block">
                <div class="sale-banner">
                    <a class="hover_effect1" href="#">
                        <img src="\photos\shares\others\2.png" alt="shop_banner_img10">
                    </a>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="row">
                    <div class="col-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <h4>Sản phẩm thịnh hành</h4>
                            </div>
                            <div class="view_all">
                                <a href="/san-pham-thinh-hanh" class="text_default"><i class="linearicons-power"></i> <span>Xem tất cả</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                            @foreach ($spThinhHanh as $key => $value)
                                <div class="item">
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="/san-pham/{{$value->slug_san_pham}}-post{{$value->id}}">
                                                <img src="{{$value->hinh_anh}}" alt="el_img2">
                                                <img class="product_hover_img" src="{{$value->hinh_anh_2}}" alt="el_hover_img2">
                                            </a>
                                            <div class="product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    @if (Auth::guard('khach_hang')->check())
                                                        <li class="add-to-cart addToCart" data-id="{{$value->id}}"><a ><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</a></li>
                                                    @else
                                                        <li class="add-to-cart" data-toggle="modal" data-target="#myModal"><a ><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</a></li>
                                                    @endif
                                                    @if (Auth::guard('khach_hang')->check())
                                                        <li><a><i data-id="{{$value->id}}" class="icon-heart favourite"></i></a></li>
                                                    @else
                                                        <li><a><i data-id="{{$value->id}}" data-toggle="modal" data-target="#myModal" class="icon-heart favourite"></i></a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="/san-pham/{{$value->slug_san_pham}}-post{{$value->id}}">{{$value->ten_san_pham}}</a></h6>
                                            <div class="product_price text-center">
                                                <span class="price">{{ number_format($value->gia_khuyen_mai ? $value->gia_khuyen_mai : $value->gia_ban, 0) }} đ</span>
                                                @if($value->gia_khuyen_mai)
                                                    <del>{{number_format($value->gia_ban, 0)}} đ</del>
                                                @endif
                                            </div>
                                            <div class="pr_desc">
                                                <p>{{$value->mo_ta_ngan}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($key > 8)
                                    @break
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" >
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="alert alert-success text-center" role="alert">
                    Bạn phải đăng nhập để sử dụng tính năng này!!!
                </div>
                <form method="post">
                    <div class="form-group">
                        <input type="email" id="email" required="" class="form-control" placeholder="Nhập Email Của Bạn">
                    </div>
                    <div class="form-group">
                        <input class="form-control" required="" type="password" id="password" placeholder="Mật Khẩu">
                    </div>
                    <div class="form-group">
                        <button id="login" type="button" class="btn btn-fill-out btn-block">Đăng nhập</button>
                    </div>
                    <div class="different_login">
                        <span> hoặc</span>
                    </div>
                    <ul class="btn-login list_none text-center">
                        <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                        <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                    </ul>
                    <div class="form-note text-center">Bạn chưa có tài khoản? <a href="/khach-hang/register">Đăng ký</a></div>
                </form>
            </div>
        </div>
    </div>
</div>
