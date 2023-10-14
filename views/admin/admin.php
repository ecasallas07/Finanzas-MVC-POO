<?php
$count = $this->d['countUsers'];
$user = $this->d['user'];

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
</head>
<body>

    <div id="wrapper">
        <?php require 'header.php';?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Admin Dashboard</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Usuarios</h5>
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3>Cantidad de usuarios</h3>
                                <h4><?php  echo $count;?></h4>
                            </div>
                            <div class="panel-footer back-footer-blue">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModal" >Registrar Usuario</button>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Tablas</h5>
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3>Cantidad de Tablas</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModalTable" >Crear Tablas</button>

                            </div>
                        </div>
                    </div>
                    <div class="row" style="">
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <h5>Administradores</h5>
                            <div class="panel panel-primary text-center no-boder bg-color-blue">
                                <div class="panel-body">
                                    <i class="fa fa-bar-chart-o fa-5x"></i>
                                    <h3>Cantidad de Adminins</h3>
                                </div>
                                <div class="panel-footer back-footer-blue">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModalAdmin" >Asignar Rol</button>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <h5>Categorias</h5>
                            <div class="panel panel-primary text-center no-boder bg-color-blue">
                                <div class="panel-body">
                                    <i class="fa fa-bar-chart-o fa-5x"></i>
                                    <h3>Cantidad de Categorias</h3>
                                </div>
                                <div class="panel-footer back-footer-blue">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModalCategory" >Crear Categoria</button>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

<!--                //TODO: Modales de boostrap-->
            <!--TODO: Modal add User-->
                <div class="modal" id="miModal">
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


<!--                TODO: MODAL ADD TABLES-->
                <div class="modal" id="miModalTable">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Contenido del modal -->
                            <div class="modal-header">
                                <h5 class="modal-title">Título del Modal</h5>
                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <input type="hidden" name="update_idsamsumg" value="<?php echo $data->id_samsumg ?>">
                                        <label for="exampleInputIdentification1" class="form-label">Serial</label>
                                        <input type="text" class="form-control" id="exampleInputIdentification1" name="update_serial" aria-describedby="identificationHelp" value="<?php echo $data->serial ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputName1" class="form-label">Modelo</label>
                                        <input type="text" class="form-control" id="exampleInputName1" name="update_modelo" aria-describedby="nameHelp" value="<?php echo $data->modelo?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputName1" class="form-label">Cliente</label>
                                        <input type="text" class="form-control" id="exampleInputName1" name="update_cliente" aria-describedby="nameHelp" value="<?php echo $data->id_cliente?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputName1" class="form-label">Ubicacion</label>
                                        <input type="text" class="form-control" id="exampleInputName1" name="update_ubicacion" aria-describedby="nameHelp" value="<?php echo $data->ubicacion?>">
                                    </div>


                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Guardar cambios</button>
                            </div>
                        </div>
                    </div>
                </div>

<!--                TODO: ADD ROLE ADMIN AN USERS-->
                <div class="modal" id="miModalAdmin">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Contenido del modal -->
                            <div class="modal-header">
                                <h5 class="modal-title">Título del Modal</h5>
                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <input type="hidden" name="update_idsamsumg" value="<?php echo $data->id_samsumg ?>">
                                        <label for="exampleInputIdentification1" class="form-label">Serial</label>
                                        <input type="text" class="form-control" id="exampleInputIdentification1" name="update_serial" aria-describedby="identificationHelp" value="<?php echo $data->serial ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputName1" class="form-label">Modelo</label>
                                        <input type="text" class="form-control" id="exampleInputName1" name="update_modelo" aria-describedby="nameHelp" value="<?php echo $data->modelo?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputName1" class="form-label">Cliente</label>
                                        <input type="text" class="form-control" id="exampleInputName1" name="update_cliente" aria-describedby="nameHelp" value="<?php echo $data->id_cliente?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputName1" class="form-label">Ubicacion</label>
                                        <input type="text" class="form-control" id="exampleInputName1" name="update_ubicacion" aria-describedby="nameHelp" value="<?php echo $data->ubicacion?>">
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Guardar cambios</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!--                TODO: ADD MODAL CATEGORY-->
                <div class="modal" id="miModalCategory">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Contenido del modal -->
                            <div class="modal-header">
                                <h5 class="modal-title">Título del Modal</h5>
                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <input type="hidden" name="update_idsamsumg" value="<?php echo $data->id_samsumg ?>">
                                        <label for="exampleInputIdentification1" class="form-label">Serial</label>
                                        <input type="text" class="form-control" id="exampleInputIdentification1" name="update_serial" aria-describedby="identificationHelp" value="<?php echo $data->serial ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputName1" class="form-label">Modelo</label>
                                        <input type="text" class="form-control" id="exampleInputName1" name="update_modelo" aria-describedby="nameHelp" value="<?php echo $data->modelo?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputName1" class="form-label">Cliente</label>
                                        <input type="text" class="form-control" id="exampleInputName1" name="update_cliente" aria-describedby="nameHelp" value="<?php echo $data->id_cliente?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputName1" class="form-label">Ubicacion</label>
                                        <input type="text" class="form-control" id="exampleInputName1" name="update_ubicacion" aria-describedby="nameHelp" value="<?php echo $data->ubicacion?>">
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Guardar cambios</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-6">
                        <h5>Top Administradores</h5>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>

                    <div class="col-md-4">
                        <label>Click to see blank page</label>
                        <a href="admin.php" target="_blank" class="btn btn-danger btn-lg btn-block">VISITAR PAGINA WEB</a>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />


                <div class="row">
                    <div class="col-md-12">
                        <h5>Articulos</h5>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">Tecnologia</a>
                            </li>
                            <li class=""><a href="#profile" data-toggle="tab">Finanzas</a>
                            </li>
                            <li class=""><a href="#messages" data-toggle="tab">Politica</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="home">
                                <h4>Home Tab</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit eserunt mollit anim id est laborum.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit eserunt mollit anim id est laborum.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit eserunt mollit anim id est laborum.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <h4>Profile Tab</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit eserunt mollit anim id est laborum.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit eserunt mollit anim id est laborum.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit eserunt mollit anim id est laborum.
                                </p>

                            </div>
                            <div class="tab-pane fade" id="messages">
                                <h4>Messages Tab</h4>
                                <p >
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit eserunt mollit anim id est laborum.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit eserunt mollit anim id est laborum.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit eserunt mollit anim id est laborum.
                                </p>

                            </div>

                        </div>
                    </div>

                </div>

                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <h5>Information</h5>
                        This is a type of bare admin that means you can customize your own admin using this admin structured  template . For More Examples of bootstrap elements or components please visit official bootstrap website <a href="http://getbootstrap.com" target="_blank">getbootstrap.com</a>
                        . And if you want full template please download <a href="http://www.binarytheme.com/bootstrap-free-admin-dashboard-template/" target="_blank" >FREE BCORE ADMIN </a>&nbsp;,&nbsp;  <a href="http://www.binarytheme.com/free-bootstrap-admin-template-siminta/" target="_blank" >FREE SIMINTA ADMIN</a> and <a href="http://binarycart.com/" target="_blank" >FREE BINARY ADMIN</a>.

                    </div>
                </div>
                <!-- /. ROW  -->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
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
