@extends('client.master')

@section('content')
<div class="section">
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center order_complete">
                	<i class="fas fa-check-circle"></i>
                    <div class="heading_s1">
                  	<h3>Đơn hàng của bạn đã hoàn thành!</h3>
                    </div>
                  	<p>Cảm ơn bạn đã đặt hàng! Đơn hàng của bạn đang được xử lý và sẽ hoàn thành trong vòng 3-6 giờ. Bạn sẽ nhận được sản phẩm trong thời gian sớm nhất.</p>
                    <a href="/" class="btn btn-fill-out">Tiếp tục mua sắm</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
