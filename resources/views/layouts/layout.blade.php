<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
        <title>Laravel TravelPerk - @yield('title')</title>
    </head>
    <body>
		<header>
			@include('layouts.navbar')
		</header>
        <main class="container mt-5 mb-6">
			@yield('content')
        </main>
		<footer class="footer mt-auto py-3 fixed-bottom text-center">
			@include('layouts.footer')
		</footer>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
