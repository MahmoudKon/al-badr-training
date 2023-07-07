<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Al-Badr System Project Training.</title>

    @php
        $dir = app()->isLocale('ar') ? '.rtl' : '';
    @endphp
    <!-- CSS files -->
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/fontawesome.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/tabler{$dir}.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/tabler-flags{$dir}.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/tabler-payments{$dir}.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/tabler-vendors{$dir}.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/demo{$dir}.min.css") }}"/>

    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
    </style>
</head>
