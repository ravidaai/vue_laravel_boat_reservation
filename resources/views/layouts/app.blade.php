<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- Font-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/opensans-font.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/line-awesome/css/line-awesome.min.css')}}">

<!-- Main Style Css -->
<link rel="stylesheet" href="{{asset('css/style.css')}}"/>

@yield('header')
    </head>
    <body class="form-v4 bg">
        <div class="container">
            <div class="header">
                <h1 class="fast-easy">FAST & EASY - Boat Registration</h1>
                <h2 class="subtitle">The only full service boat registration online</h2>
              </div>
            @yield('content')
            <p class="copyright-text">
                Made in America by Boat Registration USA LLC © <?php echo date('Y'); ?> All Rights Reserved
              </p>
        </div>
    </body>

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
@yield('footer_script')
</html>

