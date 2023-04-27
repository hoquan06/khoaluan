@extends('admin.master')
@section('content')
<div class="table-responsive card">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Danh Sách Đánh Giá Của Khách Hàng</h5>
                <table class="mb-0 table table-bordered table-hover" id="tableSanPham">
                    <thead>
                        <tr>
                            <th class="text-nowrap text-center">#</th>
                            <th class="text-nowrap text-center">Tên Khách Hàng</th>
                            <th class="text-nowrap text-center">Tên Sản Phẩm</th>
                            <th class="text-nowrap text-center">Số sao đánh giá</th>
                            <th class="text-nowrap text-center">Nội dung đánh giá</th>
                        </tr>
                    </thead>
                    <tbody class="text-nowrap text-center">
                        @foreach ($dsDanhGia as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->ho_va_ten }}</td>
                                <td>{{ $value->ten_san_pham }}</td>
                                <td>{{ $value->so_sao }} </td>
                                <td>{{ $value->noi_dung }}</td>                      
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>
@endsection