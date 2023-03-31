@extends('client.master')

@section('content')
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Giỏ hàng</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Giỏ hàng</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<div class="main_content">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive shop_cart_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Tên sản phẩm</th>
                                    <th class="product-name">Màu sắc</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-subtotal">Tổng tiền</th>
                                    <th class="product-remove">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="product-thumbnail"><a href="#"><img src="assets/images/product_img1.jpg" alt="product1"></a></td>
                                    <td class="product-name" data-title="Product"><a href="#">Blue Dress For Woman</a></td>
                                    <td class="product-name" data-title="Product"><a href="#">Đen</a></td>
                                    <td class="product-price" data-title="Price">$45.00</td>
                                    <td class="product-quantity" data-title="Quantity"><div class="quantity">
                                    <input type="button" value="-" class="minus">
                                    <input type="text" name="quantity" value="2" title="Qty" class="qty" size="4">
                                    <input type="button" value="+" class="plus">
                                    </div></td>
                                    <td class="product-subtotal" data-title="Total">$90.00</td>
                                    <td class="product-remove" data-title="Remove"><a href="#"><i class="ti-close"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                    <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="border p-3 p-md-4">
                        <div class="heading_s1 mb-3">
                            <h6>Biên lai</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">Tiền dự tính</td>
                                        <td class="cart_total_amount">$349.00</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Vận chuyển</td>
                                        <td class="cart_total_amount">Miễn phí vận chuyển</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Tổng tiền</td>
                                        <td class="cart_total_amount"><strong>$349.00</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="#" class="btn btn-fill-out">Đến trang thanh toán</a>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</div>
@endsection
