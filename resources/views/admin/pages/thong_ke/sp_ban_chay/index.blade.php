@extends('admin.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive card">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Danh sách sản phẩm bán chạy</h5>
                    <table class="mb-0 table table-bordered table-hover" id="tableSanPham">
                        <thead>
                            <tr>
                                <th class="text-nowrap text-center">#</th>
                                <th class="text-nowrap text-center">Tên Sản Phẩm</th>
                                <th class="text-nowrap text-center">Giá Bán</th>
                                <th class="text-nowrap text-center">Giá Khuyến Mãi</th>
                                <th class="text-nowrap text-center">Ảnh đại diện</th>
                                <th class="text-nowrap text-center">Số lượng bán ra</th>
                            </tr>
                        </thead>
                        <tbody class="text-nowrap text-center">
                            @foreach ($spBanChay as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->ten_san_pham }}</td>
                                    <td>{{ number_format($value->gia_ban) }} VND</td>
                                    <td>{{ number_format($value->gia_khuyen_mai) }} VND</td>
                                    <td> <img src="{{ $value->hinh_anh }}" style="height: 50px;"> </td>
                                    <td>{{ $value->luotban }}</td>
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
