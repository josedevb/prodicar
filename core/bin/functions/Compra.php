<?php

function Compra() {
  $db = new Conexion();
  $sql = $db->query("SELECT * FROM catepizz;");
  if($db->rows($sql) > 0) {
    while($data = $db->recorrer($sql)) {
      $compra[$data['idcatepizz']] = array(
        'idcatepizz' => $data['idcatepizz'],
        'idcate' => $data['idcate'],
        'idtama' => $data['idtama'],
        'idfact' => $data['idfact']
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
