@extends('admin.master')
@section('content')
<div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body text-center"><h5 class="card-title"> Đơn Hàng</h5>
                <table class="mb-0 table table-bordered table-hover" id="tableDanhMuc">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tên Sản Phẩm</th>
                            <th class="text-center">Số Lượng</th>
                            <th class="text-center">Đơn Giá</th>
                            <th class="text-center">Tiền Giảm Giá</th>
                            <th class="text-center">Thực Trả</th>
                            <th class="text-center">Tổng Tiền</th>
                            <th class="text-center">Loại Thanh Toán</th>
                        </tr>
                    </thead>
                    <tbody class="text-nowrap text-center">
                        
                    </tbody>
                </table>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <span>Tổng tiền khách hàng cần thanh toán :
                                <span>1</span> 
                            </span>
                            <br/>
                            <a href="/admin/don-hang/index" class="btn btn-danger">Đóng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection