<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-language" content="vi" />
    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta name="description" content="@yield('description')"/>
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="all, index, follow" />
    <meta name="revisit-after" content="1 days" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/2.5.94/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">

</head>
<body>
    <div id="app">
        <site-navbar></site-navbar>
        @yield('content')
        <site-footer></site-footer>
    </div>
    <script src="/js/app.js?v=1.1"></script>
</body>
</html>
