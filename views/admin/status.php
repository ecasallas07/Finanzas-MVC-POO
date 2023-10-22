<?php
    $category = $this->d['category'];
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <!--    <link href="../../public/css/bootstrap.css" rel="stylesheet" />-->
    <link href="<?php echo constant('URL'); ?>public/css/bootstrap.css" rel="stylesheet" />

    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo constant('URL'); ?>public/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <!--    <link href="../../public/css/custom.css" rel="stylesheet" />-->
    <link href="<?php echo constant('URL'); ?>public/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->

    <style>
        .form_div{
            width: 600px !important;
            /*border: 1px solid black !important;*/
            padding: 10px !important;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
            border-radius: 19px;
            background: rgb(17, 80, 136);
            color: white !important;
            margin-left: 15px !important;
            margin: auto !important;
        }
        .modal_div{
            /*width: 200px !important;*/
            margin-top: 30px !important;
            display: flex !important;
            justify-content: space-between !important;
        }
        .modal_div div{
            border: 1px solid black;
            border-radius: 10px !important;
            background: #007494 !important;
            color: white !important;
            width: 258px !important;
            /*height: 178px !important;*/
        }
        label{
            color: white !important;

        }
        .btn-bills{
            text-align: center !important;
        }

        .btn-bills button{
            width: 240px !important;
            background: rgb(38, 132, 214) !important;
            font-size: 18px !important;
            font-weight: bold;
            border-radius: 25px !important;
        }
        .title_bills{
            font-weight: bold;
            text-align: center;
        }

    </style>
