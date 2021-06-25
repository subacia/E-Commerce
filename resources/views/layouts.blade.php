<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Sample Project</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->

    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->

    <!-- <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'> -->

    <!-- <link href="assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" /> -->

    

    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css	" rel='stylesheet'> -->
    
    <link rel="stylesheet" href="{{ asset('csss/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <style>
        @media(max-width:768px) {

            #navbar_top .navbar-collapse{
                
                background-color: black;
            }

            
        }

        #navbar_top .navbar-collapse ul li a{
                
            color: white !important;
        }
    </style>

</head>

<body class="product-listing-page">

    <nav class="navbar navbar-default navbar-dark fixed-top navbar-expand-lg" id="navbar_top" style="background-color: black; max-height: 50px;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main_nav" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('product.listing.view') }}" style="color:White; font-weight:600;">E Commerce</a>
                
            </div>

            <div class="collapse navbar-collapse" id="main_nav" >
                

                <ul class="nav navbar-nav navbar-right" >
                    <?php
                        $user_id = Session::get('user_id');
                    ?>
                    @if(empty($user_id))
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('sign.up.view') }}"> SignUp </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        @if(!empty($user_id))
                            <a class="nav-link" href="{{ route('logout.url') }}"> Logout </a>
                        @else
                            <a class="nav-link" href="{{ route('login.view') }}"> Login </a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('product.listing.view') }}"> Products </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.items') }}"> Cart </a>
                    </li>
                    <?php 
                        $user_name = Session::get('user_name');
                    ?>
                    <li class="nav-item" style="color: white;">
                        <h5 style=" margin-top: 17px;">{{ ($user_name != '')?'Hi, '. $user_name:'' }}</h5>
                    </li>
                </ul>

                
            </div>
        </div>
    </nav>
   
    <div class="main-panel">
        @yield('content')
    </div>

    <footer class="page-footer font-small" style="background-color: #0a0a0a;height: 74px;color: white;display: flex;align-content: center;
    justify-content: center;flex-wrap: nowrap; align-items: center;">

        <div class="footer-copyright text-center py-3">
        <a href="{{ route('product.listing.view') }}"> E-Commerce : </a>Copyright © 2021 
        </div>
       

    </footer>

    <!-- 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> -->
    
    <!-- <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>

    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> -->

    <script src="{{ asset('jss/jquery.js') }}"></script>
    <script src="{{ asset('jss/bootstrap.min.js') }}"></script>

    <!-- <script 
     src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" 
     integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" 
     crossorigin="anonymous"></script>  -->

     <!-- <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script> -->
    <!-- <script src="/assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script> -->
</body>
