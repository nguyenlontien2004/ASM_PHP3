@extends('layout.user')

@section('content')
    <div class="container bg-white mt-3">

        <div class="ct-ct">
            <h3 class="fw-bold m-4 pt-3">{{ $tintuc->tieu_de }}</h3>

            <div class="img text-center mb-3">
                <img src="{{ asset('Storage/' . $tintuc->hinh_anh) }}" alt="News Image" height="250px">
            </div>
            <div class="conten">
                <p>{!! nl2br(e($tintuc->noi_dung)) !!}</p>
            </div>
            <div class="gio me-5">
                <p class="text-muted text-end">Ngày đăng: {{ $tintuc->ngay_dang }}</p>
                <p class="text-muted text-end">Lượt xem: {{ $tintuc->luot_xem }}</p>
            </div>
        </div>
        <div class="container mt-5">

            <div class="m-4">
                <h3> Bình luận</h3>
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('binhluan.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tin_tuc_id" value="{{ $tintuc->id }}">
                    <div class="mb-3">
                        <label for="userName" class="form-label">Tên của bạn</label>
                        <input type="text" class="form-control" id="" name="ten_nguoi_dung"
                            placeholder="Nhập tên của bạn">
                    </div>
                    <div class="mb-3">
                        <label for="commentText" class="form-label">Nội dung bình luận</label>
                        <textarea class="form-control" id="commentText" name="binh_luan" rows="3" placeholder="Nhập nội dung bình luận"></textarea>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Gửi Bình luận</button>
                    </div>
                </form>
            </div>
            @foreach ($binhluan as $bl)
                <div class="media m-4 border p-3 rounded shadow-sm">
                    <div class="d-flex align-items-start">
                        <img src="https://via.placeholder.com/50" class="mr-3 rounded-circle" alt="User Avatar">
                        <div class="media-body ms-3">
                            <h5 class="mt-0">{{ $bl->ten_nguoi_dung }}</h5>
                            <p>{{ $bl->binh_luan }}</p>
                            <p class="text-muted small">Ngày:
                                {{ \Carbon\Carbon::parse($bl->created_at)->timezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
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

        <div class="container mt-5">
            <div class="other-news mt-4">
                <h4 class="mb-4">Các Tin Khác</h4>
                <div class="row">
                    @foreach ($lq1 as $lq)
                        <div class="col-md-6 mb-3">
                            <div class="news-item d-flex align-items-center p-3 border rounded bg-white">
                                <img src="{{ asset('storage/' . $lq->hinh_anh) }}" alt="News Image" class="me-3 rounded"
                                    height="80px" width="80px">
                                <a href="{{ route('tin.chitiet', ['id' => $lq->id]) }}"
                                    class="text-decoration-none">{{ $lq->tieu_de }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
