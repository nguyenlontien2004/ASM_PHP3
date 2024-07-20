@extends('layout.admin')

@section('content')
    <div class="container">
        <div class="taitel">
            <h2 class="text-center pt-4 mb-4">Thêm Danh Mục</h2>
        </div>
        <form action="{{ route('danhmuc.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <div class="col">
                    <label for="startPoint" class="form-label">Tên Danh Mục</label>
                    <input type="text" class="form-control" id="" name="tendanhmuc"
                        placeholder="Nhập tên danh mục...">
                </div>
            </div>

            <div class="pb-3">
                <button type="submit" class="btn btn-success">Thêm Danh Mục</button>
            </div>
        </form>
    </div>
@endsection
