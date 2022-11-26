<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
                @if( $userPrivilege ){
                    <!-- show menu button-->
                    <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                }
                @endif
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('/img/logo-color-1080.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" width="25em"alt="">
                    {{ config('app.name', 'My VCard') }}
                </a>
            </div>
            <div class="top-menu d-flex align-items-center">               
                {{-- <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i class="ik ik-grid"></i></button> --}}
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                        
                        @if ( $users->user_image == null)
                            <img class="avatar" src="{{ asset('/img/superadmin.jpg')}}" alt="">                                                                               
                        @else
                            <img class="avatar" src="{{ asset($users->user_image)}}" alt="">
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        {{-- <a class="dropdown-item" href="{{url('profile')}}"><i class="ik ik-user dropdown-icon"></i> {{ __('Profile')}}</a> --}}
                        {{-- <a class="dropdown-item" href="#"><i class="ik ik-navigation dropdown-icon"></i> {{ __('Message')}}</a> --}}
                        <a class="dropdown-item" href="{{ url('logout') }}">
                            <i class="ik ik-power dropdown-icon"></i> 
                            {{ __('Logout')}}
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>