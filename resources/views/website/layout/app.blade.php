<!DOCTYPE html>

<html lang="en">

<head>
    <!-- Page Title -->
    <meta charset="utf-8">
    <title>@yield('title') - {{ config('app.name') }}</title>

    <!-- Mobile Specific Metas -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Health Care Medical Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Novena HTML Template v1.0">
    <meta name="theme-name" content="novena" />

    <!-- Links -->
    @include('website.partials.links')
</head>

<body id="top">
    <!-- Header -->
    @include('website.partials.header')

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    @include('website.partials.footer')

    <!-- Cookie Alert -->
    <x-cookie-alert type="frontend" />

    <!-- Scripts -->
    @include('website.partials.scripts')
</body>

</html>
