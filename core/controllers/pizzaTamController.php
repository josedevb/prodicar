<?php
if(isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']]['permisos'] >= 2) {

  $isset_id = isset($_GET['id2']) and is_numeric($_GET['id2']) and $_GET['id2'] >= 1;


  require('core/models/class.PizzaTam.php');

  $pizzatam = new PizzaTam();

  switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
    case 'edit2':
      if($isset_id and array_key_exists($_GET['id2'],$_pizzatam)) {
        if($_POST) {
          $pizzatam->Edit();
        } else {
          include(HTML_DIR . 'pizzatam/editPizzatam.php');
        }
      } else {
        header('location: ?view=categorias');
      }
    break;
    case 'delete':
      if($isset_id) {
        $pizzatam->Delete();
      } else {
        header('location: ?view=categorias');
      }
    break;
    default:
      include(HTML_DIR . 'categorias/all_categoria.php');
    break;
  }
} else {
  header('location: ?view=index');
}

?>
