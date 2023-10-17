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
    <!--    Resumen de estado de cuenta
        Saldo actual
        Total de ingresos
        Total de gastos
        Resumen de movimientos recientes
    -->
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
                    <th></th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>


                </tbody>
            </table>

        </div>

        <div class="col-md-4">
            <label>Click to see blank page</label>
            <a href="admin.php" target="_blank" class="btn btn-danger btn-lg btn-block">VISITAR PAGINA WEB</a>
        </div>
    </div>
<!--
    Tabla que muestra detalles de las transacciones relacionadas con la cuenta de ahorros:
        Fecha
        Descripción de la transacción
        Tipo de transacción (depósito, retiro, interés, etc.)
        Monto
        Saldo después de la transacción
-->
  <!--  Gráfico de Saldo:

    Representación visual del saldo de la cuenta de ahorros a lo largo del tiempo.
    Exportar Datos:
  -->
<!--
     Exportar Datos:

    Opción para exportar el estado de cuenta de ahorros en diferentes formatos (CSV, PDF) para su posterior análisis o archivo.

    Filtros de Búsqueda:

    Rango de fechas: Permite al usuario seleccionar un período de tiempo específico para ver las transacciones.
    Tipo de transacción: Puede filtrar por depósitos, retiros, intereses, etc.

 -->



    <script src="../../public/javascript/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../../public/javascript/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../../public/javascript/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../../public/javascript/custom.js"></script>
</body>
</html>