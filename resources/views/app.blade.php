<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    @routes
	@vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}">
</head>
<body class="antialiased bg-slate-50">
    {{-- Preloader  --}}
    <x-preloader />

   {{-- Cookie Alert  --}}
    <x-cookie-alert />

    @inertia
	@vite('resources/js/app.js')
    <script src="/assets/js/preline/hs-ui.bundle.js"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>
