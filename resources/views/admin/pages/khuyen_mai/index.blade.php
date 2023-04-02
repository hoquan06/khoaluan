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
                                <label>Mức Giảm(*)</label>
                                <input id="muc_giam" placeholder="Nhập vào mức giảm" type="text" class="form-control">
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
                            <label class="form-label" for="basic-default-name">Áp dụng cho</label>
                            <select id="loai_ap_dung" name="loai_chuong_trinh" class="select2 form-select select2-hidden-accessible">
                                @foreach($menuCha as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->ten_danh_muc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label" for="basic-default-name">Sản phẩm</label>
                            <select id="san_pham_giam" name="loai_chuong_trinh" class="select2 form-select select2-hidden-accessible">
                                @foreach($menuCon as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->ten_danh_muc }}</option>
                                @endforeach
                            </select>
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
@section('js')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#themMoi").click(function(e){
                e.preventDefault();
                var payload = {
                    'ten_chuong_trinh'    : $("#ten_chuong_trinh").val(),
                    'san_pham_giam'       : $("#san_pham_giam").val(),
                    'thoi_gian_bat_dau'   : $("#thoi_gian_bat_dau").val(),
                    'thoi_gian_ket_thuc'  : $("#thoi_gian_ket_thuc").val(),
                    'loai_ap_dung'        : $("#loai_ap_dung").val(),
                    'muc_giam'            : $("#muc_giam").val(),
                };

                $.ajax({
                    url     : '/admin/khuyen-mai/index',
                    type    : 'post',
                    data    : payload,
                    success : function(res){
                        toastr.success("Thêm mới chương trình khuyến mãi thành công!!!");
                    },
                    error   : function(res){;
                        var danh_sach_loi = res.responseJSON.errors;
                        $.each(danh_sach_loi, function(key, value){
                            toastr.error(value[0]);
                        });
                    },
                });
            });
        });
    </script>
@endsection