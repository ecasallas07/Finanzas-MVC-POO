<?php

 $project = $this->d['project'];
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    <style>
        .form_div{
            width: 700px !important;
            padding: 5px !important;
            border: 3px solid #001f2e;
            border-radius: 20px !important;
            box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
            height: 800px;
        }
        .btn-project{
            text-align: center !important;

        }
        .btn-project button{
            font-size: 20px !important;
            border-radius: 20px !important;
            width: 100px !important;
        }
        .view-project{
            display: flex !important;
            justify-content: space-around !important;
        }
        .create-project{
            width: 700px !important;
        }


    </style>
</head>
<body>

<div id="wrapper">
    <?php require './views/admin/header.php';?>

    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <!--            --><?php //print_r($roleUser)?>
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2><i class="fa-solid fa-hands-holding-circle"></i> Proyectos</h2>
                </div>
            </div>
                <div class="view-project">
                    <div class="form_div" ">
                            <form action="<?php echo constant('URL')?>Project/createProject" method="POST">
                                <h2 class="title_bills"> <i class="fas fa-plus-circle"></i> Crear proyecto</h2>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputState" class="label-main">Titulo del proyecto <span class="req">*</span></label>
                                        <input type="text" name="title">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="inputPassword4" class="label-main">Fecha inicio <span class="req">*</span></label>
                                        <input type="date" class="form-control" id="inputPassword4" name="fecha_inicio">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputPassword4" class="label-main">Fecha fin <span class="req">*</span></label>
                                        <input type="date" class="form-control" id="inputPassword4" name="fecha_fin">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4" class="label-main">Ingresos proyectados <span class="req">*</span></label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="$1000000" name="ingresos_proyectados">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4" class="label-main">Gastos proyectados <span class="req">*</span></label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="$1000000" name="gastos_proyectados">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputPassword4" class="label-main"> Estado Proyecto <span class="req">*</span></label>
                                        <select name="estado">
                                            <option selected>....</option>
                                            <option value="En curso">En curso</option>
                                            <option value="Finalizado">Finalizado</option>
                                            <option value="Sin iniciar">Sin iniciar</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="label-main">Objetivo<span class="req">*</span>
                                        </label>
                                        <textarea type="text" class="form-control" id="textarea" name="objetivo"  placeholder="Compra de casa propia"></textarea>
                                    </div>

                                </div>
                                <div class="btn-project">
                                    <button type="submit" class="btn btn-primary">Crear</button>
                                </div>

                            </form>
                    </div>

                    <div class="create-project">
                        <div class="col-md-12">
                            <h2><i class="fas fa-project-diagram"></i> Proyectos Creados</h2>
                        </div>
<!--                        --><?php //print_r($project) ?>
                        <?php if(!empty($project)): ?>
                            <?php
                            $elementsPage = 3;
                            //TODO: this is a version for replace the opertator ternario
                            $page = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;

                            $indexBeguin = ($page - 1) * $elementsPage;
                            $projectFinally = array_slice($project,$indexBeguin,$elementsPage);

                            //                            print_r($usersFinally);
                            $totalElementos = count($project);
                            $totalPaginas = ceil($totalElementos / $elementsPage);




                            ?>
                            <?php foreach ($projectFinally as $item){ ?>
                                <div class="col-md-12 create-project">
                                    <div class=" text-center no-boder bg-color-blue" style="border-radius: 20px !important; padding: 15px !important;">
                                        <div class="">
                                            <i class="fa-solid fa-house-medical-circle-check fa-5x"></i>
                                            <h3><?php echo $item->title ?></h3>
                                            <p>Estado : <?php echo $item->estado ?></p>
                                        </div>
                                        <div class="panel-footer back-footer-blue" style="border-radius: 15px !important;">
                                            <p><?php echo $item->objetivo ?></p>

                                        </div>
                                    </div>
                                </div>
                            <?php }?>
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
                        <?php else :?>
                            <div class="col-md-12 create-project">
                                <div class=" text-center no-boder bg-color-blue" style="border-radius: 20px !important; padding: 15px !important;">
                                    <div class="">
                                        <i class="fab fa-creative-commons-zero fa-5x"></i>
                                        <h3>Sin proyectos</h3>
                                        <p></p>
                                    </div>

                                </div>
                            </div>
                        <?php endif;?>

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
                text: 'Se creo exitosamente el proyecto',
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