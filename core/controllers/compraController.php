<?php
if(isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']]['permisos'] >= 0) {

  $isset_id = isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id'] >= 1;


  require('core/models/class.Compra.php');

  $compra = new Compra();

  switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
    case 'add':
      if($_POST) {
        $compra->Add();
      } else {
        include(HTML_DIR . 'compra/add_compra.php');
      }
    break;
    case 'edit':
      if($isset_id and array_key_exists($_GET['id'],$_compra)) {
        if($_POST) {
          $compra->Edit();
        } else {
          include(HTML_DIR . 'compra/edit_compra.php');
        }
      } else {
        header('location: ?view=compra&id='.$_SESSION['app_id'].'');
      }
    break;
    case 'delete':
      if($isset_id) {
        $compra->Delete();
      } else {
        header('location: ?view=compra&id='.$_SESSION['app_id'].'');
      }
    break;
    default:
      include(HTML_DIR . 'compra/all_compra.php');
    break;
  }
} else {
  header('location: ?view=index');
}

?>
