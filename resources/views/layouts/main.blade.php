<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    {{-- CSS Manual --}}
    <link rel="stylesheet" href="/css/style.css">
    
    <title>ArsyAgro | {{ $title }}</title>
  </head>
  <body>

    @include('layouts.navbar')

      <div class="container mt-4">
        @yield('container')
        {{-- nama dari section untuk isi yield, harus sama dengan nama child (about, blog) --}}
      </div>


    <script src="/js/bootstrap.bundle.min.js"></script>


   
  </body>
</html>
