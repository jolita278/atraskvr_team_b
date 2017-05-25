<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <link href="/css/app.css" rel=stylesheet>

</head>
<body style="background-color:lightblue">

@yield('adminUsersList')
@yield('adminUsersSingle')
@yield('adminUsersEdit')
@yield('adminPagesList')
@yield('adminPagesSingle')
@yield('adminPagesEdit')



</body>

</html>
