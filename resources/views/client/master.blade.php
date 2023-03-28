<!DOCTYPE html>
<html lang="en">
<head>
    @include('client.shares.head')
</head>
<body>
    @include('client.shares.top')
    @yield('content')
    @include('client.shares.foot')
    <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
    @include('client.shares.bot')
    @yield('js')
</body>
</html>
