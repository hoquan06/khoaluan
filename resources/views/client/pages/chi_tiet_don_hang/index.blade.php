@extends('client.master')

@section('content')
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Chi tiết đơn hàng</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main_content">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive wishlist_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Tên sản phẩm</th>
                                    <th class="product-amount">Số lượng</th>
                                    <th class="product-price">Đơn giá</th>
                                    <th class="product-price">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=>$value)
                                    <tr class="text-nowrap">
                                        <td class="product-thumbnail"><a><img src="{{ $value->hinh_anh }}"></a></td>
                                        <td class="product-name" data-title="Product">{{ $value->ten_san_pham }}</td>
                                        <td class="product-amount" data-title="amount">{{ $value->so_luong }}</td>
                                        <td class="product-price" data-title="Price">{{ number_format($value->don_gia) }}</td>
                                        <td class="product-price" data-title="Price">{{ number_format($value->so_luong * $value->don_gia) }} VND</td>
                                        <td>
                                            <a href="/san-pham/{{$value->slug_san_pham}}-post{{$value->san_pham_id}}">
                                                <button class="btn btn-info">Đánh giá</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @foreach ($tongTien as $key=>$value)
                                            <td class="product-price"><b>Cần thanh toán:</b> {{ number_format($value->thuc_tra) }} VND</td>
                                        @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
