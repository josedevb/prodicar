
<?php

class DatosPersonales {

  private $db;
  private $id;
  private $iddatosp;
  private $nombre;
  private $apellido;
  private $direccion;
  private $numero;
  private $informacion;
  private $razon_social;
  private $pass;

  public function __construct() {
    $this->db = new Conexion();
  }

  private function Errors($url) {
    try {
      if(empty($_POST['nombre']) and empty($_POST['apellido']) and empty($_POST['direccion']) and empty($_POST['numero']) and empty($_POST['informacion']) and empty($_POST['pass']) ) {
        throw new Exception(1);
      } else {
        $this->nombre = $this->db->real_escape_string($_POST['nombre']);
        $this->apellido = $this->db->real_escape_string($_POST['apellido']);
        $this->direccion = $this->db->real_escape_string($_POST['direccion']);
        $this->numero = $this->db->real_escape_string($_POST['numero']);
        $this->informacion = $this->db->real_escape_string($_POST['informacion']);
        $this->razon_social = $this->db->real_escape_string($_POST['razon_social']);
        $this->pass = $this->db->real_escape_string($_POST['pass']);
      }
    } catch(Exception $error) {
      header('location: '.$url .$error->getMessage());
      exit;
    }
  }


  public function Edit() {
    $this->id = intval($_GET['id']);
    $this->Errors('?view=perfil&mode=edit&id='.$this->id.'&error=');
    $this->db->query("UPDATE datospersonales SET nombre='$this->nombre' WHERE iduser='$this->id';");
    $this->db->query("UPDATE datospersonales SET apellido='$this->apellido' WHERE iduser='$this->id';");
    $this->db->query("UPDATE datospersonales SET direccion='$this->direccion' WHERE iduser='$this->id';");
    $this->db->query("UPDATE datospersonales SET numero='$this->numero' WHERE iduser='$this->id';");
    $this->db->query("UPDATE datospersonales SET informacion='$this->informacion' WHERE iduser='$this->id';");
    $this->db->query("UPDATE datospersonales SET razon_social='$this->razon_social' WHERE iduser='$this->id';");
    $this->db->query("UPDATE datospersonales SET iduser='$this->id' WHERE iduser='$this->id';");
    header('location: ?view=perfil&mode=edit&id='.$this->id.'&success=true');
  }

  public function Edit2() {
    $this->id = intval($_GET['id']);
    $this->Errors('?view=perfil&mode=edit2&id='.$this->id.'&error=');
    $this->pass = Encrypt($_POST['pass']);
    $this->db->query("UPDATE users SET pass='$this->pass' WHERE iduser='$this->id';");
    header('location: ?view=perfil&mode=edit2&id='.$this->id.'&success=true');

}
  public function __destruct() {
    $this->db->close();
  }

}

?>
