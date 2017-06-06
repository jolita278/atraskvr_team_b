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
                    @foreach($menus as $key => $menu)
                        @if($menu['children'] == true)
                            <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{$menu['translations_lang']['name']}}<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @foreach($menu['children'] as $key => $child)
                                <li><a href="#">{{$child['translations_lang']['name']}}</a></li>
                                @endforeach
                            </ul>
                            </li>
                        @endif
                        <li><a>{{$menu['translations_lang']['name']}}</a></li>
                    @endforeach
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kalba<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Lietuvių</a></li>
                                <li><a href="#">English</a></li>
                                <li><a href="#">Rusų</a></li>
                            </ul>
                        </li>
                </ul>
            </div>
        </div>
</nav>