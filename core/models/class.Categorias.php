

<?php

class Categorias {

  private $db;
  private $id;
  private $nombre;

  public function __construct() {
    $this->db = new Conexion();
  }

  private function Errors($url) {
    try {
      if(empty($_POST['nombre'])) {
        throw new Exception(1);
      } else {
        $this->nombre = $this->db->real_escape_string($_POST['nombre']);
        $this->contiene = $this->db->real_escape_string($_POST['contiene']);
        $this->descripcion = $this->db->real_escape_string($_POST['descripcion']);
        $this->idprecio = $this->db->real_escape_string($_POST['idprecio']);
      }
    } catch(Exception $error) {
      header('location: '.$url .$error->getMessage());
      exit;
    }
  }

  public function Add() {
    $this->Errors('?view=categorias&mode=add&error=');
    $this->db->query("INSERT INTO categorias (nombre, contiene, descripcion) VALUES ('$this->nombre', '$this->contiene', '$this->descripcion'); ");
    header('location: ?view=categorias&mode=add&success=true');
  }

  public function Edit() {
    $this->id = intval($_GET['id']);
    $this->Errors('?view=categorias&mode=add&id='.$this->id.'&error=');
    $this->db->query("UPDATE categorias SET nombre='$this->nombre' WHERE idcate='$this->id';");
    $this->db->query("UPDATE categorias SET contiene='$this->contiene' WHERE idcate='$this->id';");
    $this->db->query("UPDATE categorias SET descripcion='$this->descripcion' WHERE idcate='$this->id';");
    header('location: ?view=categorias&mode=edit&id='.$this->id.'success=true');
  }

  public function Delete() {
    $this->id = intval($_GET['id']);
    $q = "DELETE FROM categorias WHERE idcate='$this->id';";
    $q .= "DELETE FROM foros WHERE id_categoria='$this->id';";
    $this->db->multi_query($q);
    header('location: ?view=categorias');
  }

  public function __destruct() {
    $this->db->close();
  }

}

?>
