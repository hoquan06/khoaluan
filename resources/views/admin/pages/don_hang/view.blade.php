@extends('admin.master')
@section('content')
<div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body text-center"><h5 class="card-title"> Đơn Hàng</h5>
                <table class="mb-0 table table-bordered table-hover" id="tableDanhMuc">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tên Đơn Hàng</th>
                            <th class="text-center">Mã Đơn Hàng</th>
                            <th class="text-center">Ngày Đặt Hàng</th>
                            <th class="text-center">Giá Trị Đơn Hàng</th>
                            <th class="text-center">Tình Trạng</th>
                        </tr>
                    </thead>
                    <tbody class="text-nowrap text-center">
                        <tr> 
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>                     
                            <td>6</td>                     
                        </tr>                      
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