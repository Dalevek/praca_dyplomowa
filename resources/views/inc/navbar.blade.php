


<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Projekt Dyplomowy</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav mr-auto">
            <li @if (\Request::is('/'))
                class="nav-item active"
                @else
                class="nav-item"
                @endif
                >
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li @if (\Request::is('cam'))
                class="nav-item active"
                @else
                class="nav-item"
                    @endif
            >
                <a class="nav-link" href="/cam">Kamera</a>
            </li>
            <li @if (\Request::is('services'))
                class="nav-item active"
                @else
                class="nav-item"
                    @endif
            >
                <a class="nav-link" href="/services">Usługi</a>
            </li>
            <li @if (\Request::is('about'))
                class="nav-item active"
                @else
                class="nav-item"
                    @endif
            >
                <a class="nav-link" href="/about">Informacje</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>

        </ul>

    </div>
</nav>