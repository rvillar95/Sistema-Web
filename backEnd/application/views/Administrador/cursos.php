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
                    <h2>Modulo Curso</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url() ?>Administrador">Menu Principal</a>
                        </li>
                        <li class="active">
                            <strong>Modulo Curso</strong>
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
                    <div class="col-lg-4 ">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title" style="background-color: #0d8ddb">
                                <h5 style="color: white">Crear Curso</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content" style="padding: 0px;">
                                <div class="col-md-12">
                                    <br />
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Nombre Curso</label> <input required type="text" id="nombre" placeholder="Ingrese el Nombre del Curso" class="form-control"></div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label for="getAnnoEscolar">Grado Curso</label>
                                        <select class="form-control" id="apellidoCurso">
                                            <option disabled selected>Seleccione Grado Curso</option>
                                            <option value="Pre - Basica">Pre - Basica</option>
                                            <option value="Basico">Basico/a</option>
                                            <option value="Medio">Medio</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label for="getAnnoEscolar">Letra Curso</label>
                                        <select class="form-control" id="getLetraCurso">

                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label for="getAnnoEscolar">Año Escolar</label>
                                        <select class="form-control" id="getAnnoEscolar">

                                        </select>
                                    </div>
                                    <div class="form-group form-group col-lg-6 col-md-6 col-sm-6 col-xs-6"><button type="submit" id="btnAgregarCurso" class="btn btn-primary" style="background-color: black; color: white; ">Agregar Curso</button></div>
                                </div>
                            </div>
                            <div class="ibox-footer">
                                <span>Registra los cursos que quieras</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title" style="background-color: #0d8ddb">
                                <h5 style="color: white">Tabla Curso</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content" style="padding: 0px;">
                                <div class="col-md-12">
                                    <div class="row" style="padding: 20px;">
                                        <h2><strong>Registros de Cursos</strong></h2>
                                        <div class="table-responsive">
                                            <table id="tabla_curso" class="table table-striped table-bordered table-hover dataTables-curso">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Nombre</th>
                                                        <th>Grado</th>
                                                        <th>Letra</th>
                                                        <th>Año</th>
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
                            <div class="ibox-footer">
                                <span>Ve tus cursos creados</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title" style="background-color: #0d8ddb">
                                <h5 style="color: white">Crear Año Escolar</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content" style="padding: 0px;">
                                <div class="col-md-12">
                                    <br />

                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Año Escolar</label> <input required type="number" id="curso" placeholder="Ingrese el año escolar cursado" class="form-control soloNumerosPrecio"></div>
                                    <div class="form-group form-group col-lg-6 col-md-6 col-sm-6 col-xs-6"><button type="submit" id="btnAgregarAnno" class="btn btn-primary" style="background-color: black; color: white; ">Agregar Año Escolar</button></div>

                                </div>
                            </div>
                            <div class="ibox-footer">
                                Agrega el año escolar que estas cursando o por cursar.
                                <div class="wrapper wrapper-content  animated fadeInRight">
                                    <div class="row" style="padding: 20px;">
                                        <h2><strong>Registros de Año Escolar</strong></h2>
                                        <div class="table-responsive">
                                            <table id="anno" class="table table-striped table-bordered table-hover dataTables-anno">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Nombre Curso</th>
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
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title" style="background-color: #0d8ddb">
                                <h5 style="color: white">Letra Curso</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content" style="padding: 0px;">
                                <div class="col-md-12">
                                    <br />

                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Letra Curso</label> <input required type="text" id="letra" placeholder="Letra del Curso" class="form-control"></div>
                                    <div class="form-group form-group col-lg-6 col-md-6 col-sm-6 col-xs-6"><button type="submit" id="btnAgregarLetra" class="btn btn-primary" style="background-color: black; color: white; ">Agregar Letra Curso</button></div>

                                </div>
                            </div>
                            <div class="ibox-footer">

                                <div class="wrapper wrapper-content  animated fadeInRight">
                                    <div class="row" style="padding: 20px;">
                                        <h2><strong>Registros de Letra de Curso</strong></h2>
                                        <div class="table-responsive">
                                            <table id="letraT" class="table table-striped table-bordered table-hover dataTables-letra">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Letra</th>
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
            </div>
            <div class="wrapper wrapper-content  animated rotateInUpLeft" id='tablas'>

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


    <div class="modal inmodal fade" id="modal-curso" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Editar Alumno</h4>
                    <small class="font-bold">En este modulo podras editar todos los datos de cualquier Alumno.</small>
                </div>
                <div class="modal-body" id="info-alumnos">
                    <div class="row" style="padding:20px;">
                        <form id="editCurso" name="login2" method="post" enctype="multipart/form-data">
                        <input required type="text" name="id" id="id" placeholder="Ingrese el Nombre del Curso" class="hidden">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Nombre Curso</label> <input required type="text" name="nombre2" id="nombre2" placeholder="Ingrese el Nombre del Curso" class="form-control"></div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label for="getAnnoEscolar">Grado Curso</label>
                                <select class="form-control" id="apellidoCurso2" name="apellido">
                                    <option disabled selected>Seleccione Grado Curso</option>
                                    <option value="Pre - Basica">Pre - Basica</option>
                                    <option value="Basico">Basico/a</option>
                                    <option value="Medio">Medio</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label for="getAnnoEscolar2">Letra Curso: <span id="labelletra"></span></label>

                                <select class="form-control" name="letra" id="getLetraCurso2">

                                </select>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label for="getAnnoEscolar2">Año Escolar: <span id="blabla"></span></label>

                                <select class="form-control" name="aneo" id="getAnnoEscolar2">

                                </select>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label for="getAnnoEscolar">Estado Curso: <span id="estadoCu"></span></label>
                                <select class="form-control" name="estado" id="estado2">
                                    <option disabled selected>Seleccione Estado</option>
                                    <option value="1">Activo</option>
                                    <option value="2">Inactivo</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><button type="submit" class="btn btn-primary" id="btnEditar" style="background-color: black; color: white; ">Editar Curso</button></div><input type="text" value="' + o.fotoAlumno + '" name="fotoantigua" class="hidden">
                        </form>
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
                getAnnoEscolar();
                getAnnoEscolar2();

                getLetraCurso();
                getLetraCurso2();
                $('.dataTables-letra').DataTable({
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
                        url: "<?php echo site_url() ?>getLetra_Curso",
                        type: 'GET'
                    },
                    "columnDefs": [{
                            "targets": 2,
                            "data": null,
                            "defaultContent": '<button type="button" id="btnEditarLetra" class="btn btn-info" data-toggle="modal" data-target="#modal-clase"><i class="glyphicon glyphicon-pencil"></i></button>'
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
                            title: 'Lista de Letras'
                        },
                        {
                            extend: 'pdf',
                            title: 'Lista de Letras'
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

                $('.dataTables-anno').DataTable({
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
                        url: "<?php echo site_url() ?>getAnnoCurso",
                        type: 'GET'
                    },
                    "columnDefs": [{
                            "targets": 2,
                            "data": null,
                            "defaultContent": '<button type="button" id="btnEditarAnnoEscolar" class="btn btn-info" data-toggle="modal" data-target="#modal-clase"><i class="glyphicon glyphicon-pencil"></i></button>'
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
                            title: 'Lista de Membresías'
                        },
                        {
                            extend: 'pdf',
                            title: 'Lista de Membresías'
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

                $('.dataTables-curso').DataTable({
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
                        url: "<?php echo site_url() ?>getTablaCurso",
                        type: 'GET'
                    },
                    "columnDefs": [{
                            "targets": 6,
                            "data": null,
                            "defaultContent": '<button type="button" id="btnEditarCurso" class="btn btn-info" data-toggle="modal" data-target="#modal-curso"><i class="glyphicon glyphicon-pencil"></i></button>'
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
                            title: 'Lista de Letras'
                        },
                        {
                            extend: 'pdf',
                            title: 'Lista de Letras'
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

                $("#btnAgregarLetra").click(function(e) {
                    e.preventDefault();
                    agregarLetraCurso();
                    var table = $('#letraT').DataTable();
                    table.ajax.reload(function(json) {
                        $('#btnAgregarAnno').val(json.lastInput);
                    });
                });

                $('#editCurso').on('submit', function(event) {
                    event.preventDefault();
                    $.ajax({
                        url: "<?php echo base_url(); ?>editarCurso",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {

                            var table = $('#tabla_curso').DataTable();
                            table.ajax.reload(function(json) {
                                $('#editCurso').val(json.lastInput);
                            });
                            if (data == "ok") {
                                toastr.success("", "Curso editado con Exito.")
                            } else if (data == "error") {
                                toastr.warning("", "Error al editar curso.")
                            } else if (data == "error2") {
                                toastr.error("", "Error, comuniquese con el Administrador.")
                            } else if (data == "falta") {
                                toastr.warning("", "Faltan datos por completar.")
                            }
                        }
                    })
                });

                $("body").on("click", "#btnEditarCurso", function(e) {
                    e.preventDefault();
                    
                    var nombre = $(this).parent().parent().children()[1];
                    var apellido = $(this).parent().parent().children()[2];
                    var letra = $(this).parent().parent().children()[3];
                    var prueba = $(this).parent().parent().children()[4];
                    var estado = $(this).parent().parent().children()[5];


                    $("#nombre2").val($(nombre).text());
                    $("#apellidoCurso2").val($(apellido).text());
                    $("#labelletra").text($(letra).text());
                    $("#blabla").text($(prueba).text());
                    $("#estadoCu").text($(estado).text());

                    var id = $(this).parent().parent().children()[0];
                    $("#id").val($(id).text());
                    var estado = $(this).parent().parent().children()[5];
                   // editarCurso($(id).text(), $(estado).text());

                    var table = $('#tabla_curso').DataTable();
                    table.ajax.reload(function(json) {
                        $('#btnEditarCurso').val(json.lastInput);
                    });
                });


                $("#btnAgregarAnno").click(function(e) {
                    e.preventDefault();
                    AgregarAnnoCurso();
                    var table = $('#anno').DataTable();
                    table.ajax.reload(function(json) {
                        $('#btnAgregarAnno').val(json.lastInput);
                    });
                });

                $("#btnAgregarCurso").click(function(e) {
                    e.preventDefault();
                    agregarCurso();
                    var table = $('#tabla_curso').DataTable();
                    table.ajax.reload(function(json) {
                        $('#btnAgregarAnno').val(json.lastInput);
                    });
                });




                $("#btn").click(function(e) {
                    e.preventDefault();
                    salir();
                });



            });



        });
    </script>
</body>

</html>