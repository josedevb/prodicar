 <?php include(HTML_DIR . 'overall/header.php'); ?>
<head>
 <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
 <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
 </head>
 <body class="index-page">

 <?php include(HTML_DIR . '/overall/topnav.php'); ?>


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

 <!-- <div class="row container">
    <div class="pull-right">
        <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
            <a class="mbr-buttons__btn btn btn-danger active" href="?view=categorias">GESTIONAR CATEGORÍAS</a>
        </li></ul></div>
        <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
            <a class="mbr-buttons__btn btn btn-danger" href="?view=categorias&mode=add">CREAR CATEGORÍA</a>
        </li></ul></div>
      </div>

  <button class="btn btn-danger" type="button" name="button"><a href="?view=index">
    <i class="material-icons">shopping_cart</i>Categorías</a>
  </button> -->


  <div class="wrapper">
    <h1>   Menús del Día</h1>
      <div class="fresh-table  full-screen-table toolbar-color-orange">
          <div class="toolbar">
                   <button id="alertBtn" class="btn btn-default">Alert</button>
          </div>
       <div class="row cajas">
         <div class="col-md-12">
           <!-- <th data-sortable="true"> Ingredientes extras </th>
           <th data-sortable="true"> Costo Ingredientes extras </th>
         Si queremos agregar ingredientes metemos esto en el for each -->
           <?php

           if(false != $_categorias) {
            $HTML = '<table id="fresh-table" class="table">
            <thead>
              <tr>
                  <th data-field="id">Id</th>
                  <th data-field="name" data-sortable="true">Nombre de la Pizza</th>
                  <th data-sortable="true"> Tamaño de la pizza </th>
                  <th data-soportable="true"> Precio de la Pizza  </th>
                  <th data-sortable="true"> Acciones  </th>
              </tr>
            </thead>
            <tbody>';
             foreach($_categorias as $id_categoria => $categoria_array ){
             foreach($_pizzatam as $id_pizzatam => $pizzatam_array){

                 $HTML .= '<tr>
                   <td>'.$_categorias[$id_categoria]['idcate'].'</td>
                   <td>'.$_categorias[$id_categoria]['nombre'].'</td>
                   <td> '.$_pizzatam[$id_pizzatam]['size'].'</td>
                   <td>'.$_pizzatam[$id_pizzatam]['precio'].'</td>
                   <td>
                     <div class="btn-group">
                      <a href="#" class="btn btn-primary btn-warning">Acciones</a>
                      <a href="#" class="btn btn-primary btn-warning dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="?view=categorias&mode=edit&id='.$_categorias[$id_categoria]['idcate'].' ">Editar Nombre de Pizza</a></li>
                        <li><a href="?view=pizzatam&mode=edit2&id2='.$_pizzatam[$id_pizzatam]['idtama'].' ">Editar Precio y Tamaño</a></li>
                        <li><a onclick="DeleteItem(\'¿Está seguro de eliminar esta categoría?\',\'?view=categorias&mode=delete&id='.$_categorias[$id_categoria]['idcate'].'\')">Eliminar</a></li>
                      </ul>
                    </div>
                    </td>
                 </tr>';

           }
         }
             $HTML .= '</tbody></table>';
           } else {
             $HTML = '<div class="alert alert-dismissible alert-info"><strong>INFORMACIÓN: </strong> Todavía no existe ninguna categoría.</div>';
           }

           echo $HTML;
           ?>
                      <a href="?view=categorias&mode=add">
                        <button class="btn btn-simple btn-danger">Agregar Pizza Al menú
                          <div class="ripple-container">
                          </div>
                        </button>
                      </a>
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

 </body>
 </html>
