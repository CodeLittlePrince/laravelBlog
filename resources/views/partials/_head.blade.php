<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="renderer" content="webkit">
<meta name="keywords" content="骡子窝,技术博客,前端,后端,web前端,web后端,前端教程,后端教程">
<meta name="description" content="骡子窝是一个前端技术博客。有前端，后端，阿里云，Webpack，React，Gulp，等各种前端技术，以及后端技术">
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
    // 百度统计
    <script>
	    var _hmt = _hmt || [];
	    (function() {
	      var hm = document.createElement("script");
	      hm.src = "https://hm.baidu.com/hm.js?261b54c7f0e1729e4667c6e3cfbd3540";
	      var s = document.getElementsByTagName("script")[0]; 
	      s.parentNode.insertBefore(hm, s);
	    })();
    </script>
</script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->