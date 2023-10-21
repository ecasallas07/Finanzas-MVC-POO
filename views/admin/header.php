<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="<?php echo constant('URL'); ?>public/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo constant('URL'); ?>public/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <!--    <link href="../../public/css/custom.css" rel="stylesheet" />-->
    <link href="<?php echo constant('URL'); ?>public/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
<!--                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#miModalNotifications" ><h3>Notifications</h3></button>-->
                        <a href="#" data-toggle="modal" data-target="#miModalNotifications">Notifications</a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#miModalMensajes">Mensaje</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="<?php echo constant('URL'); ?>Users"><i class="fa fa-table "></i>Users</a>
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
<!--    TODO: Modal for notifications of the menu-->
    <div class="modal" id="miModalNotifications">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Contenido del modal -->
                <div class="modal-header">
                    <h5 class="modal-title">Notificaciones</h5>
                </div>


                        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="border: 2px solid grey !important;margin: 20px 20px !important;box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            <div class="toast-header" style="border-bottom: 1px solid grey !important;">
<!--                                <img src="..." class="rounded me-2" alt="...">-->
                                <strong class="me-auto">Bootstrap</strong>
                                <small>11 mins ago</small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                Hello, world! This is a toast message.
                            </div>
                        </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar Notificaiones</button>


                    </div>


                </div>

            </div>
        </div>
    </div>
    <!--    TODO: Modal for Messages of the Users-->
    <div class="modal" id="miModalMensajes">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Contenido del modal -->
                <div class="modal-header">
                    <h5 class="modal-title">Notificaciones</h5>
                    <form action="<?php echo constant('URL'); ?>Users/updateAdminUsers" method="POST">

                        <div class="field-wrap">
                            <label>Usuario<span class="req">*</span>
                            </label>
                            <select name="role" id="role" value="">
                                <option value="" selected></option>
                                <option value="user" >User</option>
                                <option value="admin" >Admin</option>

                            </select>
                        </div>
                        <div class="field-wrap">
                            <label>Titulo<span class="req">*</span>
                            </label>
                            <input type="text"  autocomplete="off" name="title" id="title"/>
                        </div>
                        <div class="mb-3">

                            <label for="textarea" class="form-label">Mensaje:</label>
                            <p class="font-italic font-weight-light">Escriba el mensaje:</p>
                            <textarea type="text" class="form-control" id="textarea" name="columnas"  rows="2" cols="50"></textarea>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Enviar mensaje</button>

                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>


<!-- JQUERY SCRIPTS -->
<script src="../../public/javascript/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="../../public/javascript/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="../../public/javascript/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="../../public/javascript/custom.js"></script>

</body>
</html>