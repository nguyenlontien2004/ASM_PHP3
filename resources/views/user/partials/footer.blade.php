<div class="container p-4">
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Tin Tức</h5>
            <p>Cập nhật tin tức mới nhất trong ngày.</p>
        </div>

        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Liên Hệ</h5>
            <p>Email: contact@tintuc.com</p>
            <p>Điện thoại: (123) 456-7890</p>
        </div>
        @php
            $menu = DB::table('danh_muc_tin_tucs')->select('id', 'ten_danh_muc')->orderBy('id')->get();
        @endphp
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Liên Kết Nhanh</h5>
            <ul class="nav flex-column">
                <a class="nav-link text-black" aria-current="page" href="{{ route('user.trangchu') }}">Trang
                    Chủ</a>
                @foreach ($menu as $mn)
                    <li class="nav-item">
                        <a class="nav-link text-black"
                            href="{{ url('/tin-loai', [$mn->id]) }}">{{ $mn->ten_danh_muc }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="text-center p-3 bg-light">
    <a href="#" class="text-dark me-4"><i class="fab fa-facebook-f"></i></a>
    <a href="#" class="text-dark me-4"><i class="fab fa-twitter"></i></a>
    <a href="#" class="text-dark me-4"><i class="fab fa-instagram"></i></a>
    <a href="#" class="text-dark me-4"><i class="fab fa-linkedin"></i></a>
</div>
<div class="text-center p-3 bg-dark text-white">
    © 2024 Tin Tức.
</div>
