<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="MyVCard | Design and create your personal Virtual Card.">
<meta name="keywords" content="Virtual Card">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="icon" href="{{ asset('/img/logo-color-1080.png')}}" />
{{-- <link rel="icon" href="{{ asset('favicon.png')}}" /> --}}

<!-- font awesome library -->
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

<script src="{{ asset('js/app.js') }}"></script>

<!-- themekit admin template assets -->
<link rel="stylesheet" href="{{ asset('all.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/theme.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/icon-kit/dist/css/iconkit.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/ionicons/dist/css/ionicons.min.css') }}">

<!-- html2canvas resources -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet"/> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.esm.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.js"></script>

<!-- Stack array for including inline css or head elements -->
@stack('head')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

