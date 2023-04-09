<header class="header_wrap">
	<div class="top-header light_skin bg_dark d-none d-md-block">
        <div class="custom-container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                	<div class="header_topbar_info">
                    	<div class="header_offer">
                    		<span>Miễn phí giao hàng toàn quốc</span>
                        </div>
                        <div class="download_wrap">
                            <span class="mr-3">Tải ngay</span>
                            <ul class="icon_list text-center text-lg-left">
                                <li><a href="#"><i class="fab fa-apple"></i></a></li>
                                <li><a href="#"><i class="fab fa-android"></i></a></li>
                                <li><a href="#"><i class="fab fa-windows"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                	<div class="d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="lng_dropdown">
                            <div class="ddOutOfVision" id="msdrpdd20_msddHolder" style="height: 0px; overflow: hidden; position: absolute;"><select name="countries" class="custome_select" id="msdrpdd20" tabindex="-1">
                                <option value="en" data-image="/assets_client/images/eng.png" data-title="English">English</option>
                                <option value="fn" data-image="/assets_client/images/fn.png" data-title="France">France</option>
                                <option value="us" data-image="/assets_client/images/us.png" data-title="United States">United States</option>
                            </select></div><div class="dd ddcommon borderRadius" id="msdrpdd20_msdd" tabindex="0" style="width: 129.6px;"><div class="ddTitle borderRadiusTp"><span class="divider"></span><span class="ddArrow arrowoff"></span><span class="ddTitleText " id="msdrpdd20_title"><img src="/assets_client/images/eng.png" class="fnone"><span class="ddlabel">English</span><span class="description" style="display: none;"></span></span></div><input id="msdrpdd20_titleText" type="text" autocomplete="off" class="text shadow borderRadius" style="display: none;"><div class="ddChild ddchild_ border shadow" id="msdrpdd20_child" style="z-index: 9999; display: none; position: absolute; visibility: visible; height: 105px;"><ul><li class="enabled _msddli_ selected" title="English"><img src="/assets_client/images/eng.png" class="fnone"><span class="ddlabel">English</span><div class="clear"></div></li><li class="enabled _msddli_" title="France"><img src="/assets_client/images/fn.png" class="fnone"><span class="ddlabel">France</span><div class="clear"></div></li><li class="enabled _msddli_" title="United States"><img src="/assets_client/images/us.png" class="fnone"><span class="ddlabel">United States</span><div class="clear"></div></li></ul></div></div>
                        </div>
                        <div class="ml-3">
                            <div class="ddOutOfVision" id="msdrpdd21_msddHolder" style="height: 0px; overflow: hidden; position: absolute;"><select name="countries" class="custome_select" id="msdrpdd21" tabindex="-1">
                                <option value="USD" data-title="USD">USD</option>
                                <option value="EUR" data-title="EUR">EUR</option>
                                <option value="GBR" data-title="GBR">GBR</option>
                            </select></div><div class="dd ddcommon borderRadius" id="msdrpdd21_msdd" tabindex="0" style="width: 55.2px;"><div class="ddTitle borderRadiusTp"><span class="divider"></span><span class="ddArrow arrowoff"></span><span class="ddTitleText " id="msdrpdd21_title"><span class="ddlabel">USD</span><span class="description" style="display: none;"></span></span></div><input id="msdrpdd21_titleText" type="text" autocomplete="off" class="text shadow borderRadius" style="display: none;"><div class="ddChild ddchild_ border shadow" id="msdrpdd21_child" style="z-index: 9999; display: none; position: absolute; visibility: visible; height: 105px;"><ul><li class="enabled _msddli_ selected" title="USD"><span class="ddlabel">USD</span><div class="clear"></div></li><li class="enabled _msddli_" title="EUR"><span class="ddlabel">EUR</span><div class="clear"></div></li><li class="enabled _msddli_" title="GBR"><span class="ddlabel">GBR</span><div class="clear"></div></li></ul></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="middle-header dark_skin">
    	<div class="container">
            <div class="nav_block">
                <a class="navbar-brand" href="/">
                    <img class="logo_light" src="\photos\shares\logo\logo.png" alt="logo">
                    <img class="logo_dark" src="\photos\shares\logo\logo.png" alt="logo">
                </a>
                <div class="product_search_form rounded_input">
                    <form action="/search" method="post">
                        @csrf
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="custom_select">
                                    <select class="first_null not_chosen">
                                        <option value="">Tất cả danh mục</option>
                                    </select>
                                </div>
                            </div>
                            <input class="form-control" name="search" placeholder="Bạn cần tìm..." required="" type="text">
                            <button type="submit" class="search_btn2"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <li><a href="/khach-hang/yeu-thich" class="nav-link"><i class="linearicons-heart"></i><span class="wishlist_count">0</span></a></li>
                    <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="/khach-hang/gio-hang"><i class="linearicons-bag2"></i><span class="cart_count">2</span></a></li>
                    @if (Auth::guard('khach_hang')->check())
                        <li>
                            <a href="/khach-hang/thong-tin-ca-nhan" class="nav-link"><i class="linearicons-user"></i>
                                <span class="my-cart">
                                    <span>
                                        <strong>{{ Auth::guard('khach_hang')->user()->ho_va_ten }}</strong>
                                    </span>
                                </span>
                                <li><a href="/khach-hang/logout" class="nav-link"><i class="linearicons-exit"></i></a></li>
                            </a>
                        </li>
                    @else
                        <li class="mr-2">
                            <a href="/khach-hang/register"><i class="lnr lnr-user"></i>
                            <span class="my-cart align-middle">Đăng ký</span>
                            </a>
                        </li>
                        <li>
                            <a href="/khach-hang/login"><i class="lnr lnr-user"></i>
                            <span class="my-cart align-middle">Đăng nhập</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    @include('client.shares.menu')
</header>
