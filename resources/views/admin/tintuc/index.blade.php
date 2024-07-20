@extends('layout.admin')

@section('content')
    <div class="container">

        <div class="taitel">
            <h2 class="text-center pt-4 mb-4">Danh Sách Tin Tức</h2>
        </div>
        <div class="conten pb-3 ">
            <div class="tb m-2 text-center">
                @if (session('success'))
                    <div class="alert alert-success">
                        <strong>Thao tác:</strong> {{ session('success') }}
                    </div>
                @endif
            </div>
            <table class="text-center table table-bordered table-striped align-items-center">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>TIÊU ĐỀ</td>
                        <td>HÌNH ẢNH</td>
                        <td>LƯỢT XEM</td>
                        <td>NGÀY ĐĂNG</td>
                        <td>DANH MỤC</td>
                        <td>HÀNH ĐỘNG</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tintucs as $tt)
                        <tr>
                            <td>{{ $tt->id }}</td>
                            <td class="truncate">{{ $tt->tieu_de }}</td>
                            <td><img src="{{ asset('storage/' . $tt->hinh_anh) }}" alt=""
                                    style="height: 100px; width: 100px;"></td>
                            <td>{{ $tt->luot_xem }}</td>
                            <td>{{ $tt->ngay_dang }}</td>
                            <td>{{ $tt->ten_danh_muc }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('tintuc.show', $tt->id) }}"><button class="btn btn-warning me-2">Chi
                                            tiết</button></a>
                                    <a href="{{ route('tintuc.edit', $tt->id) }}"><button
                                            class="btn btn-warning me-2">Sửa</button></a>
                                    <form action="{{ route('tintuc.destroy', $tt->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <center>
                <div class="pation align-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            {{ $tintucs->links() }}
                        </ul>
                    </nav>
                </div>
            </center>
        </div>


    </div>
@endsection
