<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="{{ config('env.HEAD_ROBOTS_CONTENT') }}">
<title>{{ ($title ?? null) ? "$title - " : '' }}{{ config('app.name') }}</title>
@php($font = 'https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;900&display=swap')
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preload" href="{{ $font }}" as="style">
<link rel="preload" href="{{ asset('/css/app.css') }}" as="style">
<link rel="preload" href="{{ asset('/js/manifest.js') }}" as="script">
<link rel="preload" href="{{ asset('/js/vendor.js') }}" as="script">
<link rel="preload" href="{{ asset('/js/app.js') }}" as="script">
<link rel="stylesheet" href="{{ $font }}">
<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
<style>[v-cloak] { display:none }</style>
