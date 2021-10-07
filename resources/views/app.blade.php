<!DOCTYPE html>
<html>
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">

    <title>Admin{{ config('app.name') ? ' - ' . config('app.name') : '' }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ asset(mix('/css/app.css', 'vendor/inertia-admin')) }}" rel="stylesheet" type="text/css">
    <script src="{{ asset(mix('/js/app.js', 'vendor/inertia-admin')) }}" defer></script>
</head>
<body>
@inertia
</body>
</html>
