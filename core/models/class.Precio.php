

<?php

class Precio {

  private $db;
  private $idprecio;
  private $tipo;
  private $corte;
  private $precio;
  private $disponible;

  public function __construct() {
    $this->db = new Conexion();
  }

  private function Errors($url) {
    try {
      if(empty($_POST['tipo']) and empty($_POST['precio']) and empty($_POST['corte'])) {
        throw new Exception(1);
      } else {
        $this->idprecio = $this->db->real_escape_string($_POST['idprecio']);
        $this->tipo =  $this->db->real_escape_string($_POST['tipo']);
        $this->corte =  $this->db->real_escape_string($_POST['corte']);
        $this->precio =  $this->db->real_escape_string($_POST['precio']);
        $this->disponible =  $this->db->real_escape_string($_POST['disponible']);
      }
    } catch(Exception $error) {
      header('location: '.$url .$error->getMessage());
      exit;
    }
  }

  public function Edit() {
    $this->id = intval($_GET['id2']);
    $this->Errors('?view=precio&mode=edit2&id2='.$this->id.'&error=');
    $this->db->query("UPDATE precio SET size='$this->size' WHERE idprecio='$this->id';");
    $this->db->query("UPDATE precio SET precio='$this->precio' WHERE idprecio='$this->id';");
    header('location: ?view=precio&mode=edit2&id2='.$this->id.'&success=true');
  }

  public function Delete() {
    $this->id = intval($_GET['id2']);
    $q = "DELETE FROM precio WHERE idprecio='$this->id';";
    $this->db->multi_query($q);
    header('location: ?view=categorias');
  }

  public function __destruct() {
    $this->db->close();
  }

}

?>
