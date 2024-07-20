@extends('layout.admin')

@section('content')
    <div class="container">

        <div class="taitel">
            <h2 class="text-center pt-4 mb-4">Danh Sách Bình Luận</h2>
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
                        <td>TÊN </td>
                        <td>NỘI DUNG</td>
                        <td>TIN TUC</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tintucs as $index => $tt)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="truncate">{{ $tt->ten_nguoi_dung }}</td>
                            <td>{{ $tt->binh_luan }}</td>
                            <td>{{ $tt->tin_tuc_id }}</td>
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
