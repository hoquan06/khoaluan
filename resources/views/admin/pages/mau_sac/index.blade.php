@extends('admin.master')

@section('content')
<div class="row">
    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Thêm mới màu sắc</h4>
            </div>
            <div class="card-body">
                <form id="jquery-val-form" novalidate="novalidate">
                    <div class="mb-1">
                        <label class="form-label" for="basic-default-name">Tên màu</label>
                        <input type="text" class="form-control" id="ten_mau" name="ten_mau" placeholder="Nhập vào tên màu sắc">
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="basic-default-name">Mã màu</label>
                        <input type="text" class="form-control" id="ma_mau" name="ma_mau" placeholder="Nhập vào mã màu sắc">
                    </div>
                    <div class="text-center">
                        <button type="submit" id="themMoi" class="btn btn-primary waves-effect waves-float waves-light">Thêm mới màu sắc</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
