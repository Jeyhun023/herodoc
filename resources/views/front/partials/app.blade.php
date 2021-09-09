<html>
    @include('front.partials.top')
<body>
    @include('front.partials.header')
    
    @yield('content')

    @include('front.partials.footer')
    @include('front.partials.bottom')
</body>
</html>
