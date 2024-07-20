@extends('layout.user')

@section('content')
    <div class="container box mt-3">
        <div class="box-left">
            <div class="container-fluid">
                <div class="main-top">
                    <div class="dau">
                        <h3 class="m-2">
                            TIN MỚI
                        </h3>
                        <div class="row">
                            @foreach ($tinmoi as $tm)
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100">
                                        <img src="{{ asset('Storage/' . $tm->hinh_anh) }}" class="card-img-top"
                                            alt="..." style="object-fit: cover; height: 200px;">
                                        <div class="card-body d-flex flex-column">
                                            <a href="{{ route('tin.chitiet', ['id' => $tm->id]) }}"
                                                class="text-decoration-none text-black">
                                                <h5 class="card-title">{{ $tm->tieu_de }}</h5>
                                            </a>
                                            <a href="{{ route('tin.chitiet', ['id' => $tm->id]) }}"
                                                class="text-decoration-none text-black">
                                                <p class="card-text">{{ $tm->tom_tat }}</p>
                                            </a>
                                            <div class="mt-auto text-end">
                                                <p class="text-muted">Ngày đăng: {{ $tm->ngay_dang }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="main-bt m-3">
                        <div class="other-news mt-4">
                            <h4 class="mb-4">Các Tin Khác</h4>
                            <div class="row">
                                @foreach ($lq1 as $ct)
                                    <div class="col-md-6 mb-3">
                                        <div class="news-item d-flex align-items-center p-3 border rounded bg-white">
                                            <img src="{{ asset('Storage/' . $ct->hinh_anh) }}" alt="News Image"
                                                class="me-3 rounded" height="80px" width="80px">

                                            <a href="{{ route('tin.chitiet', ['id' => $ct->id]) }}"
                                                class="text-decoration-none text-black">{{ $ct->tieu_de }}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-right ms-2 bg-light p-3 rounded shadow-sm">
            <h5 class="text-center mb-4">Tin hot</h5>
            @foreach ($tintop10 as $top)
                <div class="d-flex align-items-center mb-3 p-2 border-bottom">
                    <div class="me-2">
                        <img src="{{ asset('Storage/' . $top->hinh_anh) }}" alt="News Image" class="me-3 rounded"
                            height="80px" width="80px" style="object-fit: cover">
                    </div>
                    <div class="flex-grow-1">
                        <a href="{{ route('tin.chitiet', ['id' => $top->id]) }}" class="text-decoration-none text-black">
                            <p class="mb-1 summary">{{ $top->tieu_de }}</p>
                        </a>
                        <p class="text-end text-muted mb-0">Lượt xem: {{ $top->luot_xem }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