</head>
<body>
<div id="wrapper">
    <?php require 'header.php';?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-12">
                <h2>Estados de cuenta</h2>
            </div>
        </div>
        <div class="row">

    <!--        Register gastos -->
            <div class="form_div" ">
                <form action="<?php echo constant('URL')?>Status/createBill" method="POST">
                    <h2 class="title_bills">Registrar Gasto</h2>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">Tipo Categoria</label>
                            <select id="inputState" class="form-control">
                                <option selected></option>
                                <?php
                                   foreach ($category as $item){
                                ?>
                                <option value="<?php echo $item['tipo'] ?>"><?php echo $item['tipo'] ?></option>

                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Cantidad</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="$1.000.000">
                        </div>
                    </div>
                    <div class="btn-bills">
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>

                </form>
            </div>

        <div class="modal_div">
            <div>

                    <div class="panel-body">
                        <i class="fa fa-bar-chart-o fa-5x"></i>
                        <h3>Ingresos</h3>
                        <h4><?php  echo $count;?></h4>
                    </div>
                    <div class="panel-footer back-footer-blue">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModalVerIngresos" >Ver ingresos</button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModalCrearIngresos" >Crear ingreso</button>

                    </div>

<!--                Gastos-->
            </div>

            <div>

                    <div class="panel-body">
                        <i class="fa fa-bar-chart-o fa-5x"></i>
                        <h3>Gastos</h3>
                        <h4><?php  echo $count;?></h4>
                    </div>
                    <div class="panel-footer back-footer-blue">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModalVerGastos" >Ver gastos</button>

                    </div>

<!--                Ingresos-->
            </div>

            <div>

                    <div class="panel-body">
                        <i class="fa fa-bar-chart-o fa-5x"></i>
                        <h3>Estado cuenta</h3>
                        <h4><?php  echo $count;?></h4>
                    </div>
                    <div class="panel-footer back-footer-blue">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModalVerEstado" >Ver estado cuenta</button>


                </div>
<!--                Estado cuenta-->
            </div>

        </div>

        </div>

<!--        TODO: Modals for the diferentes button-->
<!--    TODO: view Income-->
    <div class="modal" id="miModalVerIngresos">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Contenido del modal -->
                <div class="modal-header">
                    <h5 class="modal-title">Crear usuario</h5>
                    <form action="<?php echo constant('URL'); ?>admin/createUser" method="POST">

                        <div class="field-wrap">
                            <label>Email Address<span class="req">*</span>
                            </label>
                            <input type="text" autocomplete="off" name="username"/>
                        </div>

                        <div class="field-wrap">
                            <label>Set A Password<span class="req">*</span>
                            </label>
                            <input type="password"  autocomplete="off" name="password"/>
                        </div>

                        <div class="field-wrap">
                            <label>Set A Role<span class="req">*</span>
                            </label>
                            <select name="role">
                                <option value="" selected></option>
                                <option value="user" >User</option>
                                <option value="admin" >Admin</option>

                            </select>
                        </div>
                        <div class="field-wrap">
                            <label>Set A Phone Number<span class="req">*</span>
                            </label>
                            <input type="number"  autocomplete="off" name="phone"/>
                        </div>
                        <div class="field-wrap">
                            <label>Set A Name of User<span class="req">*</span>
                            </label>
                            <input type="text"  autocomplete="off" name="user_name"/>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>

                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

<!--    TODO: Creata income-->
    <div class="modal" id="miModalCrearIngresos">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Contenido del modal -->
                <div class="modal-header">
                    <h5 class="modal-title">Crear usuario</h5>
                    <form action="<?php echo constant('URL'); ?>admin/createUser" method="POST">

                        <div class="field-wrap">
                            <label>Email Address<span class="req">*</span>
                            </label>
                            <input type="text" autocomplete="off" name="username"/>
                        </div>

                        <div class="field-wrap">
                            <label>Set A Password<span class="req">*</span>
                            </label>
                            <input type="password"  autocomplete="off" name="password"/>
                        </div>

                        <div class="field-wrap">
                            <label>Set A Role<span class="req">*</span>
                            </label>
                            <select name="role">
                                <option value="" selected></option>
                                <option value="user" >User</option>
                                <option value="admin" >Admin</option>

                            </select>
                        </div>
                        <div class="field-wrap">
                            <label>Set A Phone Number<span class="req">*</span>
                            </label>
                            <input type="number"  autocomplete="off" name="phone"/>
                        </div>
                        <div class="field-wrap">
                            <label>Set A Name of User<span class="req">*</span>
                            </label>
                            <input type="text"  autocomplete="off" name="user_name"/>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>

                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

<!--    TODO: VIIW BILLS-->
    <div class="modal" id="miModalVerGastos">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Contenido del modal -->
                <div class="modal-header">
                    <h5 class="modal-title">Crear usuario</h5>
                    <form action="<?php echo constant('URL'); ?>admin/createUser" method="POST">

                        <div class="field-wrap">
                            <label>Email Address<span class="req">*</span>
                            </label>
                            <input type="text" autocomplete="off" name="username"/>
                        </div>

                        <div class="field-wrap">
                            <label>Set A Password<span class="req">*</span>
                            </label>
                            <input type="password"  autocomplete="off" name="password"/>
                        </div>

                        <div class="field-wrap">
                            <label>Set A Role<span class="req">*</span>
                            </label>
                            <select name="role">
                                <option value="" selected></option>
                                <option value="user" >User</option>
                                <option value="admin" >Admin</option>

                            </select>
                        </div>
                        <div class="field-wrap">
                            <label>Set A Phone Number<span class="req">*</span>
                            </label>
                            <input type="number"  autocomplete="off" name="phone"/>
                        </div>
                        <div class="field-wrap">
                            <label>Set A Name of User<span class="req">*</span>
                            </label>
                            <input type="text"  autocomplete="off" name="user_name"/>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>

                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
<!--    TODO: VIEW ACCOUNT-->
    <div class="modal" id="miModalVerEstado">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Contenido del modal -->
                <div class="modal-header">
                    <h5 class="modal-title">Crear usuario</h5>
                    <form action="<?php echo constant('URL'); ?>admin/createUser" method="POST">

                        <div class="field-wrap">
                            <label>Email Address<span class="req">*</span>
                            </label>
                            <input type="text" autocomplete="off" name="username"/>
                        </div>

                        <div class="field-wrap">
                            <label>Set A Password<span class="req">*</span>
                            </label>
                            <input type="password"  autocomplete="off" name="password"/>
                        </div>

                        <div class="field-wrap">
                            <label>Set A Role<span class="req">*</span>
                            </label>
                            <select name="role">
                                <option value="" selected></option>
                                <option value="user" >User</option>
                                <option value="admin" >Admin</option>

                            </select>
                        </div>
                        <div class="field-wrap">
                            <label>Set A Phone Number<span class="req">*</span>
                            </label>
                            <input type="number"  autocomplete="off" name="phone"/>
                        </div>
                        <div class="field-wrap">
                            <label>Set A Name of User<span class="req">*</span>
                            </label>
                            <input type="text"  autocomplete="off" name="user_name"/>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>

                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    </div>
</div>



    <script src="../../public/javascript/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../../public/javascript/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../../public/javascript/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../../public/javascript/custom.js"></script>
</body>
</html>