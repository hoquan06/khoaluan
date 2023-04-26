@extends('admin.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive card">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Danh sách khách hàng mua nhiều nhất</h5>
                    <table class="mb-0 table table-bordered table-hover" id="tableSanPham">
                        <thead>
                            <tr>
                                <th class="text-nowrap text-center">#</th>
                                <th class="text-nowrap text-center">Tên khách hàng</th>
                                <th class="text-nowrap text-center">Ngày sinh</th>
                                <th class="text-nowrap text-center">Số điện thoại</th>
                                <th class="text-nowrap text-center">Địa chỉ</th>
                                <th class="text-nowrap text-center">Số đơn hàng</th>
                                <th class="text-nowrap text-center">Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody class="text-nowrap text-center">
                            @foreach ($khachHang as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->ho_va_ten }}</td>
                                    <td>{{ $value->ngay_sinh }} </td>
                                    <td>{{ $value->so_dien_thoai }}</td>
                                    <td>{{ $value->dia_chi }}</td>
                                    <td>{{ $value->soDon }}</td>
                                    <td>{{ number_format($value->tongTien) }} VND</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
