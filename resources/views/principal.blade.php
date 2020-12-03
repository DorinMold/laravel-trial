<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title> Site-ul meu | @yield('titlu') </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
		<!-- <link rel="stylesheet" type="text/css" href="css/app.css">  SAU-->
		<!-- <link rel="stylesheet" type="text/css" href=" {{ asset('css/app.css') }}">  SAU-->

        <!-- Styles -->
		
		{!! Html::style('css/app.css') !!}
            
            @yield('stylesheet')
      
    </head>
    <body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="#">Site</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav pull-right">
                <!-- Request::is() -->
					<li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
					  <a class="nav-link" href="{{ url('/') }}">Acasa <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item {{ Request::is('despre') ? 'active' : '' }}">
					  <a class="nav-link" href="{{ url('/despre') }}">Despre</a>
					</li>
					<li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
					  <a class="nav-link" href=" {{ url('/contact') }} ">Contact</a>
					</li>
					<!-- <li class="nav-item">
					  <a class="nav-link disabled" href="#">Disabled</a>
					</li>  -->
				</ul>
			</div>
		</nav>
		
		<div class="container">
		
			@yield('continut')
		
		</div>
		
		<p class="text-center"> Drept de autor - toate drepturile rezervate </p>
     <!--   <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif  

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div> -->
	
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"> </script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @yield('scripts')
    </body>
</html>
