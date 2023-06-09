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
<div class="main_content" id="app">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive shop_cart_table">
                        <table class="table text-nowrap text-center">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Tên sản phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-subtotal">Tổng tiền</th>
                                    <th class="product-remove">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, key) in dsCart">
                                    <tr>
                                        <td class="product-thumbnail"><a><img v-bind:src="value.hinh_anh" alt="product1"></a></td>
                                        <td class="product-name" data-title="Product"><a v-bind:href="'/san-pham/' + value.slug_san_pham + '-post' + value.san_pham_id">@{{value.ten_san_pham}}</a></td>
                                        <td class="product-price" data-title="Price">@{{numberFormat(value.don_gia)}}</td>
                                        <td class="product-quantity" data-title="Quantity"><div class="quantity">
                                        <input type="number" v-on:change="updateCart(value)" name="quantity" v-model="value.so_luong" min="1" max="5" title="Qty" class="qty" size="4">
                                        </div></td>
                                        <td class="product-subtotal" data-title="Total">@{{numberFormat(value.so_luong * value.don_gia)}}</td>
                                        <td class="product-remove" data-title="Remove"><a><i :data-id="value.id" v-on:click='removeCart(value)' class="ti-close"></i></a></td>
                                    </tr>
                                </template>
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
                                        <td class="cart_total_label">Tổng tiền</td>
                                        <td class="cart_total_amount">@{{numberFormat(toTal())}}</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Vận chuyển</td>
                                        <td class="cart_total_amount">Miễn phí vận chuyển</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Cần thanh toán</td>
                                        <td class="cart_total_amount"><strong>@{{numberFormat(toTal())}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Địa chỉ nhận hàng</td>
                                        <td>
                                            <input type="text" id="dia_chi_nhan_hang" class="form-control" placeholder="Nhập địa chỉ nhận hàng">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Hình thức thanh toán</td>
                                        <td>
                                          <select name="payment-method" class="form-control" id="thanhToan">
                                            <option value="0">Thanh toán khi nhận hàng</option>
                                            <option value="1">Thanh toán qua Momo</option>
                                          </select>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <a class="btn btn-fill-out" v-on:click="createBill()">Mua hàng</a>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    var app = new Vue({
        el          : "#app",
        data        : {
            dsCart      : [],
        },
        created(){
            this.loadCart();
        },
        methods: {
            loadCart(){
                axios
                    .get('/khach-hang/gio-hang/data')
                    .then((res) => {
                        this.dsCart = res.data.dataCart;
                    })
            },
            numberFormat(number){
                return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number);
            },
            updateCart(row){
                //Kiểm tra số lượng của sản phẩm
                const soLuongGioHang = parseFloat(row.so_luong);
                if (isNaN(soLuongGioHang) || !Number.isInteger(soLuongGioHang)) {
                    toastr.error("Số lượng sản phẩm phải là số nguyên!");
                    this.loadCart();
                    return;
                }

                if(soLuongGioHang < 1){
                    toastr.error("Số lượng sản phẩm phải lớn hơn hoặc bằng 1");
                    this.loadCart();
                    return;
                } if(soLuongGioHang > 5){
                    toastr.error("Bạn chỉ được mua tối đa 5 sản phấm");
                    this.loadCart();
                    return;
                }

                axios
                    .post('/khach-hang/gio-hang/update', row)
                    .then((res) => {
                        if(res.data.giohang){
                            toastr.success("Đã cập nhật giỏ hàng!");
                            this.loadCart();
                        }
                    })
                    .catch((res) => {
                        var danh_sach_loi = res.response.data.errors;
                        $.each(danh_sach_loi, function(key, value){
                            toastr.error(value[0]);
                        });
                    });
            },
            removeCart(row){
                var idRemove =   event.target.getAttribute('data-id');

                axios
                    .get('/khach-hang/gio-hang/delete/' + idRemove, row)
                    .then((res) => {
                        if(res.data.remove){
                            toastr.success('Đã xóa sản phẩm khỏi giỏ hàng!');
                            this.loadCart();
                        } else{
                            toastr.error("Sản phẩm không có trong giỏ hàng!");
                        }
                    })
            },
            //post
            // removeCart(row){
            //     axios
            //         .post('/khach-hang/gio-hang/delete', row)
            //         .then((res) => {
            //             if(res.data.remove){
            //                 toastr.success('Đã cập nhật giỏ hàng!');
            //                 this.loadCart();
            //             } else{
            //                 toastr.error("Sản phẩm không có trong giỏ hàng!");
            //             }
            //         })
            // }

            toTal(){
                var tong_tien = 0;
                this.dsCart.forEach((value, key) => {
                    tong_tien += value.so_luong * value.don_gia;
                });
                return tong_tien;
            },

            thanhToanMomo(payload) {
                axios
                    .post('/khach-hang/thanh-toan-momo', payload)
                    .then((res) => {
                        if(res.data.status) {
                            window.location.replace(res.data.link);
                        } else if(res.data.donhang == 2){
                            toastr.error(res.data.message);
                        } else if(res.data.donhang == 3){
                            toastr.error(res.data.message);
                        } else if(res.data.donhang == 4){
                            toastr.error(res.data.message);
                        } else {
                            toastr.error("Đã có lỗi khi thanh toán!");
                        }
                    })
                    .catch((res) => {
                        var danh_sach_loi = res.response.data.errors;
                        $.each(danh_sach_loi, function(key, value){
                            toastr.error(value[0]);
                        });
                    })
            },

            createBill(){
                var hinhThucThanhToan = $("#thanhToan").val();
                var diaChi = $("#dia_chi_nhan_hang").val();
                var payload = {
                    'loai_thanh_toan'   : hinhThucThanhToan,
                    'dia_chi_nhan_hang' : diaChi
                }

                if (hinhThucThanhToan == 1) {
                    this.thanhToanMomo(payload);
                } else {
                    axios
                        .post('/khach-hang/tao-don-hang', payload)
                        .then((res) => {
                            if(res.data.donhang == 4){
                                toastr.error(res.data.message);
                            } else if(res.data.donhang == 5){
                                toastr.error(res.data.message);
                            } else if(res.data.donhang == 6){
                                toastr.error(res.data.message);
                            } else if(res.data.donhang == 1){
                                $("#dia_chi_nhan_hang").val('');
                                window.location.replace('/khach-hang/don-hang/thanh-cong');
                                this.loadCart();
                            } else if(res.data.donhang == 2){
                                toastr.error("Giỏ hàng rỗng!");
                            } else{
                                toastr.warning("Vui lòng đăng nhập để mua sản phẩm!");
                            }
                        })
                }
            }
        },
    });
</script>
@endsection
