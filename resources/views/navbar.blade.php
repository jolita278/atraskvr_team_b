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
                {{--<li><a>Pradinis</a></li>
                <li><a>Apie</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Virtualūs kambariai<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">The Lab</a></li>
                        <li><a href="#">Fruit Ninja</a></li>
                        <li><a href="#">Space Pirate Trainer</a></li>
                        <li><a href="#">Tilt Brush</a></li>
                        <li><a href="#">Merry Snowballs</a></li>
                        <li><a href="#">Samsung Irklavimas</a></li>
                        <li><a href="#">Hurl</a></li>
                        <li><a href="#">Final Goalie: Football Simulator</a></li>
                        <li><a href="#">Project Cars</a></li>
                    </ul>
                </li>
                <li><a>Vieta ir laikas</a></li>
                <li><a>Bilietai</a></li>
                <li><a>Rėmėjai</a></li>--}}
                @foreach($menu_lt as $key => $menus)
                    @foreach($menus['translations'] as $key => $menu)
                        @if($menu['language_id'] == 'lt' && $menus['parent'] == '')
                         <li><a>{{$menu['name']}}</a></li>
                        @endif
                    @endforeach
                @endforeach

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Virtualūs Kambariai<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                @foreach($menu_lt as $key => $value)
                    @if($value['parent'] == 'Virtualūs Kambariai')
                        @foreach($value['translations'] as $key => $val)
                            @if($val['language_id'] == 'lt')
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