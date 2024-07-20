@extends('layout.user')

@section('content')
    <div class="container mt-3">
        <div class="content_tk">
            <div class="tt pt-3 ps-3">
                <h3>Danh Mục Tin : {{ $kq->ten_danh_muc }}</h3>
            </div>
            <div class="row m-3">
                @foreach ($data as $dmt)
                    <div class="col-3">
                        <div class="card mb-3">
                            <img src="{{ asset('Storage/' . $dmt->hinh_anh) }}" class="card-img-top" alt="..."
                                height="250px" width="250px">
                            <div class="card-body">
                                <a href="{{ route('tin.chitiet', ['id' => $dmt->id]) }}" class="text-decoration-none">
                                    <h5 class="card-title">{{ $dmt->tieu_de }}</h5>
                                </a>
                                <p class="card-text">{{ $dmt->tom_tat }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
