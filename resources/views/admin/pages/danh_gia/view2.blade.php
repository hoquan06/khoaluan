@extends('admin.master')
@section('content')
<div class="table-responsive card">
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Danh Sách Sản Phẩm Nhận Đánh Giá Thấp</h5>
            <table class="mb-0 table table-bordered table-hover" id="tableSanPham">
                <thead>
                    <tr>
                        <th class="text-nowrap text-center">#</th>
                        <th class="text-nowrap text-center">Tên Sản Phẩm</th>
                        <th class="text-nowrap text-center">Giá Bán</th>
                        <th class="text-nowrap text-center">Hình Ảnh</th>
                        <th class="text-nowrap text-center">Lượt đánh giá 5*</th>
                        <!-- <th class="text-nowrap text-center">Thao Tác</th> -->
                    </tr>
                </thead>
                <tbody class="text-nowrap text-center">
                        @foreach($data as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->ten_san_pham }}</td>
                                <td>{{ number_format($value->gia_ban) }} VND</td>
                                <td>
                                    <img src="{{ $value->hinh_anh }}" style="height: 50px;">
                                </td>
                                <td>{{ $value->ti_le_sao }}</td>
                                <!-- @if ($value->tinh_trang == 1)
                                    <td>
                                        <button data-id="{{ $value->id }}" class="doiTrangThai btn btn-primary">Đang mở bán</button>
                                    </td>
                                @else
                                <td>
                                    <button data-id="{{ $value->id }}" class="btn btn-danger doiTrangThai">Tạm ngưng</button>
                                </td>
                                @endif -->
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

        $('body').on('click', '.doiTrangThai', function(){
            var id = $(this).data('id');

            var self = $(this);
            $.ajax({
                url         : '/admin/thong-ke-danh-gia/doi-trang-thai/' + id,
                type        : 'get',
                success     : function(res){
                    if(res.doitrangthai){
                        toastr.success("Đổi trạng thái thành công!!!");
                        if(res.tinhtrang){
                            self.html("Đang mở bán");
                            self.removeClass('btn-danger');
                            self.addClass('btn-primary');
                        } else{
                            self.html("Tạm ngưng");
                            self.removeClass('btn-primary');
                            self.addClass('btn-danger');
                        }
                    } else{
                        toastr.error("Danh mục sản phẩm không tồn tại!!!");
                    }
                }
            });
        });
    });
</script>
@endsection

