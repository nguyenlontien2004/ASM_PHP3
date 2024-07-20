<div class="accordion mt-3" id="menuAccordion">
    <div class="menu text-center">
        <div class="vertical-menu">
            <div class="menu1  border-1 border-bottom ">
                <a href="#menu1" data-bs-toggle="collapse">Danh Mục</a>
                <div id="menu1" class="collapse border-1 border-bottom">
                    <a class=" border-1 border-bottom " href="{{ route('danhmuc.trangchu') }}">Danh
                        Sách
                        Danh Mục</a>
                    <a class=" border-1 border-bottom " href="{{ route('danhmuc.create') }}">Thêm
                        Danh
                        Mục
                    </a>

                </div>
            </div>
            <div class="menu2  border-1 border-bottom ">
                <a href="#menu2" data-bs-toggle="collapse">Tin Tức</a>
                <div id="menu2" class="collapse border-1 border-bottom">
                    <a class=" border-1 border-bottom " href="{{ route('tintuc.trangchu') }}">Danh
                        Sách
                        Tin Tức</a>
                    <a class=" border-1 border-bottom " href="{{ route('tintuc.create') }}">Thêm
                        Tin Tức</a>

                </div>
            </div>
            <div class="menu3  border-1 border-bottom ">
                <a href="#menu3" data-bs-toggle="collapse">Bình Luận</a>
                <div id="menu3" class="collapse border-1 border-bottom">
                    <a class=" border-1 border-bottom " href="{{ route('binhluan.trangchu') }}">Danh
                        Sách
                        Bình Luận</a>
                </div>
            </div>

        </div>
    </div>
</div>
