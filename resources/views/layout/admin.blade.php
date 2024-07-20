<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.partials.head')
</head>

<body ng-app="myRoute">

    <div class="container-fluid">
        <!-- Header -->
        @include('admin.partials.header')
        <!-- Main -->
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-md-3">
                    @include('admin.partials.nav')
                </div>
                <!-- Cột bên phải -->
                <div class="col-md-9">
                    <div class="content">
                        <div class="container">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer text-center mt-4">
            @include('admin.partials.footer')
        </footer>
    </div>
</body>

</html>
