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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- Main Style Css -->
<link rel="stylesheet" href="{{asset('css/style.css')}}"/>

@yield('header')
    </head>
    <body class="form-v4 bg">
        <div class="container-fluid p-0">
            <div class="header">
                <div class="row">
                    <div class="col-md-4 my-auto">
                       <a href="/"> <img src="{{asset('img/logo.png')}}" width="80"></a>
                    </div>
                    <div class="col-md-4 my-auto dark-blue">
                        <h1 class="text-center resp-h1">Boat Registration USA</h1>
                    </div>
                    <div class="col-md-4 my-auto">
                        <h1 class="text-center resp-h1">Call us at xxx-xxx-xxxx</h1>
                        
                    </div>
                </div>
                
              </div>

              <h2 class="subtitle p-4 my-5">The only full service boat registration online</h2>
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

