@extends('admin.master')

@section('content')
<div class="col-md-12">
    <div class="main-card mb-3 git card">
        <div class="card-body"> <h5 class="card-title">Thêm Mới Sản Phẩm</h5>
            <form class="" id="formCreate">
                <div class="row">
                    <div class="col-md-5">
                        <div class="position-relative form-group">
                            <label>Tên Sản Phẩm</label>
                            <input id="ten_san_pham" placeholder="Nhập vào tên sản phẩm" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="position-relative form-group">
                            <label>Slug Sản Phẩm</label>
                            <input id="slug_san_pham" placeholder="Nhập vào slug sản phẩm" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <label>Số lượng</label>
                            <input id="slug_san_pham" placeholder="Nhập vào số lượng sản phẩm" type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label>Giá Bán</label>
                            <input id="gia_ban" placeholder="Nhập vào giá bán" type="number" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label>Giá Khuyến Mãi</label>
                            <input id="gia_khuyen_mai" placeholder="Nhập vào giá khuyến mãi" type="number" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label>Ảnh Đại Diện</label>
                            <div class="input-group">
                                <input id="anh_dai_dien" name="anh_dai_dien" class="form-control" type="text">
                                <input type="button" class="btn-info lfm" data-input="anh_dai_dien" data-preview="holder" value="Chọn ảnh">
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;">
                        </div>
                    </div>
                </div>

                <div class="position-relative form-group">
                    <label>Mô Tả Ngắn</label>
                    <textarea class="form-control" id="mo_ta_ngan" cols="30" rows="5" placeholder="Nhập vào mô tả ngắn"></textarea>
                </div>
                <div class="position-relative form-group">
                    <label>Mô Tả Chi Tiết</label>
                    <input name="mo_ta_chi_tiet" id="mo_ta_chi_tiet" placeholder="Nhập vào mô tả chi tiết" type="text" class="form-control">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label>Danh Mục</label>
                            <select id="id_danh_muc" class="form-control">
                                {{-- @foreach ($list_danh_muc as $value)
                                    <option value={{$value->id}}> {{ $value->ten_danh_muc }} </option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label>Tình Trạng</label>
                            <select id="is_open" class="form-control">
                                <option value=1>Đang Mở Bán</option>
                                <option value=0>Đóng Sản Phẩm</option>
                            </select>
                        </div>
                    </div>
                </div>

                <button class="mt-1 btn btn-primary" id="createSanPham">Thêm Mới Sản Phẩm</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
