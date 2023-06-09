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
                                <a href="" class="product_gallery_item active" data-image="{{ $sanPham->hinh_anh }}" data-zoom-image="{{ $sanPham->hinh_anh }}">
                                    <img src="{{ $sanPham->hinh_anh }}" alt="product_small_img1" />
                                </a>
                            </div>
                            <div class="item">
                                <a href="" class="product_gallery_item" data-image="{{ $sanPham->hinh_anh_2 }}" data-zoom-image="{{ $sanPham->hinh_anh_2 }}">
                                    <img src="{{ $sanPham->hinh_anh_2 }}" alt="product_small_img2" />
                                </a>
                            </div>
                            <div class="item">
                                <a href="" class="product_gallery_item" data-image="{{ $sanPham->hinh_anh_3 }}" data-zoom-image="{{ $sanPham->hinh_anh_3 }}">
                                    <img src="{{ $sanPham->hinh_anh_3 }}" alt="product_small_img3" />
                                </a>
                            </div>
                            <div class="item">
                                <a href="" class="product_gallery_item" data-image="{{ $sanPham->hinh_anh_4 }}" data-zoom-image="{{ $sanPham->hinh_anh_4 }}">
                                    <img src="{{ $sanPham->hinh_anh_4 }}" alt="product_small_img4" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="pr_detail">
                        <div class="product_description">
                            <h4 class="product_title"><a >{{ $sanPham->ten_san_pham }}</a></h4>
                            <div class="product_price">
                                <span class="price">{{ number_format($sanPham->gia_khuyen_mai ? $sanPham->gia_khuyen_mai : $sanPham->gia_ban, 0) }} đ</span>
                                @if($sanPham->gia_khuyen_mai)
                                    <del>{{ number_format($sanPham->gia_ban, 0) }} đ</del>
                                @endif
                            </div>
                            <div class="rating_wrap">
                                    <div class="rating">
                                        <div class="product" style="width:80%"></div>
                                    </div>
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
                            <!-- <div class="pr_switch_wrap">
                                <span class="switch_lable">Màu sắc</span>
                                <div class="product_color_switch">
                                    <span class="active" data-color="#87554B"></span>
                                    <span data-color="#333333"></span>
                                    <span data-color="#DA323F"></span>
                                </div>
                            </div> -->
                        </div>
                        <hr />
                        <div class="cart_extra">
                            <div class="cart-product-quantity">
                                <div class="quantity">
                                    <input type="button" value="-" class="minus">
                                    <input type="text" name="quantity" value="1" id="soluong" title="Qty" class="qty" size="4">
                                    <input type="button" value="+" class="plus">
                                </div>
                            </div>
                            <div class="cart_btn">
                                @if (Auth::guard('khach_hang')->check())
                                    <button class="btn btn-fill-out btn-addtocart detail_addToCart" data-id="{{$sanPham->id}}" type="button"><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</button>
                                @else
                                    <button class="btn btn-fill-out btn-addtocart addToCart" data-toggle="modal" data-target="#myModal" type="button"><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</button>
                                @endif
                                @if (Auth::guard('khach_hang')->check())
                                    <a data-id="{{$sanPham->id}}" class="add_wishlist favourite"><i class="icon-heart"></i></a>
                                @else
                                    <a data-id="{{$sanPham->id}}" data-toggle="modal" data-target="#myModal" class="add_wishlist favourite"><i class="icon-heart"></i></a>
                                @endif
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
                                <a class="nav-link getIDSanPham" data-id="{{ $sanPham->id }}" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Đánh giá</a>
                            </li>
                            <input type="text" id="idSp" hidden>
                        </ul>
                        <div class="tab-content shop_info_tab">
                            <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                                <p>{!! $sanPham->mo_ta_chi_tiet !!}</p>
                            </div>
                            <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                                <div class="comments" id="dsDanhGia">
                                    <h5 class="product_tab_title">Tất cả đánh giá</span></h5>

                                </div>
                                <div class="review_form field_form">
                                    <h5>Thêm đánh giá</h5>
                                    <form class="row mt-3" id="tableReset">
                                        <div class="form-group col-12">
                                            <div class="star_rating getStar">
                                                <span data-value="1"><i class="far fa-star"></i></span>
                                                <span data-value="2"><i class="far fa-star"></i></span>
                                                <span data-value="3"><i class="far fa-star"></i></span>
                                                <span data-value="4"><i class="far fa-star"></i></span>
                                                <span data-value="5"><i class="far fa-star"></i></span>
                                            </div>
                                            <input type="text" id="soSaoChon" hidden>
                                        </div>
                                        <div class="form-group col-12">
                                            <textarea required="required" placeholder="Nhập vào đây ..." class="form-control" id="noi_dung" rows="4"></textarea>
                                        </div>
                                        <div class="form-group col-12">
                                            <button data-id="{{$sanPham->id}}" type="button" class="btn btn-fill-out themDanhGia getIDSanPham">Đánh giá</button>
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
                                    <a href="/san-pham/{{$value->slug_san_pham}}-post{{$value->id}}">
                                        <img src="{{$value->hinh_anh}}" alt="product_img1">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            @if (Auth::guard('khach_hang')->check())
                                                <li class="add-to-cart addToCart" data-id="{{$value->id}}"><a><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</a></li>
                                            @else
                                                <li class="add-to-cart addToCart" data-toggle="modal" data-target="#myModal"><a><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</a></li>
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
                                        <span class="price">{{number_format($value->gia_khuyen_mai ? $value->gia_khuyen_mai : $value->gia_ban, 0)}} đ</span>
                                        @if ($value->gia_khuyen_mai)
                                            <del>{{number_format($value->gia_ban, 0)}} đ</del>
                                        @endif
                                        {{-- <div class="on_sale">
                                            <span>{{number_format(($value->gia_ban - $value->gia_khuyen_mai)/$value->gia_ban * 100, 0)}}%</span>
                                        </div> --}}
                                    </div>
                                    {{-- <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product" style="width:80%"></div>
                                        </div>
                                    </div> --}}
                                    <div class="pr_desc">
                                        <p>{{$value->mo_ta_ngan}}</p>
                                    </div>
                                    <!-- <div class="pr_switch_wrap">
                                        <div class="product_color_switch">
                                            <span class="active" data-color="#87554B"></span>
                                            <span data-color="#333333"></span>
                                            <span data-color="#DA323F"></span>
                                        </div>
                                    </div> -->
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
                    Mời bạn đăng nhập để sử dụng tính năng này!
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
                        <li><a data-toggle="modal" data-target="#updateModal" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                        <li><a data-toggle="modal" data-target="#updateModal" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                    </ul>
                    <div class="form-note text-center">Bạn chưa có tài khoản? <a href="/khach-hang/register">Đăng ký</a></div>
                </form>
            </div>
        </div>
    </div>
