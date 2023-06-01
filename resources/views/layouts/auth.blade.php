<!DOCTYPE html>
<html lang="en">
<head>
@include('partials.auth.header') 
</head>

<body>
  <div id="app">
    @yield('content')
  </div>
@include('partials.auth.js')
</body>
</html>