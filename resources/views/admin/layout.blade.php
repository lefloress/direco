<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.layout.meta')
        <title>@yield('title', 'Direco Admin')</title>
    </head>
    <body>
        @include('admin.layout.top')
        <div class="container">
            @yield('top')
            @yield('content')
        </div>
        @include('admin.layout.scripts')
  </body>
</html>