<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Login Form Template</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="{{ asset('login_bootstrap/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('login_bootstrap/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('login_bootstrap/css/form-elements.css')}}">
    <link rel="stylesheet" href="{{ asset('login_bootstrap/css/style.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="{{ asset('login_bootstrap/ico/favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('login_bootstrap/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('login_bootstrap/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('login_bootstrap/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('login_bootstrap/ico/apple-touch-icon-57-precomposed.png') }}">

</head>

<body>

<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        @if(!empty($login))
            <script>
                alert('Usuario y contraseña incorrectos');
            </script>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1>Bienvenido a Pino Store</h1>
                    <div class="description">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            Ingrese Contraseña y usuario
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        {!! Form::open(['route' => '/', 'method' => 'post', 'novalidate']) !!}
                            <div class="form-group">
                                <label class="sr-only" for="form-username">Username</label>
                                <input type="text" name="name" placeholder="Username..." class="form-username form-control" id="form-username">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-password">Password</label>
                                <input type="password" name="pass" placeholder="Password..." class="form-password form-control" id="form-password">
                            </div>
                            <button type="submit" class="btn">Ingresar</button>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 social-login">
                    <h3>Desarrollado por:</h3>
                    <div class="social-login-buttons">
                        <a class="btn btn-link-2" href="#">
                         Moreno Casillas Sergio Israel
                        </a>
                        <a class="btn btn-link-2" href="#">
                            Rodriguez Ordiguez Luis Adrian
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- Javascript -->
<script src="{{ asset('login_bootstrap/js/jquery-1.11.1.js') }}"></script>
<script src="{{ asset('login_bootstrap/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('login_bootstrap/js/jquery.backstretch.js') }}"></script>
<script src="{{ asset('login_bootstrap/js/scripts.js') }}"></script>

<!--[if lt IE 10]>
<script src="{{ asset('login_bootstrap/js/placeholder.js') }}"></script>
<![endif]-->

</body>

</html>