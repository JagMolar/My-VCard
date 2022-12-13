<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('/img/logo-color-1080.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" width="25em"alt="">
                    {{ config('app.name', 'My-VCard') }}
                </a>
            </div>
            <div class="top-menu d-flex align-items-center">

            </div>
        </div>
    </div>
</header>