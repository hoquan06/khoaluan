@extends('admin.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive card">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Danh sách sản phẩm tồn kho</h5>
                    <table class="mb-0 table table-bordered table-hover" id="tableSanPham">
                        <thead>
                            <tr>
                                <th class="text-nowrap text-center">#</th>
                                <th class="text-nowrap text-center">Tên Sản Phẩm</th>
                                <th class="text-nowrap text-center">Giá Bán</th>
                                <th class="text-nowrap text-center">Giá Khuyến Mãi</th>
                                <th class="text-nowrap text-center">Ảnh đại diện</th>
                                <th class="text-nowrap text-center">Lượt mua</th>
                            </tr>
                        </thead>
                        <tbody class="text-nowrap text-center">
                            {{-- @foreach ($dsSanPham as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->ten_san_pham }}</td>
                                    <td>{{ $value->gia_ban }} </td>
                                    <td>{{ $value->gia_khuyen_mai }}</td>
                                    <td> <img src="{{ $value->hinh_anh }}" style="height: 50px;"> </td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
