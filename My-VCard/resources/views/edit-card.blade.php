@extends('layouts.main') 
{{-- @extends('layouts.app') --}}

@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <title>Welcome | fastVcard</title>
        <!-- add some inline style or css file if any -->
        {{-- <link rel="stylesheet" href="{{ asset('file-path')}}"> --}}
        <style type="text/css">
        	/* inline css*/
        </style>
    @endpush
    @include('flash-message')
    <div class="container">
    	<!-- page contents here -->
        <h1>welcome cards to {{$users->name}}</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status')}}
                            </div>
                        @endif
        
                        {{ __('You are logged in!') }}
        
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore repudiandae dolor, eligendi
                            voluptatem laudantium quasi officiis inventore nobis unde omnis explicabo animi voluptatibus
                            quia dolores dicta veniam cumque eum doloremque.
                        </p>
        
                        {{-- Internal cards  --}}
                        <div class="card-deck">
                            {{-- Internal card form  --}}
                            <div class="card">
                                {{-- <img src="..." class="card-img-top" alt="image"> --}}
                                <div class="card-body">
                                    <h5 class="card-title">Card Form</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <form action="{{url('/profile/update')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="user_image" class="form-label">Choose an profile image</label>
                                                <input type="file" class="form-control" id="user_image" name="user_image"
                                                    aria-describedby="fileHelp" accept="image/*">
                                                <div id="fileHelp" class="form-text">Only an png or JPEG image.</div>
                                            </div>                                       
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="name" class="form-label">Your Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    aria-describedby="nameHelp" value="{{$name}}" required>
                                                <div id="nameHelp" class="form-text">We'll need your name.</div>
                                            </div>
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label for="exampleInputPosition" class="form-label">Your position</label>
                                            <input type="email" class="form-control" id="exampleInputPosition"
                                                aria-describedby="positionHelp">
                                            <div id="emailHelp" class="form-text">Define your role.</div>
                                        </div> --}}
                                        <div class="mb-3">
                                            <label for="position" class="form-label">Your position</label>
                                            <input type="text" class="form-control" id="position" name="position"
                                                aria-describedby="positionHelp" value="{{$position}}" required>
                                            <div id="positionHelp" class="form-text">Define your role.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="socialUrl1" class="form-label">Choose a Social Network</label>
                                            <input type="url" class="form-control" id="socialUrl1" name="socialUrl1"
                                                aria-describedby="urlHelp" value="{{$socialUrl1}}" required >
                                            <div id="emailHelp" class="form-text">Your choice 1 of 5.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="socialUrl2" class="form-label">Choose a Social Network</label>
                                            <input type="url" class="form-control" id="socialUrl2" name="socialUrl2"
                                                aria-describedby="urlHelp" value="{{$socialUrl2}}" required >
                                            <div id="emailHelp" class="form-text">Your choice 2 of 5.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="socialUrl3" class="form-label">Choose a Social Network</label>
                                            <input type="url" class="form-control" id="socialUrl3" name="socialUrl3"
                                                aria-describedby="urlHelp" value="{{$socialUrl3}}" required >
                                            <div id="emailHelp" class="form-text">Your choice 3 of 5.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="socialUrl4" class="form-label">Choose a Social Network</label>
                                            <input type="url" class="form-control" id="socialUrl4" name="socialUrl4"
                                                aria-describedby="urlHelp" value="{{$socialUrl4}}" required >
                                            <div id="emailHelp" class="form-text">Your choice 4 of 5.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="socialUrl5" class="form-label">Choose a Social Network</label>
                                            <input type="url" class="form-control" id="socialUrl5" name="socialUrl5"
                                                aria-describedby="urlHelp" value="{{$socialUrl5}}" required >
                                            <div id="emailHelp" class="form-text">Your choice 5 of 5.</div>
                                        </div>
                                        {{-- <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                    </div> --}}
                                        {{-- <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                        </div> --}}
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end card-deck -->
                    
                    </div> <!-- end card-body -->
                </div><!-- end external card -->
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">    
                        <h5 class="card-title">Card View</h5>   
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore repudiandae dolor, eligendi
                            voluptatem laudantium quasi officiis inventore nobis unde omnis explicabo animi voluptatibus
                            quia dolores dicta veniam cumque eum doloremque.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel doloremque deleniti eius! Neque officiis 
                            dignissimos, ipsum id nihil quia suscipit modi pariatur maiores optio soluta, minus adipisci, eius est dolores!
                        </p>
                        {{-- <a class="btn btn-primary" href={{url('my-card')}}>My card</a> --}}

                        {{-- bloque de enlaces  --}}
                        <div class="container-flex"
                            style=" display:flex;  align-items:center; justify-content:center; margin:1rem; padding:1rem;">   
                        {{-- <div class="m-2 d-flex justify-content-center"> --}}
                            <a class="btn btn-primary m-1" role="button" href={{url('my-card')}}>My card</a>

                            <button class="btn btn-primary m-1"  id="download">
                                Download Card
                            </button>                       
                            {{-- <a class="btn btn-primary" href="{{ URL::to('/qrcode/pdf') }}">Convertir a PDF</a> --}}
                            <a class="btn btn-primary m-1" role="button" href={{url('my-card/send')}}>Convertir a PDF</a>
                        </div>
                        
                        <h5 class="card-title">Card preview</h5>
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
                                    {{-- <div class="container-flex" style=" display:flex;  align-items:center; justify-content:center;">
                                        {{ QrCode::size(300)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-8')  }}
                                    </div> --}}
                                    <div class="container-flex" style=" display:flex;  align-items:center; justify-content:center;">
                                        {{ QrCode::size(256)->generate($urlCard)  }}
                                    </div>
                                    {{-- <img src="{{ asset('/img/superadmin.jpg') }}" class="card-img-overlay  frame-qr"
                                        alt="image preview"> --}}                                                                                  
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