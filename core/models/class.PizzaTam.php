

<?php

class PizzaTam {

  private $db;
  private $id;
  private $size;
  private $precio;
  private $idtama;

  public function __construct() {
    $this->db = new Conexion();
  }

  private function Errors($url) {
    try {
      if(empty($_POST['size']) and empty($_POST['precio'])) {
        throw new Exception(1);
      } else {
        $this->size =  $this->db->real_escape_string($_POST['size']);
        $this->precio =  $this->db->real_escape_string($_POST['precio']);
      }
    } catch(Exception $error) {
      header('location: '.$url .$error->getMessage());
      exit;
    }
  }

  public function Edit() {
    $this->id = intval($_GET['id2']);
    $this->Errors('?view=pizzatam&mode=edit2&id2='.$this->id.'&error=');
    $this->db->query("UPDATE pizzatam SET size='$this->size' WHERE idtama='$this->id';");
    $this->db->query("UPDATE pizzatam SET precio='$this->precio' WHERE idtama='$this->id';");
    header('location: ?view=pizzatam&mode=edit2&id2='.$this->id.'&success=true');
  }

  public function Delete() {
    $this->id = intval($_GET['id2']);
    $q = "DELETE FROM pizzatam WHERE idtama='$this->id';";
    $this->db->multi_query($q);
    header('location: ?view=categorias');
  }

  public function __destruct() {
    $this->db->close();
  }

}

?>
