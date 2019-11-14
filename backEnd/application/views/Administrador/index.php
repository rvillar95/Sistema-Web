<!DOCTYPE html>
<?php $user = $this->session->userdata("administrador"); ?>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Libreta Virtual | Menu Administrador</title>
        <link rel="shortcut icon" href="<?php echo base_url() ?>lib/img/favicon.png">
        <link href="<?php echo base_url() ?>lib/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/fonts/font-awesome.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/css/toastr.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>lib/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>lib/css/mystyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="">
        <div id="wrapper">
            <div id="page-wrapper" class="gray-bg" style="padding: 0px; margin: 0px;">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #0d8ddb">
                        <center>
                            <ul class="nav navbar-top-links navbar-left">
                                <img src="<?php echo base_url() ?>lib/img/logo.png" class="img-responsive" style="width: 75px; height: 75px; margin-left:  30px;margin-bottom: 10px;margin-top: 10px;" alt=""/> 
                            </ul>
                        </center>
                        <ul class="nav navbar-top-links navbar-right" style="padding-left: 10px;">
                            <li>
                                <span class="m-r-sm text-white welcome-message"><?php echo $user[0]->nombresAdministrador . ' ' . $user[0]->apellidosAdministrador ?></span>
                            </li>

                            <li style="padding: 10px;">
                                <a id="btn" style="color: black">
                                    <i class="fa fa-sign-out"></i> Salir
                                </a>
                            </li>
                        </ul>

                    </nav>
                </div>
                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-sm-4">
                        <h2>Bienvenido al Menu Principal del Administrador</h2>
                        <ol class="breadcrumb">
                            <li>
                                <a href="<?php echo base_url() ?>Administrador">Login</a>
                            </li>
                            <li class="active">
                                <strong>Administrador</strong>
                            </li>
                        </ol>
                    </div>

                    <div class="col-sm-8">
                        <div class="title-action">
                            <a href="" class="btn btn-primary">Actualizar Pagina</a>
                        </div>
                    </div>
                </div>

                <div class="wrapper wrapper-content  animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title" style="background-color: #0d8ddb;">
                                    <h5 style="color: white">Gestionar Institución</h5> 
                                </div>
                                <div class="ibox-content" style="padding: 0px;">
                                    <a href=" <?php echo base_url(); ?>Institucion">
                                        <center>
                                            <div class="div-img sty" >
                                                <img src="<?php echo base_url() ?>lib/img/institucion.jpg"  class="img-responsive img" alt=""/>
                                            </div>
                                        </center>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title" style="background-color: #0d8ddb;">
                                    <h5 style="color: white">Gestionar Usuarios</h5> 
                                </div>
                                <div class="ibox-content" style="padding: 0px;">
                                    <a href="<?php echo base_url(); ?>Usuarios">
                                        <center>
                                            <div class="div-img sty" >
                                                <img src="<?php echo base_url() ?>lib/img/usuarios.jpg"  class="img-responsive img" alt=""/>
                                            </div>
                                        </center>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title" style="background-color: #0d8ddb;">
                                    <h5 style="color: white">Gestionar Materias</h5> 
                                </div>
                                <div class="ibox-content" style="padding: 0px;">
                                    <a href="<?php echo base_url(); ?>Materias">
                                        <center>
                                            <div class="div-img sty" >
                                                <img src="<?php echo base_url() ?>lib/img/materias.jpg"  class="img-responsive img" alt=""/>
                                            </div>
                                        </center>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title" style="background-color: #0d8ddb;">
                                    <h5 style="color: white">Gestionar Talleres</h5>
                                </div>
                                <div class="ibox-content" style="padding: 0px;">
                                    <a href=" <?php echo base_url(); ?>Talleres">
                                        <center>
                                            <div class="div-img sty" >
                                                <img src="<?php echo base_url() ?>lib/img/talleres.jpg"  class="img-responsive img" alt=""/>
                                            </div>
                                        </center>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title" style="background-color: #0d8ddb;">
                                    <h5 style="color: white">Gestionar Cursos</h5> 
                                </div>
                                <div class="ibox-content" style="padding: 0px;">
                                    <a href=" <?php echo base_url(); ?>Cursos">
                                        <center>
                                            <div class="div-img sty" >
                                                <img src="<?php echo base_url() ?>lib/img/cursos.jpg"  class="img-responsive img" alt=""/>
                                            </div>
                                        </center>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title" style="background-color: #0d8ddb;">
                                    <h5 style="color: white">Gestionar Asignaciones</h5> 
                                </div>
                                <div class="ibox-content" style="padding: 0px;">
                                    <a href=" <?php echo base_url(); ?>Asignaciones">
                                        <center>
                                            <div class="div-img sty" >
                                                <img src="<?php echo base_url() ?>lib/img/asignaciones.jpg"  class="img-responsive img" alt=""/>
                                            </div>
                                        </center>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title" style="background-color: #0d8ddb;">
                                    <h5 style="color: white">Gestionar Otros</h5> 
                                </div>
                                <div class="ibox-content" style="padding: 0px;">
                                    <a href=" <?php echo base_url(); ?>Varios">
                                        <center>
                                            <div class="div-img sty" >
                                                <img src="<?php echo base_url() ?>lib/img/otros.jpg"  class="img-responsive img" alt=""/>
                                            </div>
                                        </center>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="footer">
                    <div class="pull-right">

                    </div>
                    <div>
                        <strong>Copyright</strong> <a href="https://solucionesvillar.cl" style="color: graytext">Soluciones Villar</a>  &copy; 2018-2019
                    </div>
                </div>

            </div>
        </div>


        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="<?php echo base_url() ?>lib/js/jquery-2.1.1.js"></script>
        <script src="<?php echo base_url() ?>lib/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>lib/js/inspinia.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>lib/js/myjs.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>lib/js/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>lib/js/pace.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>lib/js/jquery.metisMenu.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>lib/js/toastr.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>lib/js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>lib/js/jquery.peity.min.js" type="text/javascript"></script>


        <script>
            $(function () {

                $(document).ready(function () {


                    // Add slimscroll to element
                    $('.scroll_content').slimscroll({
                        height: '200px'
                    })
                    $("#btn").click(function (e) {
                        e.preventDefault();
                        salir();
                    });

                });



            });
        </script>
    </body>
</html>