<?php
$count = $this->d['countUsers'];
$user = $this->d['user'];
$roleUser = $this->d['usersRole'];
$adminTable = $this->d['admin'];


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
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body>

    <div id="wrapper">
        <?php require 'header.php';?>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
<!--            --><?php //print_r($roleUser)?>
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2><i class="fa-solid fa-elevator"></i> Admin Dashboard</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Usuarios</h5>
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa-solid fa-users-rectangle fa-5x"></i>
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
                                <i class="fa-solid fa-file-circle-plus fa-5x"></i>
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
                                    <i class="fa-solid fa-arrows-down-to-people fa-5x"></i>
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
                                    <i class="fa-solid fa-boxes-packing fa-5x"></i>
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
                                <h5 class="modal-title">Crear tabla</h5>
                                <form action="<?php echo constant('URL'); ?>admin/createTAbleFinally" method="POST">
                                    <div class="mb-3">

                                        <label for="exampleInputIdentification1" class="form-label">Nombre de la tabla:</label>
                                        <input type="text" class="form-control" id="exampleInputIdentification1" name="name_table" aria-describedby="identificationHelp" >
                                    </div>

                                    <div class="mb-3">

                                        <label for="textarea" class="form-label">Columnas:</label>
                                        <p class="font-italic font-weight-light">Revisar detenidamente los tipos de datos y restricciones</p>
                                        <textarea type="text" class="form-control" id="textarea" name="columnas"  placeholder="Separadas por coma (,)" rows="2" cols="50"></textarea>
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

<!--                TODO: ADD ROLE ADMIN AN USERS-->
                <div class="modal" id="miModalAdmin">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Contenido del modal -->
                            <div class="modal-header">
                                <h5 class="modal-title">Asignar rol</h5>
                                <form action="<?php echo constant('URL'); ?>admin/updateRol" method="POST">
                                    <div class="field-wrap">
                                        <label>Seleccione el Usuario<span class="req">*</span>
                                        </label>
                                        <select name="username">
                                            <option value="" selected></option>
                                            <?php foreach ($roleUser as $usuario){

                                                $username = $usuario->username;
                                                if(!empty($username)){
                                            ?>

                                                <option value="<?php echo $username ?>"><?php echo $username?></option>
                                            <?php }else{ ?>
                                                  <option value="sinRegistro">Sin nombre</option>


                                           <?php } }?>

                                        </select>

                                    </div>

                                    <div class="field-wrap">
                                        <label>Seleccione el rol<span class="req">*</span>
                                        </label>
                                        <select name="role">
                                            <option value="" selected></option>
                                            <option value="user" >User</option>
                                            <option value="admin" >Admin</option>

                                        </select>
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


                <!--                TODO: ADD MODAL CATEGORY-->
                <div class="modal" id="miModalCategory">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Contenido del modal -->
                            <div class="modal-header">
                                <h5 class="modal-title">Crear Categoria</h5>
                                <form action="<?php echo constant('URL');?>admin/saveCategoryData" method="POST">
                                    <div class="mb-3">
                                        <label for="exampleInputIdentification1" class="form-label">Tipo</label>
                                        <input type="text" class="form-control" id="exampleInputIdentification1" name="tipo" ">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputName1" class="form-label">Descripcion</label>
                                        <textarea type="text" class="form-control" id="exampleInputName1" name="descripcion" rows="4" cols="100" ></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputName1" class="form-label">Recomendacion</label>
                                        <input type="text" class="form-control" id="exampleInputName1" name="recomendacion" aria-describedby="nameHelp" >
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

                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-6">
                        <h5>Top Administradores</h5>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Phone</th>
                                <th>Photo</th>
                                <th>Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($adminTable as $row){


                            ?>
                            <tr>
                                <td><?php echo $row->id;?></td>
                                <td><?php echo $row->username;?></td>
                                <td><?php echo $row->role;?></td>
                                <td><?php echo $row->telefono;?></td>
                                <td><?php echo $row->photo;?></td>
                                <td><?php echo $row->name;?></td>
                            </tr>
                            <?php }?>

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

    <script src="https://kit.fontawesome.com/33a54e7afe.js" crossorigin="anonymous"></script>
    <script>
        // Verifica si hay mensajes de éxito en la URL
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('success')) {
                const successMessage = urlParams.get('success');

                // Muestra una alerta de éxito
                Swal.fire({
                    title: 'Operación Exitosa',
                    text: 'Se creo exitosamente el elemento deseado',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(function () {
                    // Redirige al usuario a otra página si es necesario
                    window.location.href = 'Project';
                });
            }
            if(urlParams.has('error')){
                Swal.fire({
                    title: 'Operación Exitosa',
                    text: 'No se creo el proyecto',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(function () {
                    // Redirige al usuario a otra página si es necesario
                    window.location.href = 'Project';
                });

            }
            if(urlParams.has('isset')){
                Swal.fire({
                    title: 'Operación Exitosa',
                    text: 'Ingrese los datos',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(function () {
                    // Redirige al usuario a otra página si es necesario
                    window.location.href = 'Project';
                });

            }
        };
    </script>

</body>
</html>
