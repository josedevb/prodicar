 <?php include(HTML_DIR . 'overall/header.php'); ?>
<head>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
</head>
<body class="index-page">

	<?php include(HTML_DIR . '/overall/topnav.php'); 

		$usuario = $_SESSION['app_id'];
	?>

  <div class="main main-raised">
		<div class="container">
			<div class="section text-center section-landing">
			<?php
				if(isset($_GET['success'])) {
					echo '<div class="alert alert-dismissible alert-success">
						<strong>Activado!</strong> tu usuario ha sido activado correctamente.
					</div>';
				}

				if(isset($_GET['error'])) {
					echo '<div class="alert alert-dismissible alert-danger">
						<strong>Error!</strong></strong> no se ha podido activar tu usuario.
					</div>';
				}
			?>

  <div class="wrapper">
		<div class="row cajas">
			<div class="col-md-12">
				<div style="text-align:center;">
					<form action="" onsubmit="return validateForm()" method="post">
						<h1>Filtrar Compras por fecha</h1>
							<label for="de">DE</label>
							<input class="form-control" type="date" name="de" id="de">
							<label for="para">HASTA</label>
							<input class="form-control" type="date" name="para" id="para">
							<button type="submit" class="btn btn-success">Filtrar</button>
					</form>
				</div>
				<?php 
				if(isset($_POST['de']) && $_POST['para']) {
					$fechaini = substr($_POST['de'], 2, 8);
					$fechafin = substr($_POST['para'], 2, 8);
					$HTML2 = '
					<a type="button" class="btn btn-success" href="./reporteProdicarFecha.php?fechaini='.$fechaini.'&fechafin='.$fechafin.'">
						Mostrar En PDF
					</a>
					<div class="fresh-table  full-screen-table toolbar-color-orange">
						<table id="fresh-table" class="table">
						<thead>
							<tr>
								<th data-field="id">Id</th>
								<th data-field="name" data-sortable="true">Usuario </th>
								<th data-sortable="true"> Producto </th>
								<th data-sortable="true"> Referencia </th>
								<th data-sortable="true"> Cantidad  </th>
								<th data-sortable="true"> Precio total  </th>
								<th data-sortable="true"> Fecha  </th>
							</tr>
						</thead>
						<tbody>';
						$db = new Conexion();
						$query = "SELECT * FROM factura 
											inner join categorias 
											on categorias.idcate = factura.idcate 
											inner join users
											on users.iduser = factura.iduser
											inner join precio
											on precio.idprecio = categorias.idprecio	
											WHERE fecha BETWEEN '$fechaini' AND '$fechafin'";

						$querybuscarcategoria2 = $db->query($query);
						$fila3 = mysqli_fetch_assoc($querybuscarcategoria2);
							if($fila3) {
								while($fila3 = mysqli_fetch_array($querybuscarcategoria2)) {
									$HTML2 .= '<tr>
											<td>'.$fila3['idfact'].'</td>
											<td>'.$fila3['user'].'</td>
											<td>'.$fila3['nombre'].'</td>
										<td>'.$fila3['referencia'].'</td>
										<td>'.$fila3['cantidad'].'</td>
										<td>'.$fila3['precio'] * $fila3['cantidad'].'</td>
										<td>'.$fila3['fecha'].'</td>
									</tr>';
								}
								$HTML2 .= '</tbody>
									</table>
									</div>';
								echo $HTML2;
							} else {
								$HTML2 = '<div class="alert alert-dismissible alert-info"><strong>INFORMACIÓN: </strong> Todavía no existe ninguna Compra.</div>';
								echo $HTML2;
							}
					}

				?>

			<h1>Compras realizadas</h1>
			<div class="fresh-table  full-screen-table toolbar-color-orange">
				<?php

				if(false != $_compra) {
					$HTML = '<table id="fresh-table" class="table">
					<thead>
						<tr>
								<th data-field="id">Id</th>
								<th data-field="name" data-sortable="true">Usuario </th>
								<th data-sortable="true"> Producto </th>
								<th data-sortable="true"> Referencia </th>
								<th data-sortable="true"> Cantidad  </th>
								<th data-sortable="true"> Precio total  </th>
								<th data-sortable="true"> Fecha  </th>
						</tr>
					</thead>
					<tbody>';

						
						foreach($_compra as $id_compra => $compra_array ){
							// foreach($_pizzatam as $id_pizzatam => $pizzatam_array){
								$db = new Conexion();
							$querybuscarcategoria = $db->query(
									"SELECT * FROM factura 
									inner join categorias 
									on categorias.idcate = factura.idcate 
									inner join users
									on users.iduser = factura.iduser
									inner join precio
									on precio.idprecio = categorias.idprecio
									where factura.idfact = ".$_compra[$id_compra]['idfact']
								);
							$fila = mysqli_fetch_array($querybuscarcategoria);
							// $querybuscarcategoria2 = $db->query("SELECT pizzatam.size, pizzatam.precio FROM pizzatam inner join catepizz on pizzatam.idtama = catepizz.idtama where catepizz.idfact = ".$_compra[$id_compra]['idfact']);
							// $fila2=mysqli_fetch_array($querybuscarcategoria2);
							// $querybuscarcategoria3 = $db->query("SELECT ingrediente.nombre as nombre2 FROM pizzatam inner join catepizz on pizzatam.idtama= catepizz.idtama inner join costo on catepizz.idfact = costo.idfact inner join ingrediente on costo.idingre = ingrediente.idingre where catepizz.idfact = ".$_compra[$id_compra]['idfact']);
							// $ll='';
							// while (($fila3=mysqli_fetch_array($querybuscarcategoria3))){
							//   $ll.=''.$fila3['nombre2'].'-';
							// }
							// $querybuscarcategoria4 = $db->query("SELECT (sum(ingrediente.costo)+ pizzatam.precio) as total, ingrediente.nombre as nombre2 FROM pizzatam inner join catepizz on pizzatam.idtama= catepizz.idtama inner join costo on catepizz.idfact = costo.idfact inner join ingrediente on costo.idingre = ingrediente.idingre where catepizz.idfact = ".$_compra[$id_compra]['idfact']);
							// $fila4=mysqli_fetch_array($fila);

							//       if ($fila4['total'] <= $fila2['precio'])  {
							//           $supertotal = $fila2['precio'];
							//       }elseif ($fila4['total'] > $fila2['precio']) {
							//           $supertotal = $fila4['total'];
							//       }

									$HTML .= '<tr>
											<td>'.$_compra[$id_compra]['idfact'].'</td>
											<td>'.$fila['user'].'</td>
											<td>'.$fila['nombre'].'</td>
										<td>'.$fila['referencia'].'</td>
										<td>'.$fila['cantidad'].'</td>
										<td>'.$fila['precio'] * $fila['cantidad'].'</td>
										<td>'.$fila['fecha'].'</td>
									</tr>';

						}
					// }
							$HTML .= '</tbody></table>';
						} else {
							$HTML = '<div class="alert alert-dismissible alert-info"><strong>INFORMACIÓN: </strong> Todavía no existe ninguna Compra.</div>';
						}

						echo $HTML;
						?>
            <!-- <a href="?view=index">
            <button class="btn btn-simple btn-danger">Agregar otra compra
                <div class="ripple-container">
                </div>
            </button>
            </a> -->
         </div>
         </div>
       </div>
   </div>
 </div>

 </div>
 </section>
