<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
                <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('/img/favicon_192x192.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" width="25em"alt="">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
            </div>
            <div class="top-menu d-flex align-items-center">
                {{-- <button type="button" id="navbar-fullscreen" class="btn btn-lg btn-light">Volver</button> --}}
                <a class="btn btn-light btn-lg" id="navbar-fullscreen"  href="{{ url('edit-card') }}" role="button">Volver</a>
            </div>
        </div>
    </div>
</header>