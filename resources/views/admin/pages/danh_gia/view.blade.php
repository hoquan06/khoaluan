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
                        <th class="text-nowrap text-center">Số lần được đánh giá 5*</th>
                        <th class="text-nowrap text-center">Số lần được đánh giá 4*</th>
                    </tr>
                </thead>
                <tbody class="text-nowrap text-center">

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection