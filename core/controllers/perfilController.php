<?php
if(isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']]['permisos'] >= 0) {

  $isset_id = isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id'] >= 1;


  require('core/models/class.Perfil.php');

  $users2 = new DatosPersonales();
  $users = new DatosPersonales();
switch (isset($_GET['mode']) ? $_GET['mode'] : null) {

    case 'edit':
      if($isset_id and array_key_exists($_GET['id'],$_users2)) {
        if($_POST) {
          $users2->Edit();
        } else {
          include(HTML_DIR . 'perfil/editPerfil.php');
        }
      } else {
        header('location: ?view=perfil&id='.$_SESSION['app_id'].' ');
      }
    break;

    case 'edit2':
    if($isset_id and array_key_exists($_GET['id'],$_users)) {
      if($_POST) {
        $users->Edit2();
      } else {
        include(HTML_DIR . 'perfil/editPerfil.php');
      }
    } else {
      header('location: ?view=perfil&id='.$_SESSION['app_id'].' ');
    }
    break;
    default:
      include(HTML_DIR . 'perfil/perfil.php');
    break;
  }
} else {
  header('location: ?view=index');
}

?>
