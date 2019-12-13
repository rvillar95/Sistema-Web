<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Libreta Virtual | Login</title>
        <link href="<?php echo base_url() ?>lib/css/toastr.min.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="<?php echo base_url() ?>lib/img/favicon.png">
        <link href="<?php echo base_url() ?>lib/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/fonts/font-awesome.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/css/style.css" rel="stylesheet">
        
        <link href="<?php echo base_url() ?>lib/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>lib/css/mystyle.css" rel="stylesheet" type="text/css"/>
    </head>

    <body class="black-bg" >


        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="middle-box text-center loginscreen animated fadeInDown" style="z-index: 1000;">
                    <h1 class="logo-name">   <img src="<?php echo base_url() ?>lib/img/logo-login.png" class="img-responsive" alt=""/></h1>

                    <h3 style="color:white;">Bienvenido a Libreta Virtual</h3>
               
                 
                    <form id="login" name="login" method="post" autocomplete="off" target="_top">
                        <div class="form-group"><input id="rutUsuario" type="text" name="j_username" placeholder="Rut" class="form-control" autocomplete="off" onfocus="rut(this.value);" onkeypress="return esRutLogin(event)" onkeyup="this.value = this.value.toUpperCase();" onblur="formatoRut()"></div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="clave" placeholder="Clave">
                        </div>
                        <button type="submit" id="btnAgregarUsuario" style="background-color: black; color: white;" class="btn block full-width m-b">Entrar</button>
                    </form>
                    <strong style="color: white">Copyright</strong> <a href="https://solucionesvillar.cl" style="color: whitesmoke">Soluciones Villar &copy; 2018-2019</a>  
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>

        </div>


        <div class="modal modal-info fade" id="modal-session">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Seleccione con que Rol quiere ingresar al Sistema.</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" >
                            <select id="selectSession" class="form-control" >

                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="button" id="btnEntrar" class="btn btn-outline">Ingresar al Sistema</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>


        <!-- Mainly scripts -->
        
        <script src="<?php echo base_url() ?>lib/js/myjs.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>lib/js/jquery-2.1.1.js"></script>
        <script src="<?php echo base_url() ?>lib/js/toastr.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>lib/js/bootstrap.min.js"></script>
        

        <script>
                                    function check(e) {
                                        tecla = (document.all) ? e.keyCode : e.which;

                                        //Tecla de retroceso para borrar, siempre la permite
                                        if (tecla == 8 || tecla == 107) {
                                            return true;
                                        }

                                        // Patron de entrada, en este caso solo acepta numeros y letras
                                        patron = /[0-9]/;
                                        tecla_final = String.fromCharCode(tecla);
                                        return patron.test(tecla_final);
                                    }

                                    $("#btnAgregarUsuario").click(function (e) {
                                        e.preventDefault();
                                        IniciarSesion();

                                    });

                                    $("#btnEntrar").click(function (e) {
                                        e.preventDefault();
                                        ingresoMultiple();
                                    });
        </script>

    </body>

</html>
