<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title>@yield('title')</title>
      <link href="{{ asset('css/style.css') }}" rel="stylesheet" /> 
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   </head>

   <body class="d-flex flex-column min-vh-100">
    @include('includes.nav')
    <div class="flex-grow-1">
       @yield('content')
    </div>
    @include('includes.footer')
    
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   </body>
</html>
