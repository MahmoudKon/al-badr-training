<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Al-Badr System Project Training.</title>
    <link href="./dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="./dist/css/demo.min.css" rel="stylesheet"/>
    
    @php
        $dir = app()->isLocale('ar') ? '.rtl' : '';
    @endphp

    @if (App::isLocale('ar'))
        @vite(['resources/css/app-rtl.css'])
    @else
        @vite(['resources/css/app-ltr.css'])
    @endif

    <style>
        .required {

        }
    </style>
</head>
