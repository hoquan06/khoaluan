@extends('admin.master')

@section('content')
<div class="row match-height">
    <!-- Medal Card -->
    <div class="col-xl-4 col-md-6 col-12">
        <div class="card card-congratulation-medal">
            <div class="card-body">
                <h5>Tổng doanh thu</h5>
                <p class="card-text font-small-3">Bạn đã đạt được mức doanh thu là: </p>
                <h3 class="mb-75 mt-2 pt-50">
                    @foreach ($tongDoanhThu as $key=>$value)
                        <a href="javascript:void(0);">{{number_format($value->tong_doanh_thu)}} VND</a>
                    @endforeach
                </h3>
                {{-- <button type="button" class="btn btn-primary waves-effect waves-float waves-light">Xem doanh số</button> --}}
                <img src="../../../app-assets/images/illustration/badge.svg" class="congratulation-medal" alt="Medal Pic">
            </div>
        </div>
    </div>
    <!--/ Medal Card -->

    <!-- Statistics Card -->
    <div class="col-xl-8 col-md-6 col-12">
        <div class="card card-statistics">
            <div class="card-header">
                <h4 class="card-title">Thống kê năm nay</h4>
                <div class="d-flex align-items-center">
                    <p class="card-text font-small-2 mr-25 mb-0">Vừa mới cập nhật</p>
                </div>
            </div>
            <div class="card-body statistics-body">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0 text-center hideShowKhachHang">
                        <div class="media">
                            <div class="avatar bg-light-info mr-2">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user avatar-icon"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                </div>
                            </div>
                            <div class="media-body my-auto">
                                @foreach ($doanhThuNam as $key=>$value)
                                    <h4 class="font-weight-bolder mb-0">{{$value->sl_kh}}</h4>
                                @endforeach
                                <p class="card-text font-small-3 mb-0">Khách hàng</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm- text-center hideShowKhachHang">
                        <div class="media">
                            <div class="avatar bg-light-danger mr-2">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box avatar-icon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                </div>
                            </div>
                            <div class="media-body my-auto">
                                @foreach ($slSanPham as $key=>$value)
                                    <h4 class="font-weight-bolder mb-0">{{$value->sl_sp}}</h4>
                                @endforeach
                                <p class="card-text font-small-3 mb-0">Sản phẩm</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 text-center">
                        <div class="media">
                            <div class="avatar bg-light-success mr-2">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign avatar-icon"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                </div>
                            </div>
                            <div class="media-body my-auto">
                                @foreach ($doanhThuNam as $key=>$value)
                                    <h4 class="font-weight-bolder mb-0">{{number_format($value->doanh_thu)}} VND</h4>
                                @endforeach
                                <p class="card-text font-small-3 mb-0">Doanh thu</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 text-center">
                        <div class="media">
                            <div class="avatar bg-light-success mr-2">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign avatar-icon"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                </div>
                            </div>
                            <div class="media-body my-auto">
                                @foreach ($doanhThuNamTruoc as $key=>$value)
                                    <h4 class="font-weight-bolder mb-0">{{number_format($value->doanh_thu)}} VND</h4>
                                @endforeach
                                <p class="card-text font-small-3 mb-0">Doanh thu năm trước</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Statistics Card -->
</div>
{{-- <div class="table-responsive card" id="tableKhachHang">
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Danh Sách Khách Hàng Mua Trong Năm</h5>
            <table class="mb-0 table table-bordered table-hover" id="tableSanPham">
                <thead>
                    <tr>
                        <th class="text-nowrap text-center">#</th>
                        <th class="text-nowrap text-center">Tên Khách Hàng</th>
                        <th class="text-nowrap text-center">Ngày Sinh</th>
                        <th class="text-nowrap text-center">Số Điện Thoại</th>
                        <th class="text-nowrap text-center">Địa Chỉ</th>
                        <th class="text-nowrap text-center">SP Đã Mua</th>
                        <th class="text-nowrap text-center">Giá Trị Sản Phẩm</th>
                    </tr>
                </thead>
                <tbody class="text-nowrap text-center">
                    @foreach($thongTinTheoNam as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->ho_va_ten }}</td>
                            <td>{{ $value->ngay_sinh }}</td>
                            <td>{{ $value->so_dien_thoai }}</td>
                            <td>{{ $value->dia_chi }}</td>
                            <td>{{ $value->ten_san_pham }}</td>
                            <td>{{ number_format($value->don_gia) }} VND</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> --}}
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $(".hideShowKhachHang").click(function(){
            $("#tableKhachHang").toggle();
        });
    });
</script>
@endsection
