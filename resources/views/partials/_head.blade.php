<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="renderer" content="webkit">
<meta name="keywords" content="骡子窝,技术博客,前端,后端,web前端,web后端,前端教程,后端教程">
<meta name="description" content="半次元是第一中文COS绘画小说社区，汇聚了包括Coser、绘师、写手等创作者在内的众多二次元同好，提供cosplay、绘画和小说创作发表、二次元同好交流等社群服务。网站共设cosplay、绘画、写作、漫展、话题等多个频道。">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>骡子窝 @yield('title')</title>

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