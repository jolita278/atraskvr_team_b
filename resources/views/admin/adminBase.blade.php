<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>

   @include('meta')

</head>
<body style="background-color:lightblue">

@include('admin.adminNavbar')
@include('admin.adminSideB')

@yield('pages')
@yield('adminList')
@yield('adminResourcesList')
@yield('adminUpload')
@yield('adminSingle')
@yield('adminUsersEdit')
@yield('adminPagesCreate')
@yield('adminPagesEdit')

@yield('adminPagesSingle')
{{--@yield('adminMenusSingle')--}}

@yield('adminMenusCreate')
@yield('adminMenusEdit')


{{--@yield('adminPagesList')--}}
@yield('adminOrdersList')


@include('footer')

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@yield('scripts')

</html>
