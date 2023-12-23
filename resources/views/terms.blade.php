<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cache.css') }}">
        @vite(['resources/sass/app.scss'])
    </head>
    <body lang="es">
		{!! $md !!}
	</body>
</html>