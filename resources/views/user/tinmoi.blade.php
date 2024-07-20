@extends('layout.user')

@section('content')
    <div class="container mt-3">
        <div class="content_tk">
            <div class="tt pt-3 ps-3">
                <h3>Tin Mới Nhất</h3>
            </div>
            <div class="row m-3">
                @foreach ($data as $dmt)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 d-flex flex-column">
                            <img src="{{ asset('Storage/' . $dmt->hinh_anh) }}" class="card-img-top" alt="..."
                                style="object-fit: cover; height: 250px;">
                            <div class="card-body d-flex flex-column flex-grow-1">
                                <a href="{{ route('tin.chitiet', ['id' => $dmt->id]) }}" class="text-decoration-none mb-2">
                                    <h5 class="card-title mb-2">{{ $dmt->tieu_de }}</h5>
                                </a>
                                <p class="card-text mb-2 flex-grow-1">{{ $dmt->tom_tat }}</p>
                                <p class="text-end text-muted mb-0">Ngày đăng: {{ $dmt->ngay_dang }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
