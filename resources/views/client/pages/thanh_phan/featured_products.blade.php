<div class="section pt-0 pb_20">
    <div class="custom-container">
        <div class="row">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <h4>Mới ra mắt</h4>
                            </div>
                            <div class="view_all">
                                <a href="/san-pham-moi-ra-mat" class="text_default"><span>Xem tất cả</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product_slider carousel_slider product_list owl-carousel owl-theme nav_style5" data-nav="true" data-dots="false" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "380":{"items": "1"}, "640":{"items": "2"}, "991":{"items": "1"}}'>
                            <div class="item">
                                @foreach ($sp_moi as $key => $value)
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="/san-pham/{{$value->slug_san_pham}}-post{{$value->id}}">
                                                <img src="{{$value->hinh_anh}}" alt="el_img2">
                                                <img class="product_hover_img" src="{{$value->hinh_anh_2}}" alt="el_hover_img2">
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="/san-pham/{{$value->slug_san_pham}}-post{{$value->id}}">{{$value->ten_san_pham}}</a></h6>
                                            <div class="product_price">
                                                <span class="price">{{ number_format($value->gia_khuyen_mai ? $value->gia_khuyen_mai : $value->gia_ban, 0) }} đ</span>
                                                @if ($value->gia_khuyen_mai)
                                                    <del>{{ number_format($value->gia_ban, 0) }} đ</del>
                                                @endif
                                            </div>
                                            <div class="pr_desc">
                                                <p>{{$value->mo_ta_ngan}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($key > 1)
                                        @break
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <h4>Được đánh giá cao</h4>
                            </div>
                            <div class="view_all">
                                <a href="/san-pham-danh-gia-cao" class="text_default"><span>Xem tất cả</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product_slider carousel_slider product_list owl-carousel owl-theme nav_style5" data-nav="true" data-dots="false" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "380":{"items": "1"}, "640":{"items": "2"}, "991":{"items": "1"}}'>
                            <div class="item">
                                @foreach ($spDanhGiaCao as $key => $value)
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="/san-pham/{{$value->slug_san_pham}}-post{{$value->id}}">
                                                <img src="{{$value->hinh_anh}}" alt="el_img5">
                                                <img class="product_hover_img" src="{{$value->hinh_anh_2}}" alt="el_hover_img5">
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="/san-pham/{{$value->slug_san_pham}}-post{{$value->id}}">{{$value->ten_san_pham}}</a></h6>
                                            <div class="product_price">
                                                <span class="price">{{ number_format($value->gia_khuyen_mai ? $value->gia_khuyen_mai : $value->gia_ban, 0) }} đ</span>
                                                @if($value->gia_khuyen_mai)
                                                    <del>{{number_format($value->gia_ban, 0)}} đ</del>
                                                @endif
                                            </div>
                                            <div class="text-left">
                                                <span class="">Còn lại: <strong>{{$value->so_luong}}</strong></span>
                                            </div>
                                            <div class="pr_desc">
                                                <p>{{$value->mo_ta_ngan}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($key > 1)
                                        @break
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <h4>Đang khuyến mãi</h4>
                            </div>
                            <div class="view_all">
                                <a href="/san-pham-khuyen-mai" class="text_default"><span>Xem tất cả</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product_slider carousel_slider product_list owl-carousel owl-theme nav_style5" data-nav="true" data-dots="false" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "380":{"items": "1"}, "640":{"items": "2"}, "991":{"items": "1"}}'>
                            <div class="item">
                                @foreach ($spGiam as $key => $value)
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="/san-pham/{{$value->slug_san_pham}}-post{{$value->id}}">
                                                <img src="{{$value->hinh_anh}}" alt="el_img11">
                                                <img class="product_hover_img" src="{{$value->hinh_anh_2}}" alt="el_hover_img11">
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="/san-pham/{{$value->slug_san_pham}}-post{{$value->id}}">{{$value->ten_san_pham}}</a></h6>
                                            <div class="product_price">
                                                <span class="price">{{ number_format($value->gia_khuyen_mai ? $value->gia_khuyen_mai : $value->gia_ban, 0) }} đ</span>
                                                @if($value->gia_khuyen_mai)
                                                    <del>{{ number_format($value->gia_ban, 0) }} đ</del>
                                                @endif
                                            </div>
                                            <div class="pr_desc">
                                                <p>{{$value->mo_ta_ngan}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($key > 1)
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
</div>