</div>
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
            $(".detail_addToCart").click(function(){
                var san_pham_id = $(this).data('id');
                var so_luong = $("#soluong").val();
                var payload = {
                    'san_pham_id'       : san_pham_id,
                    'so_luong'          : so_luong,
                };

                $.ajax({
                    url             : '/khach-hang/gio-hang',
                    type            : 'post',
                    data            : payload,
                    success         : function(res){
                        if(res.giohang){
                            toastr.success("Đã thêm vào giỏ hàng!");
                        } else{
                            toastr.error("Mời bạn đăng nhập để sử dụng tính năng này!");
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

            $('.getStar span').click(function() {
                var starValue = $(this).data('value');
                $("#soSaoChon").val(starValue);
            });

            $(".themDanhGia").click(function() {
                var san_pham_id = $(this).data('id');
                var payload = {
                    'so_sao'            : $("#soSaoChon").val(),
                    'noi_dung'          : $("#noi_dung").val(),
                    'san_pham_id'       : san_pham_id,
                };

                axios
                    .post('/khach-hang/danh-gia', payload)
                    .then((res) => {
                        if(res.data.themDanhGia == 1){
                            toastr.success("Đã thêm mới đánh giá!");
                            // Reset số sao
                            $(".getStar span").removeClass("selected");
                            $("#soSaoChon").val("");
                            //Reset nội dung
                            $("#tableReset").trigger('reset');
                        } else if(res.data.themDanhGia == 2){
                            toastr.warning("Bạn hãy mua hàng trước khi thực hiện tính năng này!");
                        } else {
                            toastr.error("Bạn chưa đăng nhập!");
                        }
                    })
                    .catch((res) => {
                        var danh_sach_loi = res.response.data.errors;
                        $.each(danh_sach_loi, function(key, value){
                            toastr.error(value[0]);
                        });
                    });
            });

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
            $(".getIDSanPham").click(function(e){
                e.preventDefault();
                var id = $(this).data("id");
                $("#idSp").val(id);
                loadTable();
            });

            function loadTable()
            {
                var id = $("#idSp").val();
                $.ajax({
                    url             : '/khach-hang/danh-gia/data/' + id,
                    type            : 'get',
                    success         : function(res){
                        var noiDung = '';
                        $.each(res.list, function(key, value){
                            var soSao = '';
                            if(value.so_sao == 1){
                                soSao = '<div class="product_rate" style="width:20%"></div>';
                            } else if(value.so_sao == 2){
                                soSao = '<div class="product_rate" style="width:40%"></div>';
                            } else if(value.so_sao == 3){
                                soSao = '<div class="product_rate" style="width:60%"></div>';
                            } else if(value.so_sao == 4){
                                soSao = '<div class="product_rate" style="width:80%"></div>';
                            } else{
                                soSao = '<div class="product_rate" style="width:100%"></div>';
                            }
                            noiDung += '<li>';
                            noiDung += '<div class="comment_block">';
                            noiDung += '<div class="rating_wrap">';
                            noiDung += '<div class="rating">';
                            noiDung += soSao;
                            noiDung += '</div>';
                            noiDung += '</div>';
                            noiDung += '<p class="customer_meta">';
                            noiDung += '<span class="review_author">' + value.ho_va_ten + '</span>';
                            noiDung += '<span class="comment-date">' + GetNow(value.created_at) + '</span>';
                            noiDung += '</p>';
                            noiDung += '<div class="description">';
                            noiDung += '<p>' + value.noi_dung + '</p>';
                            noiDung += '</div>';
                            noiDung += '</div>';
                            noiDung += '</li>';
                        });
                        $("#dsDanhGia").html('<ul class="list_none comment_list mt-4">' + noiDung + '</ul>');
                    }
                });
            }
            loadTable();
        });
   </script>
@endsection
