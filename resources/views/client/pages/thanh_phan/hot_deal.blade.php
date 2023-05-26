<div class="section pt-0 pb-0">
    <div class="custom-container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading_tab_header">
                    <div class="heading_s2">
                        <h4>Đang khuyến mãi<img src="" alt=""></h4>
                    </div>
                </div>
                <div class="view_all text-right">
                    <a href="/san-pham-khuyen-mai" class="text_default"><i class="linearicons-power"></i> <span>Xem tất cả</span></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product_slider carousel_slider owl-carousel owl-theme nav_style3" data-loop="true" data-dots="false" data-nav="true" data-margin="30" data-responsive='{"0":{"items": "1"}, "650":{"items": "2"}, "1199":{"items": "2"}}'>
                    @foreach ($khuyenmai as $key => $value)
                        <div class="item">
                            <div class="deal_wrap">
                                <div class="product_img">
                                    <a href="/san-pham/{{$value->slug_san_pham}}-post{{$value->id}}">
                                        <img src="{{$value->hinh_anh}}" alt="el_img1">
                                    </a>
                                </div>
                                <div class="deal_content">
                                    <div class="product_info">
                                        <h5 class="product_title"><a href="/san-pham/{{$value->slug_san_pham}}-post{{$value->id}}">{{$value->ten_san_pham}}</a></h5>
                                        <div class="product_price">
                                            <span class="price">{{ number_format($value->gia_khuyen_mai ? $value->gia_khuyen_mai : $value->gia_ban, 0) }} đ</span>
                                            <del>{{number_format($value->gia_ban, 0)}} đ</del>
                                        </div>
                                    </div>
                                    <span class="product_title"><a href="/san-pham/{{$value->slug_san_pham}}-post{{$value->id}}">{{ Str::length($value->mo_ta_ngan) > 100 ? Str::substr($value->mo_ta_ngan, 0, 100) . '...' :  $value->mo_ta_ngan}}</a></span>
                                    {{-- <div>
                                        <span class="stock-available">Còn lại: <strong>{{$value->so_luong}}</strong></span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/hilios/jQuery.countdown/2.2.0/dist/jquery.countdown.min.js"></script>
<script>
    $(function() {
        $('.countdown_time').each(function() {
            $(this).countdown($(this).data('time'), function(event) {
                $(this).html(event.strftime('<div class="countdown_item"><span class="countdown_time_digit">%D</span><span class="countdown_time_unit">Days</span></div><div class="countdown_item"><span class="countdown_time_digit">%H</span><span class="countdown_time_unit">Hours</span></div><div class="countdown_item"><span class="countdown_time_digit">%M</span><span class="countdown_time_unit">Minutes</span></div><div class="countdown_item"><span class="countdown_time_digit">%S</span><span class="countdown_time_unit">Seconds</span></div>'));
            });
        });
    });
</script>
