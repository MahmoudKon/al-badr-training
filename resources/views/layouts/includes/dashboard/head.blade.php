<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Al-Badr System Project Training.</title>

    @if (App::isLocale('ar'))
        @vite(['resources/css/app-rtl.css'])
    @else
        @vite(['resources/css/app-ltr.css'])
    @endif
</head>
