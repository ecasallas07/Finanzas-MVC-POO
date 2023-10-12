<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/default.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/dashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="adjust-nav">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><i class="fa fa-square-o "></i>&nbsp;FINANZAS</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" class="fa fa-edit ">Setings</a></li>
                <li><a href="#" class="fa fa-edit ">Logout</a></li>
            </ul>
        </div>

    </div>
</div>
<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center user-image-back">
                <img src="<?php echo constant('URL'); ?>public/img/find_user.png" class="img-responsive" />

            </li>

            <li>
                <a href="#"><i class="fa fa-edit "></i>Perfil<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Notifications</a>
                    </li>
                    <li>
                        <a href="#">Estado</a>
                    </li>
                    <li>
                        <a href="#">Editar</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-table "></i>Users</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-edit "></i>Estados de cuenta </a>
            </li>

            <li>
                <a href="#"><i class="fa fa-qrcode "></i>Calendario</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i>Categorias de Gastos</a>
            </li>

            <li>
                <a href="#"><i class="fa fa-edit "></i>Proyectos </a>
            </li>

        </ul>

    </div>

</nav>


</body>
</html>