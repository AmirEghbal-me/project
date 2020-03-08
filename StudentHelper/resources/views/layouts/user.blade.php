<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <link href="/css/bootstrap-rtl.min.css" rel="stylesheet">
    <link href="/css/patials.css" rel="stylesheet">
    <link href="/css/MainStyle.css" rel="stylesheet">
    <link href="/css/footer.css" rel="stylesheet">

    <title>دانشجویان</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">@include('partials.user.nav')</div>
    <div class="row">@yield('content')</div>
    <div class="row">@include('footer')</div>
</div>
</body>
</html>