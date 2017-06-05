<nav class="navbar navbar-default" style="background-color: #31b0d5">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><b>NavBar</b></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                @foreach($menu_lt as $key => $menus)
                    @foreach($menus['translations'] as $key => $menu)
                        @if($menu['language_id'] == app()->getLocale() && $menus['parent'] == '')
                         <li><a>{{$menu['name']}}</a></li>
                        @endif

                    @endforeach
                @endforeach

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{trans('app.dropdown_virtual_rooms')}}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                @foreach($menu_lt as $key => $value)
                    @if($value['parent'] == 'Virtualūs Kambariai')
                        @foreach($value['translations'] as $key => $val)
                            @if($val['language_id'] == app()->getLocale())
                                <li><a href="#">{{$val['name']}}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                    </ul>


            </ul>
            <form class="navbar-form navbar-left">
                <div>
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @if (Auth::check())
                                <a href="{{ url('/home') }}">Home</a>
                            @else
                                <a href="{{ url('/login') }}">Login</a>
                                <a href="{{ url('/register') }}">Register</a>
                            @endif
                        </div>
                @endif
                </div>
            </form>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>