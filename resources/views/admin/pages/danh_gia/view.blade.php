@extends('admin.master')
@section('content')
<div class="table-responsive card">
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Danh Sách Sản Phẩm Được Đánh Giá Cao</h5>
            <table class="mb-0 table table-bordered table-hover" id="tableSanPham">
                <thead>
                    <tr>
                        <th class="text-nowrap text-center">#</th>
                        <th class="text-nowrap text-center">Tên Sản Phẩm</th>
                        <th class="text-nowrap text-center">Giá Bán</th>
                        <th class="text-nowrap text-center">Hình Ảnh</th>
                        <th class="text-nowrap text-center">Lượt đánh giá 5*</th>
                    </tr>
                </thead>
                <tbody class="text-nowrap text-center">
                        @foreach($data as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->ten_san_pham }}</td>
                                <td>{{ number_format($value->gia_ban) }} VND</td>
                                <td>
                                    <img src="{{ $value->hinh_anh }}" style="height: 50px;">
                                </td>
                                <td>{{ $value->ti_le_sao }}</td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection