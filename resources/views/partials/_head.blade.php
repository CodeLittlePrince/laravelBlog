<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Terry @yield('title')</title>

<link rel="shortcut icon" href="//or1edgicq.bkt.clouddn.com/fate.png?imageView2/1/w/50/h/50">
<!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
<link rel="stylesheet" type="text/css" href="{{ mix('css/base.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdn.staticfile.org/highlight.js/9.10.0/styles/zenburn.min.css">
@yield('stylesheets')

<!-- Scripts -->
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->