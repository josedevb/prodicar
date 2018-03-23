<?php

function PizzaTam() {
  $db = new Conexion();
  $sql = $db->query("SELECT * FROM pizzatam;");
  if($db->rows($sql) > 0) {
    while($data = $db->recorrer($sql)) {
      $pizzatam[$data['idtama']] = array(
        'idtama' => $data['idtama'],
        'size' => $data['size'],
        'precio' => $data['precio']
      );
    }
  } else {
    $pizzatam = false;
  }
  $db->liberar($sql);
  $db->close();

  return $pizzatam;
}

?>
