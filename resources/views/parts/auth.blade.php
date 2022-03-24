<!DOCTYPE html>
<html lang="en">
<head>
    <title>Centaro - @yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/extra.css') }}" rel="stylesheet">
    <!-- begin of metadata -->
    <meta property="og:title" content="Centaro">
    <meta property="og:type" content="website">
    <meta property="og:url" content="/">
    <meta property="og:description" content="Centaro is a smallsize accountancy website.">
    <meta name="theme-color" content="#05A8AA">
    <!-- end of metadata -->
</head>
<body class="font-outfit">
    @yield('content')
</body>
</html>
