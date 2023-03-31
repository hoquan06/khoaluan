<div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
        <div class="carousel-inner">
            @php
                $check = true;
            @endphp

            @for($i = 1; $i < 4; $i++)
                @php
                    $name = 'slide_' . $i;
                @endphp
                @if(isset($slide->$name) && Str::length($slide->$name) > 0) 
                <div class="carousel-item background_bg {{ $check == true ? 'active' : '' }}" data-img-src="{{ $slide->$name}}">
                    <div class="banner_slide_content banner_content_inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7 col-10">
                                    <div class="banner_content overflow-hidden">
                                        <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="0.5s">Welcome to Smart Tech</h2>
                                        <h5 class="mb-3 mb-sm-4 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="1s">Cửa hàng đang giảm giá <span class="text_default">50%</span> cho tất cả sản phẩm trong ngày hôm nay!</h5>
                                        <a class="btn btn-fill-out staggered-animation text-uppercase" href="shop-left-sidebar.html" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @endfor
        </div>
    </div>
</div>
