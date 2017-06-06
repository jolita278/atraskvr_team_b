<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('meta')
    @include('admin.adminCSS')
</head>
<body>
    <nav>
        @include('admin.adminNavbar')
    </nav>
    <aside>
        @include('admin.adminSideBar')
    </aside>
    <main>
        {{--@yield('pages')--}}
        @yield('adminList')
        @yield('adminResourcesList')
        @yield('adminUpload').
        @yield('adminSingle')
        @yield('adminUsersEdit')
        @yield('adminPagesCreate')
        @yield('adminPagesEdit')

        @yield('adminPagesSingle')
        @yield('adminMenusSingle')

        @yield('adminMenusCreate')
        @yield('adminMenusEdit')


        @yield('adminPagesList')
        @yield('adminOrdersList')
    </main>
    <footer style="width: 100%">
        @include('footer')
    </footer>
</body>
@include('admin.adminJS')
@yield('scripts')
</html>
