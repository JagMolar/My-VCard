@extends('layouts.cardview') 
{{-- @extends('layouts.app') --}}

@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <title>My Card | fastVcard</title>
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
                        {{-- <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore repudiandae dolor, eligendi
                            voluptatem laudantium quasi officiis inventore nobis unde omnis explicabo animi voluptatibus
                            quia dolores dicta veniam cumque eum doloremque.
                        </p> --}}
                        <h5 class="card-title">Card preview</h5>
                        {{-- <button class="m-4 d-flex justify-content-center btn btn-primary"  id="download">
                            Download Card
                        </button> --}}
                        <div class="m-4 d-flex justify-content-center">
                            <button class="btn btn-primary"  id="download">
                                Download Card
                            </button>
                        </div>
                        <div class="m-4 d-flex justify-content-center">
                            {{-- <a class="btn btn-primary" href="{{ URL::to('/qrcode/pdf') }}">Convertir a PDF</a> --}}
                            <a class="btn btn-primary" href={{url('my-card/send')}}>Convertir a PDF</a>
                        </div>
                        
                        
                        {{-- Internal cards  --}}                      
                            {{-- Internal card view  --}}
                            <div id="cardQr" class="card" style="background: url('/img/degradate-background.png'); background-size:cover;">
                                <div class="card-body preview">
                                        @if ( $users->user_image == null)
                                            <img src="{{ asset('/img/superadmin.jpg') }}"
                                            class="rounded-circle user-image" alt="image preview">                                                                                  
                                        @else
                                            <img src="{{ asset( $users->user_image ) }}"
                                            class="rounded-circle user-image" alt="image preview"> 
                                        @endif
                                    
                                    
                                    <h1 class="h1" style="text-transform: uppercase">{{$name}}</h1>
                                    @if ($position == null)
                                        <h3 class="h3">My position</h3>
                                    @else
                                        <h3 class="h3">{{$position}}</h3>
                                    @endif
                                    <div class="container-flex"
                                        style=" display:flex;  align-items:center; justify-content:center; height:5rem; margin:1rem; padding:2rem;">                                        
                                        <a href="{{$socialUrl1}}" target="_blank" rel="noopener noreferrer">
                                            <img src="{{ asset('/img/linkedin256x256.webp') }}" class="card-img"
                                            style="width: 90%;" alt="image preview">
                                        </a>
                                        <a href="{{$socialUrl2}}" target="_blank" rel="noopener noreferrer">
                                            <img src="{{ asset('/img/instagram.webp') }}" class="card-img"
                                            style="width: 90%;" alt="image preview">
                                        </a>
                                        <a href="{{$socialUrl3}}" target="_blank" rel="noopener noreferrer">
                                            <img src="{{ asset('/img/github.webp') }}" class="card-img"
                                            style="width: 90%;" alt="image preview">
                                        </a>
                                        <a href="{{$socialUrl4}}" target="_blank" rel="noopener noreferrer">
                                            <img src="{{ asset('/img/email.webp') }}" class="card-img"
                                            style="width: 90%;" alt="image preview">
                                        </a>
                                        <a href="{{$socialUrl5}}" target="_blank" rel="noopener noreferrer">
                                            <img src="{{ asset('/img/web.webp') }}" class="card-img"
                                            style="width: 90%;" alt="image preview">
                                        </a>                                        
                                    </div>
                                    <div class="container-flex" style=" display:flex;  align-items:center; justify-content:center;">
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
        <script src="{{ asset('script-path') }}"></script>
    @endpush
@endsection'