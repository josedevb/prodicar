<?php

function Compra() {
  $db = new Conexion();
  $sql = $db->query("SELECT * FROM factura;");
  if($db->rows($sql) > 0) {
    while($data = $db->recorrer($sql)) {
      $compra[$data['idfact']] = array(
        'idfact' => $data['idfact'],
        'idcate' => $data['idcate'],
        'referencia' => $data['referencia'],
        'cantidad' => $data['cantidad'],
        'fecha' => $data['fecha'],
        'hora' => $data['hora'],
        'iduser' => $data['iduser'],
      );
    }
  } else {
    $compra = false;
  }
  $db->liberar($sql);
  $db->close();

  return $compra;
}

?>
