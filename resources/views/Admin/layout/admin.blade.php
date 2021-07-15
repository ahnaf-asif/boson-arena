<!DOCTYPE html>
<html lang="en">
<head>
    @include('Admin.includes.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('Admin.includes.navbar')

        @include('Admin.includes.sidebar')

        <div class="content-wrapper">
            <div class="py-3 px-2 my-2" style="border: 1px solid rgba(0,0,0,.125);background: white;border-top: none;border-right: none;">
                <div class="container">
                    <h1 class="font-weight-bold">
                        @yield('heading')
                    </h1>
                </div>
            </div>
            @yield('content')
        </div>
        @include('Admin.includes.footer')
    </div>
    @include('Admin.includes.scripts')
</body>
</html>
