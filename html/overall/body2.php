<?php 	error_reporting(E_ERROR | E_PARSE); // Desactiva la notificación y warnings de error en php.
$usuario = $_SESSION['app_id'];
$queryusuario = $db->query("SELECT * FROM datospersonales where iduser = $usuario");

while($fila6 = mysqli_fetch_array($queryusuario)){
  $nombre = $fila6['nombre'];
  $apellido = $fila6['apellido'];
  $direccion = $fila6['direccion'];
  $numero = $fila6['numero'];
  $razon_social = $fila6['razon_social'];
}

if ( isset ($_POST['Submit']) )
  {
  $nombre=$_POST['nombre'];
  $apellido=$_POST['apellido'];
  $direccion=$_POST['direccion'];
  $numero = $_POST['numero'];
  $pizza = $_POST['pizza'];
  $tamano = $_POST['tamano'];

  $queryInsertar2 = $db->query("INSERT INTO factura( idfact, iduser) values ( null, '$usuario') "); 

  $queryBuscar1 = $db->query("SELECT * FROM factura where iduser = '$usuario'");
  while($fila3 = mysqli_fetch_array($queryBuscar1)){
    $factura = $fila3['idfact'];  
  }

  $queryBuscar2 = $db->query("SELECT * FROM categorias where nombre = '$pizza'");
  while($fila4 = mysqli_fetch_array($queryBuscar2)){
    $idpizza = $fila4['idcate'];  
  }

  $queryInsertar = $db->query("INSERT INTO catepizz( idcatepizz, idcate, idtama, idfact) values ( null, '$idpizza', '$tamano', '$factura' ) ");
  $queryBuscar3 = $db->query("SELECT * FROM catepizz where idcatepizz = '$factura'");

  while($fila5 = mysqli_fetch_array($queryBuscar3)) {
      $idcatepizz2 = $fila5['idcatepizz'];  
  }

  foreach ($_POST['CheckBox'] as $idinteres) {
    $queryInsertar3 = $db->query("INSERT INTO costo( idcosto, idingre, idcatepizz) values ( null, '$idinteres', '$idcatepizz2')"); 
  }
																			
  echo "<meta http-equiv='refresh' content='0;url=views/loader/loader.html' />";
}?> 

<head>
	<link rel="stylesheet" href="views/material/css/animate.min.css" type="text/css">
	<script src="views/material/js/bootstrap.min.js"></script>
				<link rel="stylesheet" href="views/material/css/estilo.css" type="text/css">
</head>

<div class="main main-raised">
	<div class="container">
		<div class="section text-center section-landing">
			<div class="row">
					<div class="col-md-8 col-md-offset-2">
							<h2 class="title">Menú </h2>
							<h5 class="description">Conoce nuestro Menú.</h5>
					</div>
			</div>
            <!-- Inicio de la carta -->

