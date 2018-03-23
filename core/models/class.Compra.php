<?php

class Compra {

  private $db;
  private $id;
  private $idcatepizz;
  private $idtama;
  private $idingre;
  private $idfact;

  public function __construct() {
    $this->db = new Conexion();
  }

  private function Errors($url) {
    try {
      if(empty($_POST['idcatepizz']) and empty($_POST['idtama']) and empty($_POST['idingre']) and empty($_POST['idfact']) ) {
        throw new Exception(1);
      } else {
        $this->idcatepizz = $this->db->real_escape_string($_POST['idcatepizz']);
         $this->idtama = $this->db->real_escape_string($_POST['idtama']);
          $this->idingre = $this->db->real_escape_string($_POST['idingre']);
           $this->idfact = $this->db->real_escape_string($_POST['idfact']);
      }
    } catch(Exception $error) {
      header('location: '.$url .$error->getMessage());
      exit;
    }
  }


  public function Edit() {
    $this->id = intval($_GET['id']);
    $this->Errors('?view=compra&mode=edit&id='.$this->id.'&error=');
    $this->db->query("UPDATE catepizz SET idcatepizz='$this->idcatepizz' WHERE idfact='$this->id';");
    $this->db->query("UPDATE catepizz SET idtama='$this->idtama' WHERE idfact='$this->id';");
    $this->db->query("UPDATE catepizz SET idingre='$this->idingre' WHERE idfact='$this->id';");
    $this->db->query("UPDATE catepizz SET idfact='$this->idfact' WHERE idfact='$this->id';");
    header('location: ?view=compra&mode=edit&id='.$this->id.'success=true');
  }

  public function Delete() {
    $this->id = intval($_GET['id']);
    $q = "DELETE FROM compra WHERE idcatepizz='$this->id';";
    $q .= "DELETE FROM foros WHERE id_categoria='$this->id';";
    $this->db->multi_query($q);
    header('location: ?view=compra&id='.$_SESSION['appid'].'');
  }

  public function __destruct() {
    $this->db->close();
  }

}

?>
