<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials/_head')
  </head>
  <body>
    @include('partials/_nav')
    <div class="container">
      @include('partials/_message')
      {{-- This is the container of web content --}}
      @yield('content')
      @include('partials/_foot')
    </div>
    @include('partials/_scripts')
  </body>
</html>