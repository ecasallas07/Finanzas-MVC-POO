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
            width: 700px !important;
            padding: 5px !important;
            border: 3px solid #001f2e;
            border-radius: 20px !important;
            box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
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
                            <form action="<?php echo constant('URL')?>Status/createBill" method="POST">
                                <h2 class="title_bills">Crear proyecto</h2>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputState" class="label-main">Tipo Categoria</label>
                                        <select id="inputState" class="form-control" name="category">
                                            <option selected></option>
                                            <?php
                                            foreach ($category as $item){
                                                ?>
                                                <option value="<?php echo $item['id'] ?>"><?php echo $item['tipo'] ?></option>

                                            <?php }?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4" class="label-main">Cantidad</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="$1.000.000" name="cantidad">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputPassword4" class="label-main">Cantidad</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="$1.000.000" name="cantidad">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4" class="label-main">Cantidad</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="$1.000.000" name="cantidad">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4" class="label-main">Cantidad</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="$1.000.000" name="cantidad">
                                    </div>
                                    <div class="field-wrap">
                                        <label class="label-main">Descripcion<span class="req">*</span>
                                        </label>
                                        <textarea type="text" class="form-control" id="textarea" name="descripcion"  placeholder="Pago de servicio de agua"></textarea>
                                    </div>

                                </div>
                                <div class="btn-bills">
                                    <button type="submit" class="btn btn-primary">Crear</button>
                                </div>

                            </form>
                    </div>

                    <div class="create-project">

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

</body>
</html>