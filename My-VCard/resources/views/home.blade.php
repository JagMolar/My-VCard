<!doctype html>
<html class="no-js" lang="en">
    <head> 
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>MyVCard - Home</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="{{ asset('/img/logo-color-1080.ico') }}" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- themekit admin template asstes -->
        <link rel="stylesheet" href="{{ asset('all.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/theme.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/icon-kit/dist/css/iconkit.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/ionicons/dist/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>

    <body style="height: 100vh; background-image: linear-gradient(120deg, #fdfbfb 0%, #c4c9cc 100%);">
		<div class="container">
		    <div class="row justify-content-center m-5">
		        
		        <div class="col-md-12 m-5  text-center">
                    <h1 class="mt-2">Create your personal Virtual Card!</h1>
                    <img class="m-2" style="width: 40%" src="/img/logo-color-1080.png" alt="" srcset="">
		            <h1 class="mt-2">Welcome to MyVCard!</h1>                 
		            <a href="{{url('login')}}" role="button" class="btn btn-outline-success btn-lg">Login or Register</a>	            
		        </div>

		        </div>
		    </div>
		</div>
		<script src="{{ asset('all.js') }}"></script>
        
    </body>
</html>

