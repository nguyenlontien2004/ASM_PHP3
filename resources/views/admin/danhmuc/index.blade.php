@extends('layout.admin')

@section('content')
    <div class="container">

        <div class="taitel">
            <h2 class="text-center pt-4 mb-4">Danh sách danh mục</h2>
        </div>
        <div class="conten pb-3 ">
            <div class="tb m-2 text-center">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>Thao tác:</strong> {{ session('success') }}
                    </div>
                @endif
            </div>
            <table class="text-center table table-bordered table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>TÊN DANH MỤC</td>
                        <td>HÀNH ĐỘNG</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $index => $danhmuc)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $danhmuc->ten_danh_muc }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('danhmuc.edit', $danhmuc->id) }}"><button
                                            class="btn btn-warning me-2">Sửa</button></a>
                                    <form action="{{ route('danhmuc.destroy', $danhmuc->id) }}" method="POST">
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
        </div>
        <center>
            <div class="pation align-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous" ng-click="prev()">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next" ng-click="next()">
                                <span aria-hidden=" true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </center>
    </div>
@endsection
