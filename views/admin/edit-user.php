<?php
$users = $this->d['info'];


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

<!--    TODO: No guardar cache en la pagina HTML-->
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="pragma" content="no-cache">

    <script src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body>
    <div id="wrapper">
        <?php require 'header.php';?>
        <div id="page-wrapper">

            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Admin Users</h2>
                    </div>
                </div>
                <hr/>

                <div class="row"style="display: flex !important;">
                    <div class="col-md-6">
                        <h5>Usuario registrados</h5>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Phone</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th></th>
                            </tr>
                            <?php
                                $elementsPage = 3;
                                //TODO: this is a version for replace the opertator ternario
                                $page = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;

                                $indexBeguin = ($page - 1) * $elementsPage;
                                $usersFinally = array_slice($users,$indexBeguin,$elementsPage);

    //                            print_r($usersFinally);
                                $totalElementos = count($users);
                                $totalPaginas = ceil($totalElementos / $elementsPage);




                            ?>
                            </thead>
                            <tbody id="table-body">
                                <?php
                                    foreach ($usersFinally as $item){
                                ?>
                                <tr>
                                    <td> <?php echo $item['id'] ?></td>
                                    <td><?php echo $item['username'] ?></td>
                                    <td><?php echo $item['role'] ?></td>
                                    <td><?php echo $item['telefono'] ?></td>
                                    <td><?php echo $item['photo'] ?></td>
                                    <td><?php echo $item['name'] ?></td>
                                    <td data-data='{"id":"<?php echo $item['id'] ?>","username":"<?php echo $item['username'] ?>","role":"<?php echo $item['role'] ?>", "telefono":"<?php echo $item['telefono'] ?>","photo":"<?php echo $item['photo'] ?>","name":"<?php echo $item['name'] ?>","password":"<?php echo $item['password'] ?>"}'>
                                            <button type="button" class="btn btn-primary edit-button" data-toggle="modal" data-target="#miModalEditar" onclick="mostrarId(this)">Editar</button>
                                    </td>
                                </tr>
                                <?php } ?>


                            </tbody>
                        </table>

                        <div id="pagination-container">
                            <p class="badge bg-primary">Pagina actual: <?php echo $page?> de <?php echo $totalPaginas; ?></p>
                            <nav>
                                <ul id="pagination-list" class="pagination">
                                    <li class="page-item">
                                        <?php if($page>1): ?>
                                            <a class="page-link" href="?pagina= <?php echo $page-1 ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        <?php else: ?>
                                            <a class="page-link" href="?pagina=1" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        <?php endif; ?>

                                    </li>
                                    <?php
                                        for ($i = 1; $i <= $totalPaginas; $i++) {
                                            $isActive = ($i==$page) ? 'active': '';
                                            echo '<li class="page-item '. $isActive .' ">';
                                            echo '<a class="page-link" href="?pagina=' . $i . '">' . $i . '</a>';
                                            echo '</li>';
                                        }
                                    ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?pagina= <?php echo $page + 1?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>


                    <div style="text-align: center !important; width: 400px !important; margin: 2px auto">
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div class="panel panel-primary text-center no-boder bg-color-blue">
                                <div class="panel-body">
                                    <i class="fas fa-user-times fa-5x"></i>
                                    <button style="border-radius: 50px !important;" type="button" class="btn bg-color-blue" data-toggle="modal" data-target="#miModalDelete" ><h3>Eliminar Usuarios</h3></button>

                                    <h4></h4>
                                </div>
                                <div class="panel-footer back-footer-blue">
                                </div>
                            </div>
                        </div>
                    </div>


                </div>



<!--                TODO : Modal for user edit-->
                <div class="modal" id="miModalEditar">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Contenido del modal -->
                            <div class="modal-header">
                                <h5 class="modal-title">Editar usuario</h5>
                                <form action="<?php echo constant('URL'); ?>Users/updateAdminUsers" method="POST">
                                    <div class="field-wrap">
                                        <label>Email Address<span class="req">*</span>
                                        </label>
                                        <input type="hidden" value="" name="id_user" id="id_user"/>
                                        <input type="text" autocomplete="off" name="username" id="u_sername" value="">
                                    </div>


                                    <div class="field-wrap">
                                        <label>Set A Password<span class="req">*</span>
                                        </label>
                                        <input type="password"  autocomplete="off" name="password" id="password" value=""/>
                                    </div>

                                    <div class="field-wrap">
                                        <label>Set A Role<span class="req">*</span>
                                        </label>
                                        <select name="role" id="role" value="">
                                            <option value="" selected></option>
                                            <option value="user" >User</option>
                                            <option value="admin" >Admin</option>

                                        </select>
                                    </div>
                                    <div class="field-wrap">
                                        <label>Set A Phone Number<span class="req">*</span>
                                        </label>
                                        <input type="number"  autocomplete="off" name="phone" id="telefono"/>
                                    </div>
                                    <div class="field-wrap">
                                        <label>Set A Name of User<span class="req">*</span>
                                        </label>
                                        <input type="text"  autocomplete="off" name="user_name" id="name"/>
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

<!--                TODO: Modal is for delete users, select name-->
                <div class="modal" id="miModalDelete">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Contenido del modal -->
                            <div class="modal-header">
                                <h5 class="modal-title">Eliminar usuario</h5>

                                <form id="deleteUserForm" action="<?php echo constant('URL'); ?>Users/deleteUsers" method="POST">

                                    <div class="field-wrap">
                                        <label>Select User for delete<span class="req">*</span>
                                        </label>

                                        <select name="delete" id="delete">

                                            <option selected></option>
                                            <?php

                                            foreach ($users as $item) {

                                            ?>
                                                <option value="<?php echo $item['name'] ?>" ><?php echo $item['name'] ?></option>
                                            <?php }?>
                                        </select>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-dangerous">Eliminar Usuario</button>

                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>



            </div>
        </div>

    </div>

    <script>

        function mostrarId(id){
            const dataAtributte = id.parentElement.getAttribute('data-data');

            const data = JSON.parse(dataAtributte);
            console.log(data)
            document.getElementById('id_user').value = data.id;
            document.getElementById('u_sername').value = data.username;
            document.getElementById('password').value = data.password;
            document.getElementById('role').value = data.role;
            document.getElementById('telefono').value = data.telefono;
            document.getElementById('name').value = data.name;


        }

            // Verifica si hay mensajes de éxito en la URL
            window.onload = function() {
                const urlParams = new URLSearchParams(window.location.search);
                console.log(urlParams.has('delete'));
                if (urlParams.has('edit')) {


                    // Muestra una alerta de éxito
                    Swal.fire({
                    title: 'Operación Exitosa',
                    text: 'Se modifico exitosamente el usuario',
                    icon: 'success',
                    confirmButtonText: 'OK'
                    }).then(function () {
                        // Redirige al usuario a otra página si es necesario
                        window.location.href = 'Users';
                    });
                }




                if(urlParams.has('deleteExit')){
                Swal.fire({
                title: 'Operación Exitosa',
                text: 'Se elimino correctamente',
                icon: 'success',
                confirmButtonText: 'OK'
                }).then(function () {
                    // Redirige al usuario a otra página si es necesario
                    window.location.href = 'Project';
                });

                }
            };


        document.getElementById('deleteUserForm').addEventListener('submit', function (e) {
            // Evita el envío por defecto del formulario para manejarlo con JavaScript
            e.preventDefault();
            Swal.fire({
                title: 'Estas seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminarlo'
            }).then((result) => {
                if (result.isConfirmed) {

                    const form = document.getElementById('deleteUserForm');
                    form.submit();

                }
            })
        })




    </script>


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