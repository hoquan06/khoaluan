@extends('client.master')

@section('content')
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Không tìm thấy</h1>
                    </div>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <div class="main_content">
        <div class="section">
            <div class="error_wrap">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-6 col-md-10 order-lg-first">
                            <div class="text-center">
                                <div class="error_txt">404</div>
                                <h5 class="mb-2 mb-sm-3">oops! Trang bạn yêu cầu không tìm thấy!</h5>
                                <p>Trang bạn đang tìm kiếm đã bị di chuyển, xóa, đổi tên hoặc có thể chưa từng tồn tại.</p>
                                <div class="search_form pb-3 pb-md-4">
                                    <form method="post">
                                        <input name="text" id="text" type="text" placeholder="Tìm kiếm" class="form-control">
                                        <button type="submit" class="btn icon_search"><i class="ion-ios-search-strong"></i></button>
                                    </form>
                                </div>
                                <a href="/" class="btn btn-fill-out">Quay về trang chủ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
