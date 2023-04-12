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
                            <div class="card-body">
                                <span>Tên Khách Hàng : {{ $value->ho_va_ten }}</span>
                                <br/>
                                <span>Địa Chỉ : {{ $value->dia_chi }}</span>
                                <br/>
                                <span>Số Điện Thoại: {{ $value->so_dien_thoai }}</span>
                                <br/>
                                <span>Tổng tiền của đơn hàng : {{ number_format($value->thuc_tra) }} VND</span>
                            </div>
                        </div>
                    </div>
                </table>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="/admin/don-hang/index" class="btn btn-danger">Đóng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection