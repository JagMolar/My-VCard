<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ __('Forgot Password | MyCard') }}</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="{{ asset('./img/logo-color-1080.ico')}}" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/ionicons/dist/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/icon-kit/dist/css/iconkit.min.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/css/theme.min.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/css/theme-image.css')}}">
        <script src="{{ asset('src/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" >
                            <div class="lavalite-overlay">
                                <a style="padding: 1rem; font-size:0.9rem;" href="https://www.freepik.es/vector-gratis/elegir-mejor-concepto-candidato_9430580.htm#page=6&query=ilustraciones%20negocio&position=37&from_view=search&track=sph#position=37&page=6&query=ilustraciones%20negocio">Imagen de pikisuperstar</a>en Freepik
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div class="logo-centered">
                                <a href=""><img width="100%"  src="{{ asset('img/logo-color-1080.png')}}" alt="logo MyVCard"></a>
                            </div>
                            <h3>{{ __('Forgot Password') }}</h3>
                            <p>{{ __('We will send you a link to reset password.') }}</p>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your email address" name="email" value="{{ old('email') }}" required>
                                    <i class="ik ik-mail"></i>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="sign-btn text-center">
                                    <button class="btn btn-theme">{{ __('Submit') }}</button>
                                </div>
                            </form>
                            <div class="register">
                                <p>{{ __('Not a member') }}? <a href="{{ url('register/new-register')}}">{{ __('Create an account') }}</a></p>
                                
                                <p>{{ __('Ops! I just remember my pasword')}} <a href="{{url('login')}}">{{ __('Sign In')}}</a></p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="{{ asset('src/js/vendor/jquery-3.3.1.min.js')}}"></script>
        <script src="{{ asset('plugins/popper.js')}}/dist/umd/popper.min.js')}}"></script>
        <script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
        <script src="{{ asset('plugins/screenfull/dist/screenfull.js')}}"></script>
    </body>
</html>
