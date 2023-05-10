@extends('admin.master')
@section('content')
<div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body text-center"><h5 class="card-title">Chi Tiết Đơn Hàng </h5>
                <table class="mb-0 table table-bordered table-hover" id="tableDanhMuc">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tên Sản Phẩm</th>
                            <th class="text-center">Hình Ảnh</th>
                            <th class="text-center">Số Lượng</th>
                            <th class="text-center">Giá Bán</th>
                            <th class="text-center">Tiền Giảm Giá</th>
                            <th class="text-center">Thực Trả</th>
                        </tr>
                    </thead>
                    <tbody class="text-nowrap text-center">
                        @foreach($chi_tiet_don_hang as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ Str::length($value->ten_san_pham) > 30 ? Str::substr($value->ten_san_pham, 0, 30) . '...' :  $value->ten_san_pham}} </td>
                                <td><img src="{{ $value->hinh_anh }}" alt="" style="height :50px ; width: 50px" ></td>
                                <td>{{ $value->so_luong }}</td>
                                <td>{{ number_format($value->gia_ban * $value->so_luong )}} VND</td>
                                <td>{{ number_format(($value->gia_ban - $value->gia_khuyen_mai) * $value->so_luong)}} VND</td>
                                <td>{{ number_format($value->don_gia * $value->so_luong )}} VND</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <div class="col md-12">
                        <div class="card">
                            <div class="card-body text-start">
                                <span>Tên Khách Hàng : <b>{{ $value->ho_va_ten }}</b></span>
                                <br/>
                                <span>Địa Chỉ : <b>{{ $value->dia_chi }}</b></span>
                                <br/>
                                <span>Số Điện Thoại: <b>{{ $value->so_dien_thoai }}</b></span>
                                <br/>
                                <span>Tổng tiền của đơn hàng : <b>{{ number_format($value->thuc_tra) }} VND </b></span>
                                <br/>
                                <span>Sản phẩm: </span>
                            </div>
                        </div>
                    </div>
                </table>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-danger close">Đóng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".close").click(function() {
            window.history.back();
        });

    });
</script>
@endsection
