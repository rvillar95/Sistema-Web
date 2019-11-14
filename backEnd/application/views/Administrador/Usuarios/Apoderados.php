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
                        <h2>Modulo Apoderados</h2>
                        <ol class="breadcrumb">
                            <li>
                                <a href="<?php echo base_url() ?>Administrador">Menu Principal</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>Usuarios">Modulo Usuarios</a>
                            </li>
                            <li class="active">
                                <strong>Modulo Apoderados</strong>
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
                        <div class="col-lg-3">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title" style="background-color: #0d8ddb;">
                                    <h5 style="color: white">Gestionar Apoderados</h5> 
                                </div>
                                <div class="ibox-content" style="padding: 0px;">
                                    <div class="row" style="padding: 20px;">
                                        <div class="col-md-12">
                                            <br/>
                                            <form   id="login" name="login" method="post" action="http://127.0.0.1/Tesis/backEnd/addApoderado" enctype="multipart/form-data">
                                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Rut Apoderado</label> <input required type="text" name="j_username" placeholder="Rut" class="form-control" autocomplete="off" onfocus="rut(this.value);" onkeypress="return esRutLogin(event)" onkeyup="this.value = this.value.toUpperCase();" onblur="formatoRut()"></div>
                                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Nombres Apoderado</label> <input required type="text" name="nombre" placeholder="Ingrese nombre del Apoderado" class="form-control"></div>
                                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Apellidos Apoderado</label> <input required type="text" name="apellido" placeholder="Ingrese apellido del Apoderado" class="form-control"></div>
                                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Fecha Nacimiento Apoderado</label> <input required type="date" name="nacimiento" placeholder="Ingrese Fecha Nacimiento del Apoderado" class="form-control"></div>
                                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Número Apoderado</label> <input required type="text" name="numero" placeholder="Ingrese Numero del Apoderado" class="form-control"></div>
                                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Correo Apoderado</label> <input required type="email" name="correo" placeholder="Ingrese Correo del Apoderado" class="form-control"></div>
                                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Parentesco Apoderado</label> 
                                                    <select class="form-control" name="parentesco" required="false" id="getSelectParentesco">

                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Foto Apoderado</label> <input  type="file" name="foto" placeholder="Seleccione el archivo" class="form-control"></div>
                                                <div class="form-group form-group col-lg-6 col-md-6 col-sm-6 col-xs-6"><button type="submit" class="btn btn-primary" style="background-color: black; color: white; ">Agregar Apoderado</button></div> 
                                                

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title" style="background-color: #0d8ddb;">
                                    <h5 style="color: white">Tabla Apoderados</h5> 
                                </div>
                                <div class="ibox-content" style="padding: 0px;">
                                    <div class="row" style="padding: 20px;">
                                        <h2><strong>Registros de Apoderados</strong></h2>
                                        <div class="table-responsive">
                                            <table id="tabla_apoderados" class="table table-striped table-bordered table-hover dataTables-apoderados" >
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Rut</th>
                                                        <th>Nombre</th>
                                                        <th>Numero</th>
                                                        <th>Correo</th>
                                                        <th>Estado</th>
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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

        <div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Editar Apoderado</h4>
                        <small class="font-bold">En este modulo podras editar todos los datos de cualquier Apoderado.</small>
                    </div>
                    <div class="modal-body" id="info-apoderados">
                    </div>
                </div>
            </div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="<?php echo base_url() ?>lib/js/rut" type="text/javascript"></script>
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
        <script src="<?php echo base_url() ?>lib/js/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>lib/js/tables.js" type="text/javascript"></script>


        <script>
                                                    $(function () {

                                                        $(document).ready(function () {
                                                            getSelectParentesco();

                                                            $('.dataTables-apoderados').DataTable({
                                                                "ajax": {
                                                                    url: "<?php echo site_url() ?>getTablaApoderados",
                                                                    type: 'GET'
                                                                },
                                                                "columnDefs": [
                                                                    {
                                                                        "targets": 6,
                                                                        "data": null,
                                                                        "defaultContent": '<button type="button" id="btnEditarApoderado" class="btn btn-info" data-toggle="modal" data-target="#myModal5"><i class="glyphicon glyphicon-pencil"></i></button>'
                                                                    }

                                                                ],
                                                                dom: '<"html5buttons"B>lTfgitp',
                                                                buttons: [
                                                                    {extend: 'copy'},
                                                                    {extend: 'csv'},
                                                                    {extend: 'excel', title: 'Lista de Apoderados'},
                                                                    {extend: 'pdf', title: 'Lista de Apoderados'},
                                                                    {extend: 'print',
                                                                        customize: function (win) {
                                                                            $(win.document.body).addClass('white-bg');
                                                                            $(win.document.body).css('font-size', '10px');
                                                                            $(win.document.body).find('table')
                                                                                    .addClass('compact')
                                                                                    .css('font-size', 'inherit');
                                                                        }
                                                                    }
                                                                ]

                                                            });
                                                            // Add slimscroll to element
                                                            $('.scroll_content').slimscroll({
                                                                height: '200px'
                                                            });

                                                            $("body").on("click", "#btnEditarApoderado", function (e) {
                                                                e.preventDefault();
                                                                var id = $(this).parent().parent().children()[0];
                                                                getDatosApoderado($(id).text());

                                                            });
                                                            $("#btn").click(function (e) {
                                                                e.preventDefault();
                                                                salir();
                                                            });

                                                        });



                                                    });
        </script>
    </body>
</html>