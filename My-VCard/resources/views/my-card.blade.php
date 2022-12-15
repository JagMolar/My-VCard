@extends('layouts.cardview') 
{{-- @extends('layouts.app') --}}

@section('content')
    <!-- push external head elements to head -->
    @push('head')
        {{-- <title>My Card | fastVcard</title> --}}
        <!-- add some inline style or css file if any -->
        {{-- <link rel="stylesheet" href="{{ asset('file-path')}}"> --}}
        <style type="text/css">
        	/* inline css*/
        </style>
    @endpush
    @include('flash-message')
    <div class="container">
    	<!-- page contents here -->
        <h1>My Card: {{$users->name}}</h1>
        <div class="row">           
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">    
                        <h5 class="card-title">Card View</h5>                           
                        {{-- Internal cards  --}}                      
                            {{-- Internal card view  --}}
                            <div id="cardQr" class="card" style="">
                                <div class="card-body preview">
                                    @if ( $users->user_image == null)
                                        <img src="{{ asset('/img/superadmin.jpg') }}"
                                        class="rounded-circle user-image" alt="image preview">                                                                                  
                                    @else
                                        <img src="{{ asset( $users->user_image ) }}"
                                        class="rounded-circle user-image" alt="image preview"> 
                                    @endif

                                    <div class="container-flex preview"
                                        style=" display:flex; flex-direction:column;  align-items:center; margin:1rem; ">
                                            <h1 class="h1" style="text-transform: uppercase">{{$name}}</h1>
                                            @if ($position == null)
                                                <h3 class="h3">My position</h3>
                                            @else
                                                <h3 class="h3">{{$position}}</h3>
                                            @endif
                                        </div>  
                                    <div class="container-flex socialIcons"
                                        style="">                                        
                                        <a href="{{$socialUrl1}}" target="_blank" rel="noopener noreferrer">
                                            <img src="{{ asset('/img/linkedin256x256.webp') }}" class="card-img"
                                            style="width: 90%;" alt="image preview">
                                        </a>
                                        <a href="{{$socialUrl2}}" target="_blank" rel="noopener noreferrer">
                                            <img src="{{ asset('/img/instagram.webp') }}" class="card-img"
                                            style="width: 90%;" alt="image preview">
                                        </a>
                                        {{-- <a href="{{$socialUrl3}}" target="_blank" rel="noopener noreferrer">
                                            <img src="{{ asset('/img/github.webp') }}" class="card-img"
                                            style="width: 90%;" alt="image preview">
                                        </a> --}}
                                        <a href="tel:+34{{$socialUrl3}}" target="_blank" rel="noopener noreferrer">
                                            <img src="{{ asset('/img/tel-blue.webp') }}" class="card-img"
                                            style="width: 90%;" alt="image preview">
                                        </a>
                                        <a href="mailto:{{$socialUrl4}}" target="_blank" rel="noopener noreferrer">
                                            <img src="{{ asset('/img/email.webp') }}" class="card-img"
                                            style="width: 90%;" alt="image preview">
                                        </a>
                                        <a href="{{$socialUrl5}}" target="_blank" rel="noopener noreferrer">
                                            <img src="{{ asset('/img/web.webp') }}" class="card-img"
                                            style="width: 90%;" alt="image preview">
                                        </a>                                        
                                    </div>
                                    <div class="container-flex qr" style="">
                                        {{ QrCode::size(256)->generate($urlCard)  }}
                                    </div>                                              
                                </div>
                            </div> <!-- end internal card -->                   
                    </div> <!-- end card-body -->
                </div><!-- end external card -->
                
            </div>
        </div>
    </div><!-- end container-fluid of page contents -->
    <!-- push external js if any -->
    @push('script') 
        {{-- <script src="{{ asset('script-path') }}"></script> --}}
    @endpush
@endsection'