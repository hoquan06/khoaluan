@extends('client.master')

@section('content')
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Yêu thích</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Yêu thích</li>
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
                    <div class="table-responsive wishlist_table">
                        <table class="table text-nowrap text-center">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Tên sản phẩm</th>
                                    <th class="product-price">Giá bán</th>
                                    <th class="product-stock-status">Tình trạng</th>
                                    <th class="product-add-to-cart"></th>
                                    <th class="product-remove">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, key) in list">
                                    <tr>
                                        <td class="product-thumbnail"><a href="#"><img v-bind:src="value.hinh_anh" alt="product1"></a></td>
                                        <td class="product-name" data-title="Product"><a href="#">@{{value.ten_san_pham}}</a></td>
                                        <td class="product-price" data-title="Price">@{{numberFormat(value.don_gia)}}</td>
                                        <td class="product-stock-status" data-title="Stock Status"><span class="badge badge-pill badge-success">Còn hàng</span></td>
                                        <td class="product-add-to-cart" v-on:click="addToCart()" :data-id="value.san_pham_id"><a class="btn btn-fill-out" :data-id="value.san_pham_id"><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</a></td>
                                        <td class="product-remove" data-title="Remove"><a><i :data-id='value.id' v-on:click="removeTable(value)" class="ti-close"></i></a></td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        var app = new Vue({
            el              : '#app',
            data            : {
                list        : [],
            },
            created(){
                this.loadTable();
            },
            methods:{
                loadTable(){
                    axios
                        .get('/khach-hang/yeu-thich/data')
                        .then((res) => {
                            this.list = res.data.yeuthich;
                        })
                },
                numberFormat(number){
                    return  Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number);
                },
                removeTable(row){
                    var idRemove = event.target.getAttribute('data-id');

                    axios
                        .get('/khach-hang/yeu-thich/delete/' + idRemove, row)
                        .then((res) => {
                            if(res.data.xoa){
                                toastr.success("Đã bỏ yêu thích sản phẩm này!");
                                this.loadTable();
                            } else{
                                toastr.warning("Sản phẩm không tồn tại!");
                            }
                        })
                },
                addToCart(){
                    var san_pham_id = event.target.getAttribute('data-id');
                    var payload = {
                        'san_pham_id'       : san_pham_id,
                        'so_luong'          : 1,
                    };
                    axios
                        .post('/khach-hang/gio-hang', payload)
                        .then((res) => {
                            if(res.data.giohang){
                                toastr.success("Đã thêm vào giỏ hàng!");
                            } else{
                                toastr.error("Vui lòng đăng nhập để sử dụng chức năng này!!!");
                            }
                        });
                }
            }
        });
    </script>
@endsection
