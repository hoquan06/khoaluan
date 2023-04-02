@extends('client.master')

@section('content')
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Chi tiết sản phẩm</h1>
                </div>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<div class="main_content">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                <div class="product-image">
                        <div class="product_img_box">
                            <img id="product_img" src='{{ $sanPham->hinh_anh }}' data-zoom-image="{{ $sanPham->hinh_anh }}" alt="product_img1" />
                            <a href="#" class="product_img_zoom" title="Zoom">
                                <span class="linearicons-zoom-in"></span>
                            </a>
                        </div>
                        <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                            <div class="item">
                                <a href="#" class="product_gallery_item active" data-image="{{ $sanPham->hinh_anh }}" data-zoom-image="{{ $sanPham->hinh_anh }}">
                                    <img src="{{ $sanPham->hinh_anh }}" alt="product_small_img1" />
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" class="product_gallery_item" data-image="{{ $sanPham->hinh_anh_2 }}" data-zoom-image="{{ $sanPham->hinh_anh_2 }}">
                                    <img src="{{ $sanPham->hinh_anh_2 }}" alt="product_small_img2" />
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" class="product_gallery_item" data-image="{{ $sanPham->hinh_anh_3 }}" data-zoom-image="{{ $sanPham->hinh_anh_3 }}">
                                    <img src="{{ $sanPham->hinh_anh_3 }}" alt="product_small_img3" />
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" class="product_gallery_item" data-image="{{ $sanPham->hinh_anh_4 }}" data-zoom-image="{{ $sanPham->hinh_anh_4 }}">
                                    <img src="{{ $sanPham->hinh_anh_4 }}" alt="product_small_img4" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="pr_detail">
                        <div class="product_description">
                            <h4 class="product_title"><a href="#">{{ $sanPham->ten_san_pham }}</a></h4>
                            <div class="product_price">
                                <span class="price">{{ number_format($sanPham->gia_khuyen_mai, 0) }}</span>
                                <del>{{ number_format($sanPham->gia_ban, 0) }}</del>
                                <div class="on_sale">
                                    <span>{{ number_format(($sanPham->gia_ban - $sanPham->gia_khuyen_mai) / $sanPham->gia_ban * 100) }}% Off</span>
                                </div>
                            </div>
                            <div class="rating_wrap">
                                    <div class="rating">
                                        <div class="product_rate" style="width:80%"></div>
                                    </div>
                                    <span class="rating_num">(21)</span>
                                </div>
                            <div class="pr_desc">
                                <p>{{ $sanPham->mo_ta_ngan }}</p>
                            </div>
                            <div class="product_sort_info">
                                <ul>
                                    <li><i class="linearicons-shield-check"></i> Bảo hành chính hãng trong vòng 1 năm</li>
                                    <li><i class="linearicons-sync"></i> Chính sách hoàn trả trong 30 ngày</li>
                                    <li><i class="linearicons-bag-dollar"></i> Thanh toán trực tiếp khi nhận hàng</li>
                                </ul>
                            </div>
                            <div class="pr_switch_wrap">
                                <span class="switch_lable">Màu sắc</span>
                                <div class="product_color_switch">
                                    <span class="active" data-color="#87554B"></span>
                                    <span data-color="#333333"></span>
                                    <span data-color="#DA323F"></span>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="cart_extra">
                            <div class="cart-product-quantity">
                                <div class="quantity">
                                    <input type="button" value="-" class="minus">
                                    <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                    <input type="button" value="+" class="plus">
                                </div>
                            </div>
                            <div class="cart_btn">
                                @if (Auth::guard('khach_hang')->check())
                                    <button class="btn btn-fill-out btn-addtocart addToCart" data-id="{{$sanPham->id}}" type="button"><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</button>
                                @else
                                    <button class="btn btn-fill-out btn-addtocart addToCart" data-toggle="modal" data-target="#myModal" type="button"><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</button>
                                @endif
                                <a class="add_compare" href="#"><i class="icon-shuffle"></i></a>
                                <a class="add_wishlist" href="#"><i class="icon-heart"></i></a>
                            </div>
                        </div>
                        <hr />

                        <div class="product_share">
                            <span>Share:</span>
                            <ul class="social_icons">
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="large_divider clearfix"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tab-style3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Mô tả chi tiết</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Đánh giá</a>
                            </li>
                        </ul>
                        <div class="tab-content shop_info_tab">
                            <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                                <p>{!! $sanPham->mo_ta_chi_tiet !!}</p>
                            </div>
                            <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                                <div class="comments">
                                    <h5 class="product_tab_title">Tất cả đánh giá</span></h5>
                                    <ul class="list_none comment_list mt-4">
                                        <li>
                                            <div class="comment_img">
                                                <img src="/assets_client/images/user1.jpg" alt="user1"/>
                                            </div>
                                            <div class="comment_block">
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:80%"></div>
                                                    </div>
                                                </div>
                                                <p class="customer_meta">
                                                    <span class="review_author">Alea Brooks</span>
                                                    <span class="comment-date">March 5, 2018</span>
                                                </p>
                                                <div class="description">
                                                    <p>Lorem Ipsumin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="review_form field_form">
                                    <h5>Thêm đánh giá</h5>
                                    <form class="row mt-3">
                                        <div class="form-group col-12">
                                            <div class="star_rating">
                                                <span data-value="1"><i class="far fa-star"></i></span>
                                                <span data-value="2"><i class="far fa-star"></i></span>
                                                <span data-value="3"><i class="far fa-star"></i></span>
                                                <span data-value="4"><i class="far fa-star"></i></span>
                                                <span data-value="5"><i class="far fa-star"></i></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <textarea required="required" placeholder="Nhập vào đây ..." class="form-control" name="message" rows="4"></textarea>
                                        </div>
                                        <div class="form-group col-12">
                                            <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Gửi</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="small_divider"></div>
                    <div class="divider"></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="heading_s1">
                        <h3>Sản phẩm liên quan</h3>
                    </div>
                    <div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                        @foreach ($spLienQuan as $key => $value)
                        <div class="item">
                            <div class="product">
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="{{$value->hinh_anh}}" alt="product_img1">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</a></li>
                                            <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.html">{{$value->ten_san_pham}}</a></h6>
                                    <div class="product_price">
                                        <span class="price">{{number_format($value->gia_khuyen_mai, 0)}}</span>
                                        <del>{{number_format($value->gia_ban, 0)}}</del>
                                        <div class="on_sale">
                                            <span>{{number_format(($value->gia_ban - $value->gia_khuyen_mai)/$value->gia_ban * 100, 0)}}% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:80%"></div>
                                        </div>
                                        <span class="rating_num">(21)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>{{$value->mo_ta_ngan}}</p>
                                    </div>
                                    <div class="pr_switch_wrap">
                                        <div class="product_color_switch">
                                            <span class="active" data-color="#87554B"></span>
                                            <span data-color="#333333"></span>
                                            <span data-color="#DA323F"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($key > 10)
                            @break
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
                Bạn phải đăng nhập để mua sản phẩm!!!
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
                <div class="form-note text-center">Bạn chưa có tài khoản? <a href="/agent/register">Đăng ký</a></div>
            </form>
        </div>
    </div>
</div>
</div>
@section('js')

@endsection
