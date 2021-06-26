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
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    

    
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

    <script src="{{ asset('jss/jquery.js') }}"></script>
    <script src="{{ asset('jss/bootstrap.min.js') }}"></script>

</body>
