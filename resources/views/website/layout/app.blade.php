<!DOCTYPE html>

<html lang="en">

<head>
    <!-- Page Title -->
    <meta charset="utf-8">
    <title>Novena- Health Care &amp; Medical template</title>

    <!-- Mobile Specific Metas -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Health Care Medical Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Novena HTML Template v1.0">
    <meta name="theme-name" content="novena" />

    <!-- Links -->
    @include('website.partials.links')

    <style>
       .pbmit-cart {
            position: fixed;
            right: 0;
            z-index: 6669992;
            font-size: 10px !important;
            letter-spacing: .11em;
            display: block;
            height: 43px;
            width: 43px;
            line-height: 43px;
            text-align: center;
            top: calc(70% - 25px);
            background-color: #e12454;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body id="top">
    <div class="pbmit-cart">
        <a href="https://pbminfotech.com/purchase/?product=30204043" target="_blank">
            <img src="https://doctery-demo.pbminfotech.com/wp-content/plugins/pbminfotech-theme-dock/images/cart-icon.png" alt="PBMI INFOTECH">
        </a>
    </div>

    <!-- Header -->
    @include('website.partials.header')

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    @include('website.partials.footer')

    <!-- Scripts -->
    @include('website.partials.scripts')
</body>

</html>