</div>
</div>
</div>
 <?php include(HTML_DIR . 'overall/footer.php'); ?>

 <script type="text/javascript">
      var $table = $('#fresh-table'),
          $alertBtn = $('#alertBtn'),
          full_screen = false,
          window_height;

      $().ready(function(){

          window_height = $(window).height();
          table_height = window_height - 20;


          $table.bootstrapTable({
              toolbar: ".toolbar",

              showRefresh: true,
              search: true,
              showToggle: true,
              showColumns: true,
              pagination: true,
              striped: true,
              sortable: true,
              height: table_height,
              pageSize: 25,
              pageList: [25,50,100],

              formatShowingRows: function(pageFrom, pageTo, totalRows){
                  //do nothing here, we don't want to show the text "showing x of y from..."
              },
              formatRecordsPerPage: function(pageNumber){
                  return pageNumber + " rows visible";
              },
              icons: {
                  refresh: 'fa fa-refresh',
                  toggle: 'fa fa-th-list',
                  columns: 'fa fa-columns',
                  detailOpen: 'fa fa-plus-circle',
                  detailClose: 'fa fa-minus-circle'
              }
          });



          $alertBtn.click(function () {
              alert("You pressed on Alert");
          });


          $(window).resize(function () {
              $table.bootstrapTable('resetView');
          });
      });


      function operateFormatter(value, row, index) {
          return [
              '<a rel="tooltip" title="Like" class="table-action like" href="javascript:void(0)" title="Like">',
                  '<i class="fa fa-heart"></i>',
              '</a>',
              '<a rel="tooltip" title="Edit" class="table-action edit" href="javascript:void(0)" title="Edit">',
                  '<i class="fa fa-edit"></i>',
              '</a>',
              '<a rel="tooltip" title="Remove" class="table-action remove" href="javascript:void(0)" title="Remove">',
                  '<i class="fa fa-remove"></i>',
              '</a>'
          ].join('');
      }

  </script>
<script>
  function validateForm() {
    var de =  document.getElementById('de').value;
    var para =  document.getElementById('para').value;
    if(de <= para) return true;
    alert("Las fecha final debe ser mayor a la fecha de inicio");
    return false;
  }
</script>
 </body>
 </html>
