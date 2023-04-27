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
                            <label class="form-label" for="basic-default-name">Sản phẩm</label>
                            <select id="danh_muc_id" name="loai_chuong_trinh" class="select2 form-select select2-hidden-accessible">
                                @foreach($menuCon as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->ten_danh_muc }}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="text-center">
                        <button class="mt-1 btn btn-primary" type="button" id="themMoi">Thêm Mới Khuyến Mãi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive card">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Danh Sách Các Mặt Hàng Khuyến Mãi</h5>
                <table class="mb-0 table table-bordered table-hover" id="tableSanPham">
                    <thead>
                        <tr>
                            <th class="text-nowrap text-center">#</th>
                            <th class="text-nowrap text-center">Tên Chương Trình</th>
                            <th class="text-nowrap text-center">Loại Sản Phẩm</th>
                            <th class="text-nowrap text-center">Mức Giảm</th>
                            <th class="text-nowrap text-center">Thời gian bắt đầu</th>
                            <th class="text-nowrap text-center">Thời gian kết thúc</th>
                        </tr>
                    </thead>
                    <tbody class="text-nowrap text-center">
                        @foreach($dsKhuyenMai as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->ten_chuong_trinh }}</td>
                                <td>{{ $value->ten_danh_muc}}</td>
                                <td>{{ number_format($value->muc_giam) }} VND</td>
                                <td>{{ $value->thoi_gian_bat_dau }}</td>                      
                                <td>{{ $value->thoi_gian_ket_thuc }}</td>                      
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                    'muc_giam'            : $("#muc_giam").val(),
                    'danh_muc_id'         : $("#danh_muc_id").val(),
                    'thoi_gian_bat_dau'   : $("#thoi_gian_bat_dau").val(),
                    'thoi_gian_ket_thuc'  : $("#thoi_gian_ket_thuc").val(),
                };
                var id = $("#danh_muc_id").val();
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
