<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','GameDen')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Dynamic Theme Switching -->
    <link id="theme-css" href="{{ asset('css/style.css') }}" rel="stylesheet">
  </head>
  <body>
    @include('include.header')
    @yield('body')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Theme Switch Script -->
    <script src="{{ asset('js/dark-mode.js') }}"></script>

    <script>
      (function() {
        const savedTheme = localStorage.getItem("theme");
        if (savedTheme === "dark") {
          document.getElementById("theme-css").setAttribute("href", "{{ asset('css/darkmode.css') }}");
        }
      })();
    </script>
  </body>
</html>