<div class="col-sm-10 col-sm-offset-1">
<?php
	$querycartas = $db->query("SELECT * FROM categorias");
	$queryprecio = $db->query("SELECT * FROM pizzatam");
		while($fila2 = mysqli_fetch_array($queryprecio))
    {
      $vi[] = $fila2['precio'];
      $vi2[] = $fila2['size'];
    }
		while ($fila=mysqli_fetch_array($querycartas))
		{
				?>
		<div class="col-md-4 col-sm-6">
			<div class="card-container">
				<div class="card">
						<div class="front">
								<div class="cover">
										<img src="views/images/body21.jpg"/>
								</div>
								<div class="user">
										<?php echo '<img class="img-circle" src="'.$fila['imagen'].'" />';?>
								</div>
								<div class="content">
										<div class="main">
												<h3 class="name"><?php echo $fila['nombre'];?></h3><br>
												<p class="text-center"><?php echo $fila['contiene'];?></p>
										</div>
										<div class="footer">
												<i class="fa fa-mail-forward"></i> Comprar
										</div>
								</div>
						</div> <!-- end front panel -->
						<div class="back">
								<div class="content">
										<div class="main">
												<h4 class="text-center">Descripción</h4><br>
												<p class="text-center"><?php echo $fila['descripcion'];?></p>
												<div style="margin-top: 8%; " class="stats-container">
														<?php
																for ($i=0; $i < 3; $i++) {
																echo '<div class="stats">
																<h4>'.$vi[$i].'</h4>
																<p>
																	'.$vi2[$i].'
																</p>
																</div>';
																}
														?>

												</div>

										</div>
								</div>

								<div style="height: 30%; margin-top:7%; background-color:#2CA8FF;" class="footer">
									<?php
										if(isset($_SESSION['app_id'])) {
												echo '<a rel="tooltip" title="Preciona para comprar" data-placement="bottom" data-toggle="modal" data-target="#Compra'.$fila['idcate'].'" class="btn btn-info">
													      <i class="fa fa-sign-in"></i><p style="color: white; margin-top: 15%; font-size: 15px"> Comprar</p>
                              </a>';
										}
								?>
								</div>
						</div>
				</div> <!-- end back panel -->
		</div> <!-- end card -->
</div> <!-- end card-container -->
	<!-- end col sm 3 -->
<!-- Fin de la carta-->
<div class="modal fade" id="Compra<?php echo $fila['idcate'] ?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="material-icons">clear</i></button>
        <h4 style="color:red;"><center><i class="fa fa-shopping-cart" aria-hidden="true"></i> Formulario de Compra</center></h4>
      </div>
      <div class="modal-body">
        <div class="panel panel-primary">
          <div class="section text-center section-landing">
            <div style="color:#506a85" class="panel-heading text-center"><span><i class="fa fa-angle-down" aria-hidden="true"></i></span>&nbsp;&nbsp;Ingresa tu Pedido</div>
              <form action  id="validarCompra" name="validarCompra" method="post" >
                <table>
                  <tr>
                    <td>
                      <div class="form-group">
                        <label for="nombre" class="col-md-2 col-sm-2 col-xs-2 control-label">Nombre:</label>
                        <div class="col-md-10 col-xs-10 col-sm-10">
                          <input type="text" class="form-control" name="nombre" id="nombre" maxlength="30" disabled value="<?=$nombre;?>">
                        </div>
                        
                        <label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Apellido:</label>
                        <div class="col-md-10 col-xs-10 col-sm-10">
                          <input type="text" class="form-control" name="apellido" id="apellido" disabled value="<?php echo $apellido; ?>">
                        </div>

                        <label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Dirección de destino:</label>
                        <div class="col-md-10 col-xs-10 col-sm-10">
                          <input type="text" class="form-control" name="direccion" id="direccion" disabled value="<?php echo $direccion; ?>">
                        </div>  
                        <label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Número de contacto:</label>
                        <div class="col-md-10 col-xs-10 col-sm-10">
                            <input type="text" class="form-control" name="numero" id="numero" disabled value="<?php echo $numero; ?>">
                        </div>
                        <label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Producto:</label>
                        <div class="col-md-10 col-xs-10 col-sm-10">
                            <?php echo '<input class="form-control" name="pizza" id="pizza" value="'.$fila['nombre'].'" readonly="readonly"> ';?>
                        </div>

                        <label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Razón social:</label>
                        <div class="col-md-10 col-xs-10 col-sm-10">
                            <input type="text" class="form-control" name="razon_social" id="razon_social" value="<?php echo $razon_social; ?>" disabled value="<?php echo $numero; ?>">
                        </div>

                        <label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Ref. transferencia:</label>
                        <div class="col-md-10 col-xs-10 col-sm-10">
                          <input type="text" class="form-control" required name="referencia" id="referencia">
                        </div>

                        <label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Cantidad (Kg's):</label>
                        <div class="col-md-10 col-xs-10 col-sm-10">
                          <input type="number" min="1" max="99" class="form-control" value="1" name="cantidad" id="cantidad">
                        </div>
                        
                      <?php
                        /*echo" 
                          <label for='extra' class='col-md-2 col-sm-2 col-xs-2 control-label'>Ingrediente extra:</label>
                            <div style='color:#506a85' class='col-md-10 col-xs-10 col-sm-10' id='extra'>";
                              $extra = $db->query("SELECT * FROM ingrediente"); 
                              while (($fila=mysqli_fetch_array($extra)))
                              {
                                $id= $fila['idingre'];
                                $nombreIngre= $fila['nombre'];

                              echo "$nombreIngre : <input name='CheckBox[]' type='checkbox' class='' value='$id' ";
                              foreach ($_POST['CheckBox'] as $idI)
                              {
                                if($id == $idI )
                                {
                                  echo "checked ";
                                }
                              }
                              echo " > &nbsp<br>";
                            }
                        echo "</div>";

                      echo "<label for='tamaño' class='col-md-2 col-sm-2 col-xs-2 control-label'>Tamaño:</label>
                              <div class='col-md-10 col-xs-10 col-sm-10'>
                                <select name='tamano' class='form-control' id='tamaño'>";

                          $querybuscartamaño = $db->query("SELECT * FROM pizzatam");
                              while (($fila=mysqli_fetch_array($querybuscartamaño)))
                              {
                                $idtama= $fila['idtama'];
                                $nombretama= $fila['size'];
                                echo '<option value="'.$idtama.'"';
                                echo " >$nombretama </option>";
                              }

                          echo "</select>";
                          echo "</div>";
                      */?>
                      </td>
                      <br>
                      </tr> 
                        <tr>
                        <td colspan="3">
                        <div class="text-center col-md-10 col-xs-10 col-sm-10">
                      <input type="submit" name="Submit" value="Comprar" style="margin-left:20%" class="btn btn-turquoise">
                    </div>
                  </td>
                </tr>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
	</div>
</div>
    	<?php
				}
      ?>
		  </div>
    </div>
	</div>
</div>
  <script type="text/javascript">
  $().ready(function(){
    $('[rel="tooltip"]').tooltip();
  });

  function rotateCard(btn){
      var $card = $(btn).closest('.card-container');
      console.log($card);
      if($card.hasClass('hover')){
          $card.removeClass('hover');
      } else {
          $card.addClass('hover');
      }
    }
</script>