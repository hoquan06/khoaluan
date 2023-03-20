<!DOCTYPE html>
<html lang="en">
@include('client.shares.head')
<body>
@include('client.shares.top')

<!-- START SECTION BANNER -->
@include('client.pages.thanh_phan.banner')
<!-- END SECTION BANNER -->

<!-- END MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
@include('client.pages.thanh_phan.exclusive_products')
<!-- END SECTION SHOP -->

<!-- START SECTION BANNER -->
@include('client.pages.thanh_phan.banner_2')
<!-- END SECTION BANNER -->

<!-- START SECTION SHOP -->
@include('client.pages.thanh_phan.hot_deal')
<!-- END SECTION SHOP -->

<!-- START SECTION SHOP -->
@include('client.pages.thanh_phan.trending_product')
<!-- END SECTION SHOP -->

<!-- START SECTION CLIENT LOGO -->
<div class="section pt-0 small_pb">
	<div class="custom-container">
    	<div class="row">
			<div class="col-md-12">
            	<div class="heading_tab_header">
                    <div class="heading_s2">
                        <h4>Our Brands</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="client_logo carousel_slider owl-carousel owl-theme nav_style3" data-dots="false" data-nav="true" data-margin="30" data-loop="true" data-autoplay="true" data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "767":{"items": "4"}, "991":{"items": "5"}, "1199":{"items": "6"}}'>
                	<div class="item">
                    	<div class="cl_logo">
                        	<img src="/assets_client/images/cl_logo1.png" alt="cl_logo"/>
                        </div>
                    </div>
                    <div class="item">
                        <div class="cl_logo">
                        	<img src="/assets_client/images/cl_logo2.png" alt="cl_logo"/>
                        </div>
                    </div>
                    <div class="item">
                        <div class="cl_logo">
                        	<img src="/assets_client/images/cl_logo3.png" alt="cl_logo"/>
                        </div>
                    </div>
                    <div class="item">
                        <div class="cl_logo">
                        	<img src="/assets_client/images/cl_logo4.png" alt="cl_logo"/>
                        </div>
                    </div>
                    <div class="item">
                        <div class="cl_logo">
                        	<img src="/assets_client/images/cl_logo5.png" alt="cl_logo"/>
                        </div>
                    </div>
                    <div class="item">
                        <div class="cl_logo">
                        	<img src="/assets_client/images/cl_logo6.png" alt="cl_logo"/>
                        </div>
                    </div>
                    <div class="item">
                        <div class="cl_logo">
                        	<img src="/assets_client/images/cl_logo7.png" alt="cl_logo"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CLIENT LOGO -->

<!-- START SECTION SHOP -->
@include('client.pages.thanh_phan.logo')
<!-- END SECTION SHOP -->

<!-- START SECTION SUBSCRIBE NEWSLETTER -->
@include('client.pages.thanh_phan.featured_products')
<!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
<!-- END MAIN CONTENT -->

@include('client.shares.foot')

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

@include('client.shares.bot')
</body>
</html>
