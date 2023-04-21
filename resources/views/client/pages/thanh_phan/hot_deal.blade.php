<div class="section pt-0 pb-0">
    <div class="custom-container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading_tab_header">
                    <div class="heading_s2">
                        <h4>Flash Sale</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product_slider carousel_slider owl-carousel owl-theme nav_style3" data-loop="true" data-dots="false" data-nav="true" data-margin="30" data-responsive='{"0":{"items": "1"}, "650":{"items": "2"}, "1199":{"items": "2"}}'>
                    @foreach ($best_seller as $key => $value)
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
                                            <span class="price">{{ number_format($value->gia_khuyen_mai ? $value->gia_khuyen_mai : $value->gia_ban, 0) }}</span>
                                            <del>{{number_format($value->gia_ban, 0)}}</del>
                                        </div>
                                    </div>
                                    <div class="deal_progress">
                                        <span class="stock-sold">Already Sold: <strong>6</strong></span>
                                        <span class="stock-available">Còn lại: <strong>{{$value->so_luong}}</strong></span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="46" aria-valuemin="0" aria-valuemax="100" style="width:46%"> 46% </div>
                                        </div>
                                    </div>
                                    <div class="countdown_time countdown_style4 mb-4" data-time="2021/10/02 12:30:15"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
