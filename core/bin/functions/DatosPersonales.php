<?php

function DatosPersonales() {
  $db = new Conexion();
  $sql = $db->query("SELECT * FROM datospersonales;");
  if($db->rows($sql) > 0) {
    while($d = $db->recorrer($sql)) {
      $users2[$d['iddatosp']] = array(
        'iddatosp' => $d['iddatosp'],
        'nombre' => $d['nombre'],
        'apellido' => $d['apellido'],
        'direccion' => $d['direccion'],
        'numero' => $d['numero'],
        'informacion' => $d['informacion'],
        'razon_social' => $d['razon_social'],
        'iduser' => $d['iduser']
      );
    }
  } else {
    $users2 = false;
  }
  $db->liberar($sql);
  $db->close();

  return $users2;
}

?>
