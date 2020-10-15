<!DOCTYPE html>
<?php $user = $this->session->userdata("profesor"); ?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Libreta Virtual | Menu Administrador</title>
    <link rel="shortcut icon" href="<?php echo base_url() ?>lib/img/favicon.png">
    <link href="<?php echo base_url() ?>lib/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>lib/fonts/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>lib/css/style.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>lib/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>lib/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>lib/css/toastr.min.css" rel="stylesheet" type="text/css" />
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
                            <span class="m-r-sm text-white welcome-message"><?php echo $user[0]->nombresProfesor . ' ' . $user[0]->apellidosProfesor ?></span>
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
                    <h2>Bienvenido al Menu Principal del Profesor</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url() ?>Profesor">Login</a>
                        </li>
                        <li class="active">
                            <strong>Profesor</strong>
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
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title" style="background-color: #0d8ddb;">
                                <h5 style="color: white">Gestionar Usuarios</h5>
                            </div>
                            <div class="ibox-content" style="padding: 0px;">
                                <div class="row" style="padding: 20px;">
                                    <div class="col-md-12" id="carpeta_maestra">
                                        <br />
                                        <div id="jstree1" class="jstree jstree-1 jstree-default" role="tree" aria-multiselectable="true" tabindex="0" aria-activedescendant="j1_1" aria-busy="false">
                                            <ul class="jstree-container-ul jstree-children" role="group">
                                                <li role="treeitem" aria-selected="false" aria-level="1" aria-labelledby="j1_1_anchor" aria-expanded="true" id="j1_1" class="jstree-node  jstree-open jstree-last"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_1_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i>Admin theme
                                                    </a>
                                                    <ul role="group" class="jstree-children" id="cursos">




                                                    </ul>
                                                </li>
                                            </ul>
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
    <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-folder modal-icon"></i>
                    <h4 class="modal-title">Subir Archivo</h4>
                    <small class="font-bold">En este modal podras subir el archivo que tu desees a tu curso asignado.</small>
                </div>

                <div class="modal-body">
                    <form id="prueba" method="POST" enctype="multipart/form-data">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label for="getSelectProfesor">Materias del Curso Seleccionado</label>
                            <select required class="form-control" id="getSelectMaterias" name="materiaselect">

                            </select>
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Descripcion del Material a subir</label> <input required type="text" name="descripcion" class="form-control" name="descripcion">

                            </textarea></div>
                        <div class="form-group"><label class="col-lg-2 control-label">Archivo</label>
                            <input class="hidden" type="text" name="idCurso" id="idCurso">
                            <input class="hidden" type="text" name="curso" id="curso">
                            <input class="hidden" type="text" name="ruta" id="ruta">

                            <div class="col-lg-10"><input type="file" required placeholder="Seleccionar archivo" name="arch" class="form-control"> <span class="help-block m-b-none">Seleccione el archivo a subir.</span>
                            </div>
                        </div>
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="background-color: black; color: white; ">Subir Material</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="<?php echo base_url() ?>lib/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url() ?>lib/js/jstree.min.js"></script>
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
        $(function() {

            $(document).ready(function() {
                carpetaMaestra();

                // Add slimscroll to element
                $('.scroll_content').slimscroll({
                    height: '200px'
                })

                $("#boton").click(function(e) {
                    e.preventDefault();


                });

                $('#prueba').on('submit', function(event) {
                    event.preventDefault();
                    $.ajax({
                        url: "<?php echo base_url(); ?>subirArchivo",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {

                        
                            if (data == "ok") {
                                toastr.success("", "Archivo subido con exito")
                            } else if (data == "error") {
                                toastr.warning("", "Error al subir archivo")
                            }  else if (data == "falta") {
                                toastr.warning("", "Faltan datos por completar.")
                            }
                        }
                    })
                });

                $("body").on("click", "#boton", function(e) {
                    e.preventDefault();
                    var id = $(this).val();
                    console.log(id);
                    var variable = "#j_"+id;
                    var variableCursos = "#cursos"+id;
                    if (!$(variable).hasClass("jstree-closed") && $(variable).hasClass("jstree-open")) {
                        $(variable).addClass("jstree-closed");
                        $(variable).removeClass('jstree-open');
                        $(variableCursos).empty();
                    } else {
                        $(variable).addClass('jstree-open');
                        $(variable).removeClass('jstree-closed');
                        carpetaCursosProfesor(id);
                    }




                });
                $("body").on("click", "#verArchivosCarpeta", function(e) {
                    e.preventDefault();
                    var id = $(this).val();
                    var palabra = "#archivos" + id;
                    var li = "#j" + id;

                    if (!$(li).hasClass("jstree-closed") && $(li).hasClass("jstree-open")) {

                        $(li).addClass("jstree-closed");
                        $(li).removeClass('jstree-open');
                        $(palabra).empty();
                    } else {
                        $(li).addClass('jstree-open');
                        $(li).removeClass('jstree-closed');
                        verArchivosCurso(id);
                    }



                });

                $("body").on("click", "#botoncurso", function(e) {
                    e.preventDefault();
                    var datos = $(this).val();
                    var fila = datos.split(",");
                    var id = fila[0];
                    var ruta = fila[1];

                    $("#idCurso").val(id);
                    $("#ruta").val(ruta);
                    getSelectMateriasCurso(id);


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