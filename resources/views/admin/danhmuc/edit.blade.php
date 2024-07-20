@extends('layout.admin')

@section('content')
    <div class="container">
        <div class="taitel">
            <h2 class="text-center pt-4 mb-4">Sửa Danh Mục</h2>
        </div>
        <form action="{{ route('danhmuc.update', $danhmuc->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <div class="col">
                    <label for="startPoint" class="form-label">Tên Danh Mục</label>
                    <input type="text" class="form-control" id="" name="tendanhmuc"
                        value="{{ $danhmuc->ten_danh_muc }}">
                </div>
            </div>

            <div class="pb-3">
                <button type="submit" class="btn btn-success">Sửa Danh Mục</button>
            </div>
        </form>
    </div>
@endsection
