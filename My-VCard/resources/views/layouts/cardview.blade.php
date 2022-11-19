<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
	<title>@yield('title','MyVCard') | card view {{$users->name}}</title>
	<!-- initiate head with meta tags, css and script -->
	@include('include.head')

</head>
<body id="app" >
    <div class="wrapper">
    	<!-- initiate header-->
    	@include('include.header-view')
		{{-- <div class=""> --}}
    	<div class="page-wrap">	    	

	    	<div class="main-content">
	    		<!-- yeild contents here -->
	    		@yield('content')
	    	</div>

	    	<!-- initiate footer section-->
	    	@include('include.footer')

    	</div>
    </div>
    
	<!-- initiate modal menu section-->
	@include('include.modalmenu')

	<!-- initiate scripts-->
	@include('include.script')	
</body>
</html>