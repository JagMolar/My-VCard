@extends('layouts.cardOut') 
{{-- @extends('layouts.app') --}}

@section('content')
    <!-- push external head elements to head -->
    @push('head')
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
                <div id="cardView" class="card" style="">
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
                        <div>    
                            <h3>
                                <a href="{{$socialUrl1}}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset('/img/linkedin256x256.webp') }}" class="card-img"
                                style="height: min-content; width: 10%;" alt="image preview"> {{$socialUrl1}}
                                </a>
                                
                            </h3>                                    

                            <h3>
                                <a href="{{$socialUrl1}}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset('/img/instagram.webp') }}" class="card-img"
                                style="height: min-content; width: 10%;;" alt="image preview"> {{$socialUrl2}}
                                </a>                              
                            </h3> 

                            <h3>
                                <a href="{{$socialUrl1}}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset('/img/github.webp') }}" class="card-img"
                                style="height: min-content; width: 10%;" alt="image preview"> {{$socialUrl3}}
                                </a>                               
                            </h3> 
                            
                            <h3>
                                <a href="{{$socialUrl1}}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset('/img/email.webp') }}" class="card-img"
                                style="height: min-content; width: 10%;" alt="image preview"> {{$socialUrl4}}
                                </a>                              
                            </h3> 
                            
                            <h3>
                                <a href="{{$socialUrl1}}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset('/img/web.webp') }}" class="card-img"
                                style="height: min-content; width: 10%;" alt="image preview"> {{$socialUrl5}}
                                </a>                                
                            </h3> 
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </div><!-- end container-fluid of page contents -->
    <!-- push external js if any -->
    @push('script') 
        <script src="{{ asset('script-path') }}"></script>
    @endpush
@endsection'