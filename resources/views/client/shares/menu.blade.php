<div class="bottom_header dark_skin main_menu_uppercase border-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-6 col-3">
                <div class="categories_wrap">
                    <button type="button" data-toggle="collapse" data-target="#navCatContent" aria-expanded="false" class="categories_btn categories_menu collapsed">
                        <span>Tất cả danh mục </span><i class="linearicons-menu"></i>
                    </button>
                    <div id="navCatContent" class="navbar collapse">
                        <ul>
                            @foreach ($menuCha as $key => $value_cha)
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-item nav-link dropdown-toggler" href="#" data-toggle="dropdown"><img src="{{$value_cha->hinh_anh}}" style="height: 40px;" > <span>{{ $value_cha -> ten_danh_muc }}</span></a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    @foreach ($menuCon as $key => $value_con)
                                                        @if ($value_con -> id_danh_muc_cha == $value_cha -> id)
                                                            <li class="mega-menu-col col-lg-6">
                                                                <ul>
                                                                    <li><a class="dropdown-item nav-link nav_item" href="#">{{ $value_con -> ten_danh_muc }}</a></li>
                                                                </ul>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                            {{-- <li class="dropdown dropdown-mega-menu">
                                <a class="dropdown-item nav-link dropdown-toggler" href="#" data-toggle="dropdown"><i class="flaticon-responsive"></i> <span>Mobile &amp; Tablet</span></a>
                                <div class="dropdown-menu">
                                    <ul class="mega-menu d-lg-flex">
                                        <li class="mega-menu-col col-lg-7">
                                            <ul class="d-lg-flex">
                                                <li class="mega-menu-col col-lg-6">
                                                    <ul>
                                                        <li class="dropdown-header">Featured Item</li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Vestibulum sed</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur tempus</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu-col col-lg-6">
                                                    <ul>
                                                        <li class="dropdown-header">Popular Item</li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur laoreet</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Quisque condimentum</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="mega-menu-col col-lg-5">
                                            <div class="header-banner2">
                                                <a href="#"><img src="/assets_client/images/menu_banner6.jpg" alt="menu_banner"></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="dropdown dropdown-mega-menu">
                                <a class="dropdown-item nav-link dropdown-toggler" href="#" data-toggle="dropdown"><i class="flaticon-camera"></i> <span>Camera</span></a>
                                <div class="dropdown-menu">
                                    <ul class="mega-menu d-lg-flex">
                                        <li class="mega-menu-col col-lg-7">
                                            <ul class="d-lg-flex">
                                                <li class="mega-menu-col col-lg-6">
                                                    <ul>
                                                        <li class="dropdown-header">Featured Item</li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Vestibulum sed</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur tempus</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu-col col-lg-6">
                                                    <ul>
                                                        <li class="dropdown-header">Popular Item</li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur laoreet</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Quisque condimentum</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="mega-menu-col col-lg-5">
                                            <div class="header-banner2">
                                                <a href="#"><img src="/assets_client/images/menu_banner9.jpg" alt="menu_banner"></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="dropdown dropdown-mega-menu">
                                <a class="dropdown-item nav-link dropdown-toggler" href="#" data-toggle="dropdown"><i class="flaticon-plugins"></i> <span>Accessories</span></a>
                                <div class="dropdown-menu">
                                    <ul class="mega-menu d-lg-flex">
                                        <li class="mega-menu-col col-lg-4">
                                            <ul>
                                                <li class="dropdown-header">Woman's</li>
                                                <li><a class="dropdown-item nav-link nav_item" href="shop-list-left-sidebar.html">Vestibulum sed</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="shop-left-sidebar.html">Donec porttitor</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="shop-right-sidebar.html">Donec vitae facilisis</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="shop-list.html">Curabitur tempus</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="shop-load-more.html">Vivamus in tortor</a></li>
                                            </ul>
                                        </li>
                                        <li class="mega-menu-col col-lg-4">
                                            <ul>
                                                <li class="dropdown-header">Men's</li>
                                                <li><a class="dropdown-item nav-link nav_item" href="shop-cart.html">Donec vitae ante ante</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="checkout.html">Etiam ac rutrum</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="wishlist.html">Quisque condimentum</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="compare.html">Curabitur laoreet</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="order-completed.html">Vivamus in tortor</a></li>
                                            </ul>
                                        </li>
                                        <li class="mega-menu-col col-lg-4">
                                            <ul>
                                                <li class="dropdown-header">Kid's</li>
                                                <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail.html">Donec vitae facilisis</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-left-sidebar.html">Quisque condimentum</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-right-sidebar.html">Etiam ac rutrum</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Donec vitae ante ante</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Donec porttitor</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li><a class="dropdown-item nav-link nav_item" href="coming-soon.html"><i class="flaticon-headphones"></i> <span>Headphones</span></a></li>
                            <li><a class="dropdown-item nav-link nav_item" href="404.html"><i class="flaticon-console"></i> <span>Gaming</span></a></li>
                            <li><a class="dropdown-item nav-link nav_item" href="login.html"><i class="flaticon-watch"></i> <span>Watches</span></a></li>
                            <li><a class="dropdown-item nav-link nav_item" href="register.html"><i class="flaticon-music-system"></i> <span>Home Audio &amp; Theater</span></a></li>
                            <li><a class="dropdown-item nav-link nav_item" href="coming-soon.html"><i class="flaticon-monitor"></i> <span>TV &amp; Smart Box</span></a></li>
                            <li><a class="dropdown-item nav-link nav_item" href="404.html"><i class="flaticon-printer"></i> <span>Printer</span></a></li>
                            <li>
                                <ul class="more_slide_open" style="display: none;">
                                    <li><a class="dropdown-item nav-link nav_item" href="login.html"><i class="flaticon-fax"></i> <span>Fax Machine</span></a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="register.html"><i class="flaticon-mouse"></i> <span>Mouse</span></a></li>
                                </ul>
                            </li> --}}
                        </ul>
                        <div class="more_categories">More Categories</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-6 col-9">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler side_navbar_toggler" type="button" data-toggle="collapse" data-target="#navbarSidetoggle" aria-expanded="false">
                        <span class="ion-android-menu"></span>
                    </button>
                    <div class="pr_search_icon">
                        <a href="javascript:void(0);" class="nav-link pr_search_trigger"><i class="linearicons-magnifier"></i></a>
                    </div>
                    <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
                        <ul class="navbar-nav">
                            @foreach ($menuCha as $key => $value_cha)
                            <li class="dropdown">
                                <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">{{ $value_cha->ten_danh_muc }}</a>
                                <div class="dropdown-menu">
                                    <ul>
                                        @foreach ($menuCon as $key => $value_con)
                                            @if ($value_con->id_danh_muc_cha == $value_cha->id)
                                                <li><a class="dropdown-item nav-link nav_item" href="about.html">{{ $value_con->ten_danh_muc }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                            <li><a class="nav-link nav_item" href="contact.html">Liên hệ</a></li>
                        </ul>
                    </div>
                    <div class="contact_phone contact_support">
                        <i class="linearicons-phone-wave"></i>
                        <span>123-456-7689</span>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
