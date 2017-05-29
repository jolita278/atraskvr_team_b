<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
   @include('meta')
</head>
<body style="background-color:lightblue">
@include('navbar')
@include('header')
@yield('pages')



</body>

</html>
