@extends('layout.admin')

@section('content')
    <div class="container">
        <div class="taitel">
            <h2 class="text-center pt-4 mb-4">THÊM TIN TỨC</h2>
        </div>
        <form action="{{ route('tintuc.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <div class="col">
                    <label for="startPoint" class="form-label">Tiêu Đề</label>
                    <input type="text" class="form-control" id="" name="tieu_de" placeholder="Nhập tiêu đề...">
                </div>
            </div>
            <div class="mb-3">
                <div class="col">
                    <label for="startPoint" class="form-label">Nội Dung</label>
                    <textarea name="noi_dung" id="noi_dung" class="form-control" placeholder="Nhập nội dung..." cols="25"
                        rows="5"></textarea>
                </div>
            </div>
            <div class="mb-3">
                <div class="col">
                    <label for="startPoint" class="form-label">Hình Ảnh</label>
                    <input type="file" class="form-control" id="" name="hinh_anh">
                </div>
            </div>
            <div class="mb-3">
                <div class="col">
                    <label for="startPoint" class="form-label">Tóm Tắt</label>
                    <textarea name="tom_tat" id="" class="form-control" placeholder="Nhập tóm tắt..." cols="25"
                        rows="5"></textarea>
                </div>
            </div>
            <div class="mb-3">
                <div class="col">
                    <label for="startPoint" class="form-label">Ngày Đăng</label>
                    <input type="date" class="form-control" id="" name="ngay_dang">
                </div>
            </div>
            <div class="mb-3">
                <div class="col">
                    <label for="danh_muc" class="form-label">Danh Mục Tin Tức:</label>
                    <select name="danh_muc" id="danh_muc" class="form-control">
                        @foreach ($danhmuc as $tes)
                            <option value="{{ $tes->id }}">{{ $tes->ten_danh_muc }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="pb-3">
                <button type="submit" class="btn btn-success">THÊM TIN TỨC</button>
            </div>
        </form>
    </div>
@endsection
