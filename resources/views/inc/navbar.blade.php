


<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Projekt Dyplomowy</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li @if (\Request::is('/'))
                class="nav-item active"
                @else
                class="nav-item"
                @endif
                >
                <a class="nav-link" href="/">Home</a>
            </li>
            @if(!Auth::guest())
            <li @if (\Request::is('posts'))
                class="nav-item active"
                @else
                class="nav-item"
                    @endif
            >
                <a class="nav-link" href="/posts">Informacje</a>
            </li>
            <li @if (\Request::is('cam'))
                class="nav-item active"
                @else
                class="nav-item"
                @endif
            >
                <a class="nav-link" href="/cam">Kamera</a>
            </li>
            <li @if (\Request::is('modbus/index'))
                class="nav-item active"
                @else
                class="nav-item"
                @endif
            >
                <a class="nav-link" href="/modbus/index">Logi</a>
            </li>
            <li @if (\Request::is('modbus/trends'))
                class="nav-item active"
                @else
                class="nav-item"
                    @endif
            >
                <a class="nav-link" href="/modbus/trends">Wykresy</a>
            </li>
            <li @if (\Request::is('services'))
                class="nav-item active"
                @else
                class="nav-item"
                    @endif
            >

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Status tagów</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/modbus/ryb_reczny">Tryb ręczny</a>
                        <a class="dropdown-item" href="/modbus/ozycjonowanie">Pozycjonowanie</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/modbus/*">Wszystkie tagi</a>
                    </div>
                </li>





                <a class="nav-link" href="/about">Praca magisterska</a>
            </li>
            @endif
        </ul>
    </div>
    <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav navbar-right">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item" ><a class="nav-link" href="{{ route('login') }}">Zaloguj</a></li>
                <li class="nav-item" ><a class="nav-link" href="{{ route('register') }}">Rejestracja</a></li>
            @else
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/dashboard">Panel użytkownika</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Wyloguj
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>


                        {{--<a class="dropdown-item" href="#">Something else here</a>--}}
                    </div>
                </div>
            @endguest
        </ul>
    </div>
</nav>