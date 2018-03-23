<!DOCTYPE html>
<!--[E 8]> <html lang="en" class="ie8 no-js"> <![end]-->
<!--[IE 9]> <html lang="en" class="ie9 no-js"> <![end]-->
<html lang="en">
 <head>
   <meta charset="utf-8" />
   <title>Casa Italiana | Perfil De Usuario</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta content="width=device-width, initial-scale=1" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
     <link rel="shortcut icon" href="views/images/logo.png" />

   <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
   <link href="views/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
   <link href="views/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
   <link href="views/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   <link href="views/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />

   <link href="views/assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
   <link href="views/assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />

   <link href="views/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />

   <link href="views/assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
   <link href="views/assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
   <link href="views/assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />


    <body class="page-container-bg-solid page-md">
<div class=" col-md-12 col-sm-12 col-xs-12 text-center" style="background-color:#3b434c; color:#F44336;" >
  <h1>Editar tu perfil</h1>
</div>
        <div class="page-wrapper">
            <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                </div>
            </div>
            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- CONTENEDOR -->

                    <div class="page-container">
                        <!-- CONTENIDO -->
                        <div class="page-content-wrapper">
                            <div class="page-content">
                                <div class="container">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <div class="page-content-inner">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- Perfil sidebard -->
                                                <div class="profile-sidebar">
                                                    <div class="portlet light profile-sidebar-portlet ">
                                                        <!-- SIDEBAR foto -->
                                                        <div class="profile-userpic">
                                                            <img src="views/images/default-avatar.png" class="img-responsive picture-src" id="wizardPicturePreview" alt=""> </div>
                                                        <!-- FIN SIDEBAR foto -->
                                                        <!-- SIDEBAR Usuario -->
                                                        <div class="profile-usertitle">
                                                          <div class="profile-usertitle-name" style="color:#EF5350"><?php echo $_users2[$_GET['id']]['nombre'];

                                                          echo " ".$_users2[$_GET['id']]['apellido'] ?>
                                                          </div>

                                                        </div>
                                                        <!-- FIN SIDEBAR Usuario -->
                                                        <!--MENU izquierdo -->
                                                        <div class="profile-usermenu">
                                                            <ul class="nav">
                                                              <li class='active'>
                                                                <a href="?view=index">
                                                                   <i class='icon-settings'></i>Página Príncipal</a>
                                                              </li>
                                                              <li class='active'>
                                                                <a href="?view=perfil&id=<?php echo $_GET['id'];?>">
                                                                    <i class='icon-settings'></i>Volver al menú anterior</a>
                                                              </li>
                                                              <li class='active'>
                                                                <a href="?view=logout">
                                                                    <i class='icon-logout'></i>Salir</a>
                                                              </li>
                                                            </ul>
                                                        </div>
                                                        <!-- FIN MENU -->
                                                    </div>

                                                </div>
                                                <!-- Contenido de perfil -->
                                                <div class="profile-content">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="portlet light ">
                                                                <div class="portlet-title tabbable-line">
                                                                    <div class="caption caption-md">
                                                                        <i class="icon-globe theme-font hide"></i>
                                              <span class="caption-subject bold uppercase" style="color:#EF5350;">Cuenta</span>
                                                                    </div>
                                                                  <ul class="nav nav-tabs">
                                                                        <li class="active">
                                                                            <a href="#tab_1_1" data-toggle="tab">Información Personal</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#tab_1_3" data-toggle="tab">Cambiar Contraseña</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <?php
                                                                if(isset($_GET['success'])) {
                                                                  echo '<div class="alert alert-dismissible alert-success">
                                                                    <strong>Modificado!</strong> Tus datos personales han sido modificados.
                                                                  </div>';
                                                                }

                                                                if(isset($_GET['error'])) {
                                                                  echo '<div class="alert alert-dismissible alert-danger">
                                                                    <strong>Error!</strong></strong> No se ha podido modificar tus datos.
                                                                  </div>';
                                                                }
                                                                ?>
                                                                <div class="portlet-body">
                                                                    <div class="tab-content">
                                                                        <!-- Tabla de informacion personal del usuario -->
                                                                        <div class="tab-pane active" id="tab_1_1">
                                                                            <form action="?view=perfil&mode=edit&id=<?php echo $_GET['id'];?>" method="POST" id="form_perfil" name="form_perfil" enctype="application/x-www-form-urlencoded" novalidate="novalidate">
                                                                                <div class="form-body">

                                                                                    <div class="form-group form-md-line-input">
                                                                                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $_users2[$_GET['id']]['nombre']; ?>">
                                                                                        <label for="nombre">Nombre
                                                                                        </label>
                                                                                        <span class="help-block"></span>
                                                                                    </div>

                                                                                    <div class="form-group form-md-line-input">
                                                                                        <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $_users2[$_GET['id']]['apellido']; ?>">
                                                                                        <label for="apellido">Apellido
                                                                                        </label>
                                                                                        <span class="help-block"></span>
                                                                                    </div>

                                                                                    <div class="form-group form-md-line-input form-md-floating-label">
                                                                                        <input class="form-control" name="direccion" id="direccion" rows="3" value="<?php echo $_users2[$_GET['id']]['direccion']; ?>">
                                                                                        <label for="direccion">Dirección</label>
                                                                                        <span class="help-block"></span>
                                                                                    </div>

                                                                                    <div class="form-group form-md-line-input form-md-floating-label">
                                                                                        <input type="text" class="form-control" name="numero" id="numero" maxlength="11" value="<?php echo $_users2[$_GET['id']]['numero']; ?>" >
                                                                                        <label for="numero">Número telefónico</label>
                                                                                        <span class="help-block"></span>
                                                                                    </div>

                                                                                    <div class="form-group form-md-line-input form-md-floating-label">
                                                                                        <input class="form-control" name="informacion" id="informacion" rows="3"  value="<?php echo $_users2[$_GET['id']]['informacion']; ?>">
                                                                                        <label for="informacion">Acerca de tí</label>
                                                                                        <span class="help-block"></span>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="form-actions">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <button type="submit" class="btn green-meadow">Enviar</button>
                                                                                            <button type="reset" class="btn dark">Borrar</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <!-- Fin info usuario -->
                                                                        <!-- Fin cambiar foto -->
                                                                        <!-- Cambiar contraseña  -->
                                                                        <div class="tab-pane" id="tab_1_3">
                                                                            <form action="?view=perfil&mode=edit2&id=<?php echo $_GET['id'];?>" method="POST" id="form_contrasena" enctype="application/x-www-form-urlencoded" novalidate="novalidate">
                                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                                    <input type="password" class="form-control" name="pass" id="clave" >
                                                                                    <label for="pass">Nueva Contraseña</label>
                                                                                    <span class="help-block"></span>
                                                                                </div>
                                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                                    <input type="password" class="form-control"  name="pass2" id="clave2">
                                                                                    <label for="pass2">Repita la contraseña</label>
                                                                                    <span class="help-block"></span>
                                                                                </div>
                                                                                <div class="form-actions">
                                                                                    <div class="row">

                                                                                        <div class="col-md-12">
                                                                                            <button type="submit" class="btn green-meadow">Enviar</button>
                                                                                            <button type="reset" class="btn dark">Borrar</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <!-- FIN CAMBIAR CONTRASEÑA -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- fin contenido perfil -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN CONTENEDOR -->
                </div>
            </div>
            <div class="page-wrapper-row">
                <div class="page-wrapper-bottom">

                    <!--FOOTER -->
                    <!-- <div class="page-prefooter">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                                    <h2>Dirección Principal</h2>
                                    <p>Av. Delicias con calle 72. <br>Codigo postal 4002.</br>
                                    J-12547583-3</p>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs12 footer-block">
                                    <h2>Aceptamos cualquier metodo de pago</h2>
                                  <div style="margin-top:-5px">
                                    <i class="icon-credit-card" style="font-size:30px;padding:10px"></i>

                                    <i class="fa fa-dollar"  style="font-size:30px;padding:10px"></i>

                                    <i class="fa fa-euro"  style="font-size:30px;padding:10px"></i>
                                  </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                                    <h2>Siguenos en nuestras redes</h2>
                                    <ul class="social-icons">
                                        <li>
                                            <a href="javascript:;" data-original-title="rss" class="rss"></a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" data-original-title="facebook" class="facebook"></a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" data-original-title="twitter" class="twitter"></a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" data-original-title="googleplus" class="googleplus"></a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" data-original-title="linkedin" class="linkedin"></a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" data-original-title="youtube" class="youtube"></a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" data-original-title="vimeo" class="vimeo"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                                    <h2>Contactos</h2>
                                    <address class="margin-bottom-40"> Telefono: 0261 723 6529
                                        <br> Correo Electrónico:
                                        <a href="mailto:casaitaliana@gmail.com">casaitaliana@gmail.com</a>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- Fin -->
                    <!-- Footer 2  -->
                    <div class="page-footer">
                        <div class="container"> 2016 &copy; Casa Italiana
                         &nbsp;&nbsp;

                        </div>
                    </div>
                    <div class="scroll-to-top">
                        <i class="icon-arrow-up"></i>
                    </div>
                    <!-- fin footer2  -->
                    <!-- fin footer -->
                </div>
            </div>
        </div>
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<![endif]-->

        <script src="views/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="views/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="views/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="views/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="views/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>


        <script src="views/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="views/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>

        <!-- jquery validator -->
        <script src="views/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="views/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="views/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="views/assets/pages/scripts/form-validar.js" type="text/javascript"></script>
        <script src="views/assets/pages/scripts/validar.js" type="text/javascript"></script>
        <!-- fin jquery validator -->
        <script src="views/assets/pages/scripts/profile.min.js" type="text/javascript"></script>
        <script src="views/assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>

        <script src="views/assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="views/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="views/material/js/jquery.bootstrap.wizard.js"></script>
    </body>

</html>
