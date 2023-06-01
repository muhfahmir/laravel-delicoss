<!DOCTYPE html>
<html lang="en">

<head>
    @stack('before-css')
    @include('partials.user.header')
    @stack('after-css')
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
           @include('partials.user.topbar')
            <div class="main-sidebar sidebar-style-2">
                @include('partials.user.sidebar')
            </div>

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
            @include('partials.user.footer')
        </div>
    </div>
    @stack('before-js')
@include('partials.user.js')
@stack('after-js')
</body>

</html>
