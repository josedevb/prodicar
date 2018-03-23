

<?php

class Ingrediente {

  private $db;
  private $id;
  private $nombre;
  private $costo;

  public function __construct() {
    $this->db = new Conexion();
  }

  private function Errors($url) {
    try {
      if(empty($_POST['nombre']) and empty($_POST['costo'])) {
        throw new Exception(1);
      } else {
        $this->nombre =  $this->db->real_escape_string($_POST['nombre']);
        $this->costo =  $this->db->real_escape_string($_POST['costo']);
      }
    } catch(Exception $error) {
      header('location: '.$url .$error->getMessage());
      exit;
    }
  }

  public function Edit() {
    $this->id = intval($_GET['id3']);
    $this->Errors('?view=pizzatam&mode=edit3&id3='.$this->id.'&error=');
    $this->db->query("UPDATE ingrediente SET nombre='$this->size' WHERE idingre='$this->id';");
    $this->db->query("UPDATE ingrediente SET costo='$this->precio' WHERE idingre='$this->id';");
    header('location: ?view=pizzatam&mode=edit3&id3='.$this->id.'&success=true');
  }

  public function Delete() {
    $this->id = intval($_GET['id3']);
    $q = "DELETE FROM ingrediente WHERE idingre='$this->id';";
    $this->db->multi_query($q);
    header('location: ?view=categorias');
  }

  public function __destruct() {
    $this->db->close();
  }

}

?>
