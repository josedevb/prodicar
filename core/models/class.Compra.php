<?php

class Compra {

  private $db;
  private $id;
  private $idfact;
  private $idcate;
  private $referencia;
  private $cantidad;
  private $fecha;
  private $hora;
  private $iduser;

  public function __construct() {
    $this->db = new Conexion();
  }

  private function Errors($url) {
    try {
      if(empty($_POST['idfact'])) {
        throw new Exception(1);
      } else {
        $this->idfact = $this->db->real_escape_string($_POST['idfact']);
        $this->idcate = $this->db->real_escape_string($_POST['idcate']);
        $this->referencia = $this->db->real_escape_string($_POST['referencia']);
        $this->cantidad = $this->db->real_escape_string($_POST['cantidad']);
        $this->fecha = $this->db->real_escape_string($_POST['fecha']);
        $this->hora = $this->db->real_escape_string($_POST['hora']);
        $this->iduser = $this->db->real_escape_string($_POST['iduser']);
      }
    } catch(Exception $error) {
      header('location: '.$url .$error->getMessage());
      exit;
    }
  }


  public function Edit() {
    $this->id = intval($_GET['id']);
    $this->Errors('?view=compra&mode=edit&id='.$this->id.'&error=');
    $this->db->query("UPDATE catepizz SET idfact='$this->idfact' WHERE idfact='$this->id';");
    $this->db->query("UPDATE catepizz SET idcate='$this->idcate' WHERE idfact='$this->id';");
    $this->db->query("UPDATE catepizz SET idingre='$this->idingre' WHERE idfact='$this->id';");
    $this->db->query("UPDATE catepizz SET idfact='$this->idfact' WHERE idfact='$this->id';");
    header('location: ?view=compra&mode=edit&id='.$this->id.'success=true');
  }

  public function Delete() {
    $this->id = intval($_GET['id']);
    $q = "DELETE FROM compra WHERE idfact='$this->id';";
    $q .= "DELETE FROM foros WHERE id_categoria='$this->id';";
    $this->db->multi_query($q);
    header('location: ?view=compra&id='.$_SESSION['appid'].'');
  }

  public function __destruct() {
    $this->db->close();
  }

}

?>
