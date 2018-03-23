<head>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
</head>
<?php include(HTML_DIR . 'overall/header.php'); ?>
<?php include(HTML_DIR . '/overall/topnav.php'); ?>

<body class="index-page">
  <div class="main main-raised">
          <div class="container">
              <div class="section text-center section-landing">
  <?php
  if(isset($_GET['success'])) {
    echo '<div class="alert alert-dismissible alert-success">
      <strong>Completado!</strong> la categoría ha sido creada.
    </div>';
  }

  if(isset($_GET['error'])) {
    echo '<div class="alert alert-dismissible alert-danger">
      <strong>Error!</strong></strong> el nombre de la categoría no puede estar vacío.
    </div>';
  }
  ?>

<!-- <div class="row container">
   <div class="pull-right">
     <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
          <a class="btn btn-danger" href="?view=configforos">GESTIONAR FOROS</a>
      </li></ul></div>
       <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
           <a class="mbr-buttons__btn btn btn-danger" href="?view=categorias">GESTIONAR CATEGORÍAS</a>
       </li></ul></div>
       <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
           <a class="mbr-buttons__btn btn btn-danger active" href="?view=categorias&mode=add"><i class="material-icons">queue</i>CREAR CATEGORÍA</a>
       </li></ul></div>
     </div> -->

    <!-- <ol class="breadcrumb">
      <li><a href="?view=index"><i class="fa fa-tags"></i> Categorías</a></li>
    </ol>
</div> -->

<div class="wrapper">
  <h1>   Menús del Día</h1>
      <div class="row cajas">
        <div class="col-md-12">
          <form class="form-horizontal" action="?view=categorias&mode=add" method="POST" enctype="application/x-www-form-urlencoded">
            <fieldset>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Categoría</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="nombre" placeholder="Nombre para la pizza">
                  <input type="text" class="form-control" name="contiene" placeholder="Contiene la pizza ">
                  <input type="text" class="form-control" name="descripcion" placeholder="Descripcion de la pizza">

           
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">Resetear</button>
                  <button type="submit" class="btn btn-primary">Crear</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include(HTML_DIR . 'overall/footer.php'); ?>



</body>
</html>
