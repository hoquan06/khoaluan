@extends('admin.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 git card">
            <div class="card-body"> <h5 class="card-title">Thêm Mới Khuyến Mãi</h5>
                <form class="" id="formCreate">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="position-relative form-group">
                                <label>Tên Chương Trình(*)</label>
                                <input id="ten_chuong_trinh" placeholder="Nhập vào tên chương trình " type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="position-relative form-group">
                                <label>Sản Phẩm Giảm(*)</label>
                                <input id="san_pham_giam" placeholder="Nhập vào tên sản phẩm giảm" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="position-relative form-group">
                                <label>Thời Gian Bắt Đầu(*)</label>
                                <input id="thoi_gian_bat_dau" placeholder="Nhập vào thời gian bắt đầu" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="position-relative form-group">
                                <label>Thời Gian Kết Thúc(*)</label>
                                <input id="thoi_gian_ket_thuc" placeholder="Nhập vào thời gian kết thúc" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="basic-default-name">Loại Chương Trình(*)</label>
                            <select id="loai_chuong_trinh" name="loai_chuong_trinh" class="select2 form-select select2-hidden-accessible">
                                <option value="1">Giảm theo %</option>
                                <option value="0">Giảm theo số tiền</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="position-relative form-group">
                                <label>Mức Giảm(*)</label>
                                <input id="muc_giam" placeholder="Nhập vào mức giảm" type="text" class="form-control">
                            </div>
                        </div>   
                    <div class="text-center">
                        <button class="mt-1 btn btn-primary" id="themMoi">Thêm Mới Khuyến Mãi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection