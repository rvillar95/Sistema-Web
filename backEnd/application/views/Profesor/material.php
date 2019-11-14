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
                                    <div class="col-md-12">
                                        <br />
                                        <div id="jstree1" class="jstree jstree-1 jstree-default" role="tree" aria-multiselectable="true" tabindex="0" aria-activedescendant="j1_1" aria-busy="false">
                                            <ul class="jstree-container-ul jstree-children" role="group">
                                                <li role="treeitem" aria-selected="false" aria-level="1" aria-labelledby="j1_1_anchor" aria-expanded="true" id="j1_1" class="jstree-node  jstree-open jstree-last"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_1_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i>Admin theme
                                                    </a>
                                                    <ul role="group" class="jstree-children">
                                                        <li role="treeitem" aria-selected="false" aria-level="2" aria-labelledby="j1_2_anchor" aria-expanded="false" id="j1_2" class="jstree-node  jstree-closed"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_2_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i>css
                                                            </a></li>
                                                        <li role="treeitem" aria-selected="false" aria-level="2" aria-labelledby="j1_6_anchor" aria-expanded="false" id="j1_6" class="jstree-node  jstree-closed"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_6_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i>email-templates
                                                            </a></li>
                                                        <li role="treeitem" aria-selected="false" aria-level="2" aria-labelledby="j1_10_anchor" aria-expanded="false" id="j1_10" class="jstree-node  jstree-closed"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_10_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i>fonts
                                                            </a></li>
                                                        <li role="treeitem" aria-selected="false" aria-level="2" aria-labelledby="j1_15_anchor" aria-expanded="true" id="j1_15" class="jstree-node  jstree-open"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_15_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i>img
                                                            </a>
                                                            <ul role="group" class="jstree-children">
                                                                <li role="treeitem" data-jstree="&quot;type&quot;:&quot;img&quot;}" aria-selected="false" aria-level="3" aria-labelledby="j1_16_anchor" id="j1_16" class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_16_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i>profile_small.jpg</a></li>
                                                                <li role="treeitem" data-jstree="&quot;type&quot;:&quot;img&quot;}" aria-selected="false" aria-level="3" aria-labelledby="j1_17_anchor" id="j1_17" class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_17_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i>angular_logo.png</a></li>
                                                                <li role="treeitem" data-jstree="&quot;type&quot;:&quot;img&quot;}" aria-selected="false" aria-level="3" aria-labelledby="j1_18_anchor" id="j1_18" class="jstree-node text-navy jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_18_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i>html_logo.png</a></li>
                                                                <li role="treeitem" data-jstree="&quot;type&quot;:&quot;img&quot;}" aria-selected="false" aria-level="3" aria-labelledby="j1_19_anchor" id="j1_19" class="jstree-node text-navy jstree-leaf jstree-last"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_19_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i>mvc_logo.png</a></li>
                                                            </ul>
                                                        </li>
                                                        <li role="treeitem" aria-selected="false" aria-level="2" aria-labelledby="j1_20_anchor" aria-expanded="true" id="j1_20" class="jstree-node  jstree-open"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_20_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i>js
                                                            </a>
                                                            <ul role="group" class="jstree-children">
                                                                <li role="treeitem" data-jstree="&quot;type&quot;:&quot;js&quot;}" aria-selected="false" aria-level="3" aria-labelledby="j1_21_anchor" id="j1_21" class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_21_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i>inspinia.js</a></li>
                                                                <li role="treeitem" data-jstree="&quot;type&quot;:&quot;js&quot;}" aria-selected="false" aria-level="3" aria-labelledby="j1_22_anchor" id="j1_22" class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_22_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i>bootstrap.js</a></li>
                                                                <li role="treeitem" data-jstree="&quot;type&quot;:&quot;js&quot;}" aria-selected="false" aria-level="3" aria-labelledby="j1_23_anchor" id="j1_23" class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_23_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i>jquery-2.1.1.js</a></li>
                                                                <li role="treeitem" data-jstree="&quot;type&quot;:&quot;js&quot;}" aria-selected="false" aria-level="3" aria-labelledby="j1_24_anchor" id="j1_24" class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_24_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i>jquery-ui.custom.min.js</a></li>
                                                                <li role="treeitem" data-jstree="&quot;type&quot;:&quot;js&quot;}" aria-selected="false" aria-level="3" aria-labelledby="j1_25_anchor" id="j1_25" class="jstree-node text-navy jstree-leaf jstree-last"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_25_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i>jquery-ui-1.10.4.min.js</a></li>
                                                            </ul>
                                                        </li>
                                                        <li role="treeitem" data-jstree="&quot;type&quot;:&quot;html&quot;}" aria-selected="false" aria-level="2" aria-labelledby="j1_26_anchor" id="j1_26" class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_26_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i> affix.html</a></li>
                                                        <li role="treeitem" data-jstree="&quot;type&quot;:&quot;html&quot;}" aria-selected="false" aria-level="2" aria-labelledby="j1_27_anchor" id="j1_27" class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_27_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i> dashboard.html</a></li>
                                                        <li role="treeitem" data-jstree="&quot;type&quot;:&quot;html&quot;}" aria-selected="false" aria-level="2" aria-labelledby="j1_28_anchor" id="j1_28" class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_28_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i> buttons.html</a></li>
                                                        <li role="treeitem" data-jstree="&quot;type&quot;:&quot;html&quot;}" aria-selected="false" aria-level="2" aria-labelledby="j1_29_anchor" id="j1_29" class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_29_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i> calendar.html</a></li>
                                                        <li role="treeitem" data-jstree="&quot;type&quot;:&quot;html&quot;}" aria-selected="false" aria-level="2" aria-labelledby="j1_30_anchor" id="j1_30" class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_30_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i> contacts.html</a></li>
                                                        <li role="treeitem" data-jstree="&quot;type&quot;:&quot;html&quot;}" aria-selected="false" aria-level="2" aria-labelledby="j1_31_anchor" id="j1_31" class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_31_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i> css_animation.html</a></li>
                                                        <li role="treeitem" data-jstree="&quot;type&quot;:&quot;html&quot;}" aria-selected="false" aria-level="2" aria-labelledby="j1_32_anchor" id="j1_32" class="jstree-node text-navy jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_32_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i> flot_chart.html</a></li>
                                                        <li role="treeitem" data-jstree="&quot;type&quot;:&quot;html&quot;}" aria-selected="false" aria-level="2" aria-labelledby="j1_33_anchor" id="j1_33" class="jstree-node text-navy jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_33_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i> google_maps.html</a></li>
                                                        <li role="treeitem" data-jstree="&quot;type&quot;:&quot;html&quot;}" aria-selected="false" aria-level="2" aria-labelledby="j1_34_anchor" id="j1_34" class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_34_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i> icons.html</a></li>
                                                        <li role="treeitem" data-jstree="&quot;type&quot;:&quot;html&quot;}" aria-selected="false" aria-level="2" aria-labelledby="j1_35_anchor" id="j1_35" class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_35_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i> invoice.html</a></li>
                                                        <li role="treeitem" data-jstree="&quot;type&quot;:&quot;html&quot;}" aria-selected="false" aria-level="2" aria-labelledby="j1_36_anchor" id="j1_36" class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_36_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i> login.html</a></li>
                                                        <li role="treeitem" data-jstree="&quot;type&quot;:&quot;html&quot;}" aria-selected="false" aria-level="2" aria-labelledby="j1_37_anchor" id="j1_37" class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_37_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i> mailbox.html</a></li>
                                                        <li role="treeitem" data-jstree="&quot;type&quot;:&quot;html&quot;}" aria-selected="false" aria-level="2" aria-labelledby="j1_38_anchor" id="j1_38" class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_38_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i> profile.html</a></li>
                                                        <li role="treeitem" data-jstree="&quot;type&quot;:&quot;html&quot;}" aria-selected="false" aria-level="2" aria-labelledby="j1_39_anchor" id="j1_39" class="jstree-node text-navy jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_39_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i> register.html</a></li>
                                                        <li role="treeitem" data-jstree="&quot;type&quot;:&quot;html&quot;}" aria-selected="false" aria-level="2" aria-labelledby="j1_40_anchor" id="j1_40" class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_40_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i> timeline.html</a></li>
                                                        <li role="treeitem" data-jstree="&quot;type&quot;:&quot;html&quot;}" aria-selected="false" aria-level="2" aria-labelledby="j1_41_anchor" id="j1_41" class="jstree-node  jstree-leaf"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_41_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i> video.html</a></li>
                                                        <li role="treeitem" data-jstree="&quot;type&quot;:&quot;html&quot;}" aria-selected="false" aria-level="2" aria-labelledby="j1_42_anchor" id="j1_42" class="jstree-node  jstree-leaf jstree-last"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j1_42_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i> widgets.html</a></li>
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


                // Add slimscroll to element
                $('.scroll_content').slimscroll({
                    height: '200px'
                })
                $("#btn").click(function(e) {
                    e.preventDefault();
                    salir();
                });

            });



        });
    </script>
</body>

</html>