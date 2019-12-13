<!DOCTYPE html>
<?php $user = $this->session->userdata("administrador"); ?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Libreta Virtual | Menu Administrador</title>
    <link href="<?php echo base_url() ?>lib/css/toastr.min.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="<?php echo base_url() ?>lib/img/favicon.png">
    <link href="<?php echo base_url() ?>lib/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>lib/fonts/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>lib/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>lib/css/style.css" rel="stylesheet">
    
    <link href="<?php echo base_url() ?>lib/css/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>lib/css/mystyle.css" rel="stylesheet" type="text/css" />
</head>

<body class="">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg" style="padding: 0px; margin: 0px;">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #0d8ddb">
                    <center>
                        <ul class="nav navbar-top-links navbar-left">
                            <img src="<?php echo base_url() ?>lib/img/logo.png" class="img-responsive" style="width: 75px; height: 75px; margin-left:  30px;margin-bottom: 10px;margin-top: 10px;" alt="" />
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
                    <h2>Modulo Cursos y Profesores</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url() ?>Administrador">Menu Principal</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>Asignaciones">Menu Asignaciones</a>
                        </li>
                        <li class="active">
                            <strong>Modulo Cursos y Profesores</strong>
                        </li>
                    </ol>
                </div>

                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="" class="btn btn-primary">Actualizar Pagina</a>
                        <?php

                        ?>
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title" style="background-color: #0d8ddb;">
                                <h5 style="color: white">Cursos y Profesores </h5>
                            </div>
                            <div class="ibox-content" style="padding: 0px;">
                                <div class="row" style="padding: 20px;">
                                    <div class="col-md-12">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label for="getSelectProfesor">Profesor a Cargo</label>
                                            <select class="form-control select2" multiple="" id="getSelectProfesor">

                                            </select>
                                        </div>

                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label for="getSelectProfesor">Del Siguiente Curso</label>
                                            <select class="form-control" id="getSelectCurso">

                                            </select>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><button type="submit" id="btnAgregarRelacion" class="btn btn-primary" style="background-color: black; color: white; ">Registrar Relación</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title" style="background-color: #0d8ddb;">
                                <h5 style="color: white">Relacion Curso-Profesor </h5>
                            </div>
                            <div class="ibox-content" style="padding: 0px;">
                                <div class="row" style="padding: 20px;">
                                    <div class="col-md-12">
                                        <div class="row" style="padding: 20px;">
                                            <h2><strong>Registros Curso-Profesor</strong></h2>
                                            <div class="table-responsive">
                                                <table id="tabla_cursoProfesor" class="table table-striped table-bordered table-hover dataTables-cursoProfesor">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Nombre Curso</th>
                                                            <th>Total Profesores</th>
                                                            <th>Ver Profesores</th>
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
                </div>
            </div>
            <div class="footer">
                <div class="pull-right">

                </div>
                <div>
                    <strong>Copyright</strong> <a href="https://solucionesvillar.cl" style="color: graytext">Soluciones Villar</a> &copy; 2018-2019
                </div>
            </div>

        </div>
    </div>


    <div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Ver Profesores Asociados</h4>
                    <small class="font-bold">En este modal podras ver todos los profesores asociados a un Curso.</small>
                </div>
                <div class="modal-body">

                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>

                                            <th>ID </th>
                                            <th>Rut </th>
                                            <th>Nombre</th>
                                            <th>Numero</th>
                                            <th>Correo</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyDetalle">

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

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
        $(function() {

            $(document).ready(function() {
                getSelectProfesor();
                getSelectCurso();

                $('.dataTables-cursoProfesor').DataTable({
                    language: {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Registros _MENU_ ",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "Ningún dato disponible en esta tabla =(",
                        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sSearch": "Buscar:",
                        "sUrl": "",
                        "sInfoThousands": ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        "buttons": {
                            "copy": "Copiar",
                            "colvis": "Visibilidad"
                        }
                    },
                    "ajax": {
                        url: "<?php echo site_url() ?>getTableCursoProfesor",
                        type: 'GET'
                    },
                    "columnDefs": [{
                            "targets": 3,
                            "data": null,
                            "defaultContent": '<button type="button" id="btnVerProfesores" class="btn btn-info" data-toggle="modal" data-target="#myModal5"><i class="glyphicon glyphicon-pencil"></i></button>'
                        }

                    ],
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [{
                            extend: 'copy'
                        },
                        {
                            extend: 'csv'
                        },
                        {
                            extend: 'excel',
                            title: 'Lista de Curso - Profesor'
                        },
                        {
                            extend: 'pdf',
                            title: 'Lista de Curso - Profesor'
                        },
                        {
                            extend: 'print',
                            customize: function(win) {
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');
                                $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                            }
                        }
                    ]

                });

                $('.dataTables-Profesores').DataTable({
                    language: {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Registros _MENU_ ",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "Ningún dato disponible en esta tabla =(",
                        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sSearch": "Buscar:",
                        "sUrl": "",
                        "sInfoThousands": ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        "buttons": {
                            "copy": "Copiar",
                            "colvis": "Visibilidad"
                        }
                    },
                    "ajax": {
                        url: "<?php echo site_url() ?>getTablaProfesoresCursos",
                        type: 'GET'
                    },

                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [{
                            extend: 'copy'
                        },
                        {
                            extend: 'csv'
                        },
                        {
                            extend: 'excel',
                            title: 'Lista de Profesores Asociados'
                        },
                        {
                            extend: 'pdf',
                            title: 'Lista de Profesores Asociados'
                        },
                        {
                            extend: 'print',
                            customize: function(win) {
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
                $("#btn").click(function(e) {
                    e.preventDefault();
                    salir();
                });

                $("body").on("click", "#btnVerProfesores", function(e) {
                    e.preventDefault();
                    var id = $(this).parent().parent().children()[0];
                    getTablaProfesoresCurso($(id).text());

                });

                $("#btnAgregarRelacion").click(function(e) {
                    e.preventDefault();
                    addRelacionProfesorCurso();
                    var table = $('#tabla_cursoProfesor').DataTable();
                    table.ajax.reload(function(json) {
                        $('#btnAgregarRelacion').val(json.lastInput);
                    });

                });
            });



        });
    </script>
</body>

</html>