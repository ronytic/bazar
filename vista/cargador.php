<!DOCTYPE html>
<html>

<head>
    <title>Sistema Bazar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <!-- Logo -->
                    <div class="logo">
                        <h1><a href="index.html">Sistema Bazar</a></h1>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-lg-12">

                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="navbar navbar-inverse" role="banner">
                        <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuario <b class="caret"></b></a>
                                    <ul class="dropdown-menu animated fadeInUp">
                                        <li><a href="profile.html">Cambiar Contraseña</a></li>
                                        <li><a href="login.html">Salir</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="row">
            <div class="col-md-2">
                <!--Inicio de Menu-->
                <div class="sidebar content-box" style="display: block;">
                    <ul class="nav">
                        <!-- Main menu -->
                        <li class="current"><a href="./"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
                        <li class="submenu">
                            <a href="#">
                                <i class="glyphicon glyphicon-list"></i> Producto
                                <span class="caret pull-right"></span>
                            </a>
                            <!-- Sub menu -->
                            <ul>
                                <li><a href="?c=Producto&m=nuevo">Nuevo Producto</a></li>
                                <li><a href="?c=Producto&m=listar">Listar Productos</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#">
                                <i class="glyphicon glyphicon-list"></i> Compra de Productos
                                <span class="caret pull-right"></span>
                            </a>
                            <!-- Sub menu -->
                            <ul>
                                <li><a href="?c=Compra&m=nuevo">Nuevo Compra</a></li>
                                <li><a href="?c=Compra&m=listar">Listar Compras</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#">
                                <i class="glyphicon glyphicon-shopping-cart"></i> Venta
                                <span class="caret pull-right"></span>
                            </a>
                            <!-- Sub menu -->
                            <ul>
                                <li><a href="?c=Venta&m=nuevo">Nuevo Venta</a></li>
                                <li><a href="?c=Venta&m=listar">Listar Ventas</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#">
                                <i class="glyphicon glyphicon-print"></i> Reportes
                                <span class="caret pull-right"></span>
                            </a>
                            <!-- Sub menu -->
                            <ul>
                                <li><a href="?c=Reporte&m=index">Reporte de Ventas</a></li>
                                <li><a href="?c=ReporteEstadistico&m=index">Reporte Estadístico</a></li>

                                <li><a href="?c=ReporteEstadistico&m=index2">Reporte Estadístico Torta</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#">
                                <i class="glyphicon glyphicon-user"></i> Usuario
                                <span class="caret pull-right"></span>
                            </a>
                            <!-- Sub menu -->
                            <ul>
                                <li><a href="?c=Usuario&m=nuevo">Nuevo Usuario</a></li>
                                <li><a href="?c=Usuario&m=listar">Listar Usuarios</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!--Fin de Menu-->
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-box-header">
                            <div class="panel-title"><?php echo $titulo ?? '' ?></div>
                        </div>
                        <div class="content-box-large box-with-header">
                            <!--Inicio del Contenido-->

                            <?php
                            // Path: vista\archivovista.php
                            @@require_once $vista ?? '';
                            ?>


                        </div>
                        <!--Fin de Contenido-->
                    </div>

                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">

            <div class="copy text-center">
                Copyright 2014 <a href="#">Website</a>
            </div>

        </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>


    <?php

    if (isset($js)) {
        foreach ($js as $file) {
    ?>
            <script src="<?php echo $file ?>"></script>
    <?php
        }
    }

    ?>


</body>

</html>