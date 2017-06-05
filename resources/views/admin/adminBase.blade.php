<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('meta')
    @include('admin.adminCSS')
</head>
<body>

@include('admin.adminNavbar')
@include('admin.adminSideBar')

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

<footer style="width: 100%">
    @include('footer')
</footer>


</body>
@include('admin.adminJS')
@yield('scripts')
</html>
