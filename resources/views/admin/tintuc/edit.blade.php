@extends('layout.admin')

@section('content')
    <div class="container">
        <div class="taitel">
            <h2 class="text-center pt-4 mb-4">SỬA TIN TỨC</h2>
        </div>
        <form action="{{ route('tintuc.update', $tintuc->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <div class="col">
                    <label for="startPoint" class="form-label">Tiêu Đề</label>
                    <input type="text" class="form-control" id="" name="tieu_de" value="{{ $tintuc->tieu_de }}">
                </div>
            </div>
            <div class="mb-3">
                <div class="col">
                    <label for="startPoint" class="form-label">Nội Dung</label>
                    <textarea name="noi_dung" id="noi_dung" class="form-control" placeholder="Nhập nội dung..." cols="20"
                        rows="5">{{ $tintuc->noi_dung }}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <div class="col">
                    <label for="startPoint" class="form-label">Hình Ảnh</label>
                    Ảnh trước đó: <img src="{{ asset('storage/' . $tintuc->hinh_anh) }}" alt=""
                        style="height: 100px; width: 100px;"></td>
                    <input type="file" class="form-control" id="" name="hinh_anh">
                </div>
            </div>
            <div class="mb-3">
                <div class="col">
                    <label for="startPoint" class="form-label">Tóm Tắt</label>
                    <input type="text" class="form-control" id="" name="tom_tat" value="{{ $tintuc->tom_tat }}">
                </div>
            </div>
            <div class="mb-3">
                <div class="col">
                    <label for="startPoint" class="form-label">Ngày Đăng</label>
                    <input type="date" class="form-control" id="" name="ngay_dang"
                        value="{{ $tintuc->ngay_dang }}">
                </div>
            </div>
            <div class="mb-3">
                <div class="col">
                    <label for="danh_muc" class="form-label">Danh Mục Tin Tức:</label>
                    <select name="danh_muc" id="danh_muc" class="form-control">
                        @foreach ($danhmuc as $tes)
                            <option {{ $tes->id === $tintuc->danh_muc_id ? 'selected' : '' }} value="{{ $tes->id }}">
                                {{ $tes->ten_danh_muc }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="pb-3">
                <button type="submit" class="btn btn-success">Sửa TIN TỨC</button>
            </div>
        </form>
    </div>
@endsection
