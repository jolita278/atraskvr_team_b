<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <link href="/css/app.css" rel=stylesheet>

</head>
<body style="background-color:lightblue">

@yield('pages')
@yield('adminUsersList')
@yield('adminUsersSingle')
@yield('adminUsersEdit')
@yield('adminUpload')
@yield('adminResourcesList')



</body>

</html>
