@extends('admin.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive card">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Danh sách sản phẩm chưa có lượt mua</h5>
                    <table class="mb-0 table table-bordered table-hover" id="tableSanPham">
                        <thead>
                            <tr>
                                <th class="text-nowrap text-center">#</th>
                                <th class="text-nowrap text-center">Tên Sản Phẩm</th>
                                <th class="text-nowrap text-center">Giá Bán</th>
                                <th class="text-nowrap text-center">Giá Khuyến Mãi</th>
                                <th class="text-nowrap text-center">Ảnh đại diện</th>
                                <th class="text-nowrap text-center">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody class="text-nowrap text-center">
                            @foreach ($spChuaBanDuoc as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->ten_san_pham }}</td>
                                    <td>{{ number_format($value->gia_ban) }} VND </td>
                                    <td>{{ number_format($value->gia_khuyen_mai) }} VND</td>
                                    <td> <img src="{{ $value->hinh_anh }}" style="height: 50px;"> </td>
                                    @if ($value->tinh_trang == 1)
                                        <td>
                                            <button data-id="{{ $value->id }}" class="doiTrangThai btn btn-primary">Mở bán</button>
                                        </td>
                                    @else
                                        <td>
                                            <button data-id="{{ $value->id }}" class="btn btn-danger doiTrangThai">Tạm ngưng</button>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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

            $('body').on('click', '.doiTrangThai', function(){
            var idSanPham = $(this).data('id');
            console.log(idSanPham)
            var self = $(this);
            $.ajax({
                url             : '/admin/thong-ke/thay-doi-tinh-trang/' + idSanPham,
                type            : 'get',
                success         : function(res){
                    if(res.doitrangthai){
                        toastr.success("Đổi trạng thái thành công!!!");
                        if(res.tinhtrang){
                            self.html('Mở bán');
                            self.removeClass('btn-danger');
                            self.addClass('btn-primary');
                        } else{
                            self.html('Tạm ngưng');
                            self.removeClass('btn-primary');
                            self.addClass('btn-danger');
                        }
                    } else{
                        toastr.error("Co loi!!!");
                    }
                },
            });
        });
        });
    </script>
@endsection


