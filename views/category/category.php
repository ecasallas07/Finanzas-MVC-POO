<?php
    $listCategory = $this->d['listCategory'];

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

<!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">


    <style>
        .btn-articles{
            margin-top: 20px !important;
        }
        .button-art{
            border-radius: 20px !important;
            background: #001f2e;
            color: white;
        }
        .category-type{
            border-radius: 33px !important;
        }

    </style>
</head>
<body>

<div id="wrapper">
    <?php require './views/admin/header.php';?>

    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">
            <div style="display: flex !important; justify-content: space-around !important; margin-bottom: 30px !important;">
                <div class="row">
                    <div class="col-md-12">
                        <h1> <i class="fa-solid fa-boxes-packing"></i> Categorias</h1>
                    </div>
                </div>
                <div class="btn-articles row">
                    <div class="col-md-6">
                        <a class="btn btn-secondary btn-lg button-art" href="https://www.forbes.com/?sh=51b4c8cb2254" target="_blank"> <i class="fa-solid fa-file-circle-question"></i> Articulos de finanzas</a>
                    </div>
                </div>
            </div>

            <div>
                <?php
                    foreach ($listCategory as $item){

                ?>
                <div class="col-md-3 col-sm-3">
                    <div class=" text-center no-boder bg-color-blue" style="border-radius: 20px !important; padding: 15px !important;">
                        <div class="">
                            <i class="fa-solid fa-house-medical-circle-check fa-5x"></i>
                            <h3><?php echo $item['tipo'] ?></h3>
                            <p><?php echo $item['descripcion'] ?></p>
                        </div>
                        <div class="panel-footer back-footer-blue" style="border-radius: 15px !important;">
                            <p><?php echo $item['recomendacion'] ?></p>

                        </div>
                    </div>
                </div>
                <?php } ?>
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

    <script src="https://kit.fontawesome.com/33a54e7afe.js" crossorigin="anonymous"></script>
</body>
</html>
