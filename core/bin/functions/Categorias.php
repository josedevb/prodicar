<?php

function Categorias() {
  $db = new Conexion();
  $sql = $db->query("SELECT * FROM categorias;");
  if($db->rows($sql) > 0) {
    while($data = $db->recorrer($sql)) {
      $categorias[$data['idcate']] = array(
        'idcate' => $data['idcate'],
        'nombre' => $data['nombre'],
        'contiene' => $data['contiene'],
        'descripcion' => $data['descripcion']
      );
    }
  } else {
    $categorias = false;
  }
  $db->liberar($sql);
  $db->close();

  return $categorias;
}

?>
