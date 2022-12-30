<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="antialiased">
        {{ __('Dashboard') }} asdasd

        {{ $defaultLanguage }}
        {{ currentLanguage() }}

        {{-- <div class="dropdown">
            @php
                $language_count = count($header_languages) && count($header_languages) > 1;
                $current_language = currentLanguage() ? currentLanguage() : $defaultLanguage;
            @endphp
            <button
                class="btn text-light text-uppercase {{ $language_count ? 'dropdown-toggle' : '' }}"
                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ $current_language }}
            </button>
            @if ($language_count)
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    @foreach ($header_languages as $lang)
                        @if ($current_language != $lang->code)
                            <li>
                                <a class="dropdown-item text-uppercase"
                                    href="{{ route('language', $lang->code) }}">
                                    {{ $lang->code }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endif
        </div> --}}
    </body>
</html>
