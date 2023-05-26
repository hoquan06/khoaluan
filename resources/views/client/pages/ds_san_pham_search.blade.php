@extends('client.master')

@section('content')
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Danh sách sản phẩm</h1>
                </div>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<div class="main_content">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row align-items-center mb-4 pb-1">
                        <div class="col-12">
                            <div class="product_header">
                                <div class="product_header_left">
                                    <div class="custom_select">
                                        <select id="sort-select" class="form-control form-control-sm">
                                            <option value="order">Mặc định</option>
                                            <option value="price">Giá: Từ thấp đến cao</option>
                                            <option value="price-desc">Giá: Từ cao xuống thấp</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="product_header_right">
                                    <div class="products_view">
                                        <a href="javascript:Void(0);" class="shorting_icon grid active"><i class="ti-view-grid"></i></a>
                                        <a href="javascript:Void(0);" class="shorting_icon list "><i class="ti-layout-list-thumb"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row shop_container grid">
                        @foreach ($danhSach as $key => $value)
                            <div class="col-lg-3 col-md-4 col-6" data-price="{{ $value->gia_khuyen_mai ? $value->gia_khuyen_mai : $value->gia_ban }}">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="/san-pham/{{$value->slug_san_pham}}-post{{$value->id}}">
                                            <img src="{{ $value->hinh_anh }}" alt="product_img1">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                @if (Auth::guard('khach_hang')->check())
                                                    <li class="add-to-cart addToCart" data-id="{{$value->id}}"><a><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</a></li>
                                                @else
                                                    <li class="add-to-cart" data-toggle="modal" data-target="#myModal"><a><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</a></li>
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
                                        <h6 class="product_title"><a href="/san-pham/{{$value->slug_san_pham}}-post{{$value->id}}">{{ $value->ten_san_pham }}</a></h6>
                                        <div class="product_price text-center">
                                            <span class="price">{{ number_format($value->gia_khuyen_mai ? $value->gia_khuyen_mai : $value->gia_ban, 0) }} đ</span>
                                            @if($value->gia_khuyen_mai)
                                                <del>{{ number_format($value->gia_ban, 0) }} đ</del>
                                            @endif
                                        </div>
                                        {{-- <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width:80%"></div>
                                            </div>
                                        </div> --}}
                                        <div class="pr_desc">
                                            <p>{{ $value->mo_ta_ngan }}</p>
                                        </div>
                                        <!-- <div class="pr_switch_wrap">
                                            <div class="product_color_switch">
                                                <span class="active" data-color="#87554B"></span>
                                                <span data-color="#333333"></span>
                                                <span data-color="#DA323F"></span>
                                            </div>
                                        </div> -->
                                        <div class="list_product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                @if (Auth::guard('khach_hang')->check())
                                                    <li class="add-to-cart addToCart" data-id="{{$value->id}}"><a ><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</a></li>
                                                @else
                                                    <li class="add-to-cart addToCart" data-toggle="modal" data-target="#myModal"><a ><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</a></li>
                                                @endif
                                                @if (Auth::guard('khach_hang')->check())
                                                    <li><a><i data-id="{{$value->id}}" class="icon-heart favourite"></i></a></li>
                                                @else
                                                    <li><a><i data-id="{{$value->id}}" data-toggle="modal" data-target="#myModal" class="icon-heart favourite"></i></a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>
        $(document).ready(function() {
            $('#sort-select').on('change', function() {
                var sortBy = $(this).val();
                var productsContainer = $('.shop_container');

                if (sortBy === 'price') {
                    // Sắp xếp tăng dần theo giá
                    productsContainer.find('.col-lg-3').sort(function(a, b) {
                        var priceA = parseFloat($(a).data('price'));
                        var priceB = parseFloat($(b).data('price'));
                        return priceA - priceB;
                    }).appendTo(productsContainer);
                } else if (sortBy === 'price-desc') {
                    // Sắp xếp giảm dần theo giá
                    productsContainer.find('.col-lg-3').sort(function(a, b) {
                        var priceA = parseFloat($(a).data('price'));
                        var priceB = parseFloat($(b).data('price'));
                        return priceB - priceA;
                    }).appendTo(productsContainer);
                }
            });
        });
    </script>
@endsection

