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


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@yield('scripts')
</html>
