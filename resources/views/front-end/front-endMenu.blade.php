<nav class="navbar navbar-default" >
   {{-- <div class="container-fluid">--}}
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse" >
            <div id="menu">
                <ul class="nav navbar-nav">
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
                            </li>
                </ul>
            </div>
        </div>
</nav>