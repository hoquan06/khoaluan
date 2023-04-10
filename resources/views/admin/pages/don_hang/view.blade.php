@extends('admin.master')
@section('content')
<div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body text-center"><h5 class="card-title"> Đơn Hàng</h5>
                <table class="mb-0 table table-bordered table-hover" id="tableDanhMuc">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tên Sản Phẩm</th>
                            <th class="text-center">Hình Ảnh</th>
                            <th class="text-center">Số Lượng</th>
                            <th class="text-center">Đơn Giá</th>
                            <th class="text-center">Tổng Tiền</th>
                            <th class="text-center">Loại Thanh Toán</th>
                        </tr>
                    </thead>
                    <tbody class="text-nowrap text-center">
                        @foreach($chi_tiet_don_hang as $key => $value)
                            <tr> 
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->ten_san_pham }}</td>               
                                <td><img src="{{ $value->hinh_anh }}" alt="" style="height :50px ; width: 50px" ></td>               
                                <td>{{ $value->so_luong }}</td>               
                                <td>{{ number_format($value->don_gia) }}</td>                                           
                                <td>{{ number_format($value->so_luong * $value->don_gia) }}</td>        
                                @if($value->loai_thanh_toan ==0) 
                                    <td>Thanh toán khi nhận hàng</td>
                                @else 
                                    <<td>Chuyển khoản</td>                  
                                @endif              
                            </tr>                      
                        @endforeach
                    </tbody>
                </table>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @foreach($khach_hang as $key => $value)
                                <tr>
                                    <td><b><u>Tên Khách Hàng </u></b> : <b>{{ $value->ho_va_ten }}</b> </td>
                                        <br/>
                                    <td><b><u>Số Điện Thoại </u></b> : <b>{{ $value->so_dien_thoai }}</b> </td>
                                        <br/>
                                    <td><b><u>Địa Chỉ </u></b> : <b>{{ $value->dia_chi }}</b> </td>
                                </tr>
                            @endforeach
                        </div>
                    </div>
                </div>
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