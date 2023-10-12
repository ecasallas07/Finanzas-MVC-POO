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
                            </div>
                            <div class="panel-footer back-footer-blue">
                                Registrar Usuario

                            </div>
                        </div>
                    </div>

<!--                    <div class="col-md-3 col-sm-3 col-xs-6">-->
<!--                        <h5></h5>-->
<!--                        <div class="alert alert-info text-center">-->
<!--                            <i class="fa fa-desktop fa-5x"></i>-->
<!--                            <h3>Tablas activas </h3>-->
<!--                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Tablas</h5>
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3>Cantidad de usuarios</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">
                                Crear tabla

                            </div>
                        </div>
                    </div>
                    <div class="row" style="">
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <h5>Administradores</h5>
                            <div class="panel panel-primary text-center no-boder bg-color-blue">
                                <div class="panel-body">
                                    <i class="fa fa-bar-chart-o fa-5x"></i>
                                    <h3>Cantidad de usuarios</h3>
                                </div>
                                <div class="panel-footer back-footer-blue">
                                    Asignar Rol

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <h5>Categorias</h5>
                            <div class="panel panel-primary text-center no-boder bg-color-blue">
                                <div class="panel-body">
                                    <i class="fa fa-bar-chart-o fa-5x"></i>
                                    <h3>Cantidad de usuarios</h3>
                                </div>
                                <div class="panel-footer back-footer-blue">
                                    Registrar Categoria

                                </div>
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
<!--                    <div class="col-md-4">-->
<!--                        <div class="form-group">-->
<!--                            <label>Text Input Example</label>-->
<!--                            <input class="form-control" />-->
<!--                            <p class="help-block">Help text here.</p>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="col-md-4">
                        <label>Click to see blank page</label>
                        <a href="admin.php" target="_blank" class="btn btn-danger btn-lg btn-block">VISITAR PAGINA WEB</a>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />


                <div class="row">
<!--                    <div class="col-md-4">-->
<!--                        <h5>Panel Sample</h5>-->
<!--                        <div class="panel panel-primary">-->
<!--                            <div class="panel-heading">-->
<!--                                Default Panel-->
<!--                            </div>-->
<!--                            <div class="panel-body">-->
<!--                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>-->
<!--                            </div>-->
<!--                            <div class="panel-footer">-->
<!--                                Panel Footer-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-md-4">-->
<!--                        <h5>Accordion Sample</h5>-->
<!--                        <div class="panel-group" id="accordion">-->
<!--                            <div class="panel panel-default">-->
<!--                                <div class="panel-heading">-->
<!--                                    <h4 class="panel-title">-->
<!--                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">Collapsible Group Item #1</a>-->
<!--                                    </h4>-->
<!--                                </div>-->
<!--                                <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">-->
<!--                                    <div class="panel-body">-->
<!--                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="panel panel-default">-->
<!--                                <div class="panel-heading">-->
<!--                                    <h4 class="panel-title">-->
<!--                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Collapsible Group Item #2</a>-->
<!--                                    </h4>-->
<!--                                </div>-->
<!--                                <div id="collapseTwo" class="panel-collapse in" style="height: auto;">-->
<!--                                    <div class="panel-body">-->
<!--                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.-->
<!---->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="panel panel-default">-->
<!--                                <div class="panel-heading">-->
<!--                                    <h4 class="panel-title">-->
<!--                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed">Collapsible Group Item #3</a>-->
<!--                                    </h4>-->
<!--                                </div>-->
<!--                                <div id="collapseThree" class="panel-collapse collapse">-->
<!---->
<!---->
<!--                                    <div class="panel-body">-->
<!--                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
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
