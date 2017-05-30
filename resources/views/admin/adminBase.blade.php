<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>

   @include('meta')

</head>
<body style="background-color:lightblue">

@include('admin.adminNavbar')
@include('admin.adminSideB')

@yield('pages')
@yield('adminUsersList')
@yield('adminLanguagesList')
@yield('adminList')
@yield('adminUsersSingle')
@yield('adminUsersEdit')
@yield('adminUpload')
@yield('adminResourcesList')
@yield('adminPagesList')
@yield('adminOrdersList')
@yield('adminPagesSingle')
@yield('adminPagesEdit')
@yield('adminPagesCreate')
@yield('adminMenusCreate')
@yield('adminMenusSingle')
@yield('adminMenusEdit')

@include('footer')

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@yield('scripts')

</html>
