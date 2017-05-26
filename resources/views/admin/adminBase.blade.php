<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <link href="/css/app.css" rel=stylesheet>
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        textarea {
            resize: none;
        }
    </style>
</head>
<body style="background-color:lightblue">

@include('admin.adminNavbar')
@include('admin.adminSideB')

@yield('pages')
@yield('adminUsersList')
@yield('adminUsersSingle')
@yield('adminUsersEdit')
@yield('adminUpload')
@yield('adminResourcesList')
@yield('adminPagesList')
@yield('adminPagesSingle')
@yield('adminPagesEdit')
@yield('adminPagesCreate')


@include('footer')

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@yield('scripts')

</html>
