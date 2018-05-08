<?php

function Precio() {
  $db = new Conexion();
  $sql = $db->query("SELECT * FROM precio;");
  if($db->rows($sql) > 0) {
    while($data = $db->recorrer($sql)) {
      $precio[$data['idprecio']] = array(
        'idprecio' => $data['idprecio'],
        'tipo' => $data['tipo'],
        'corte' => $data['corte'],
        'precio' => $data['precio'],
        'disponible' => $data['disponible'],
      );
    }
  } else {
    $precio = false;
  }
  $db->liberar($sql);
  $db->close();

  return $precio;
}

?>
