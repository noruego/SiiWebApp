<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>



    </head>
    <body>
    <div id="main_menu">
        <div class="row">
            <div class="col-sm-4"></div>

            <div class="col-sm-6">
                <nav class="navbar navbar-default navbar-fixed-top" style="background-color: whitesmoke">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.blade.php">Inicio</a>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav navbar-center">
                                <li><a href="/matter">Materias</a></li>
                                <li><a href="/student">Estudiantes</a></li>
                                <li><a href="/oportunity">Oportunidad</a></li>
                                <li><a href="/career">Carrera</a></li>
                                <li><a href="/teacher">Profesores</a></li>
                                <li><a href="/groups">Grupos</a></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reportes
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/report_products">Clientes</a></li>
                                        <li><a href="/report_orders">Ordenes</a></li>
                                        <li><a href="/report_graphics">Graficos</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="/logout">Logout</a></li>
                            </ul>
                        </div>

                    </div>
                </nav>
            </div>
        </div>
    </div>
    <br><br><br><br>
    @yield('list')
    @yield('add')
    @yield('update')
    </body>
</html>
