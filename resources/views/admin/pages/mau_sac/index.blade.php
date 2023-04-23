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
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body text-center">
                <h5 class="card-title">Danh sách màu mắc</h5>
                <table class="mb-0 table table-bordered table-hover" id="tableDanhMuc">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tên màu sắc</th>
                            <th class="text-center">Mã màu</th>
                        </tr>
                    </thead>
                    <tbody class="text-nowrap text-center">
                        {{-- @foreach ($data as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->ten_danh_muc }}</td>
                                @if ($value->id_danh_muc_cha == 0)
                                    <td>Root</td>
                                @else
                                    <td>{{ $value->ten_danh_muc_cha }}</td>
                                @endif
                                @if ($value->tinh_trang == 0)
                                    <td>
                                        <button data-id="{{ $value->id }}" class="doiTrangThai btn btn-primary">Đang mở bán</button>
                                    </td>
                                @else
                                <td>
                                    <button data-id="{{ $value->id }}" class="btn btn-danger doiTrangThai">Tạm ngưng</button>
                                </td>
                                @endif
                                <td>
                                    <button class="btn btn-success edit" data-idedit="{{ $value->id }}" data-bs-toggle="modal" data-bs-target="#editModal">Chỉnh sửa</button>
                                    <button class="btn btn-primary delete" data-iddelete="{{ $value->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
