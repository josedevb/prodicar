<nav class="navbar navbar-default navbar-fixed-top navbar-color-on-scroll">
	<div class="container">
        <div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
	        	<span class="sr-only">Toggle navigation</span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	    	</button>

	    	<a href="#">
	        	<div class="logo-container">
	                <div class="logo">
	                    <a href="index.php"><img src="views/images/prodicarlogo.png" alt="PRODICAR ZULIA 2015" style="width:48px; height:48px;" class="image-responsive" rel="tooltip" title="<b>Prodicar Zulia</b> Las mejores pizzas del estado Zulia <b>Prodicar Zulia 2015</b>" data-placement="bottom" data-html="true"></a>
	                </div>
	                <div class="brand">
	                    Prodicar Zulia
	                </div>


				</div>
	      	</a>
	    </div>
			<div class="collapse navbar-collapse" id="navigation-index">
				    	<ul class="nav navbar-nav navbar-right">
              <li>
      <?php
            if(!isset($_SESSION['app_id'])) {
      echo '<a rel="tooltip" title="Ingresa si eres Usuario" data-placement="bottom" data-toggle="modal" data-target="#Login" class="btn btn-simple">
        <i class="fa fa-sign-in"></i>Acceder
      </a>';
			echo '<li><a rel="tooltip" title="Registrate" data-placement="bottom" target="" class="btn btn-simple" data-toggle="modal" data-target="#Registro">
				<i class="fa fa-user"></i>Registro
			</a></li>';
      }
			if(isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']]['permisos'] >= 2) {
			echo '
			<a rel="tooltip" href="?view=perfil&id='.$_SESSION['app_id'].'">'. strtoupper($_users[$_SESSION['app_id']]['user']) .'<i class="fa fa-wrench" aria-hidden="true"></i></a></li>
			<li><a rel="tooltip" class="btn btn-simple" href="?view=compra&id='.$_users[$_SESSION['app_id']]['iduser'].'"><i class="fa fa-shopping-cart" aria-hidden="true"></i>COMPRAS</a></li>
			<li><a rel="tooltip" class="btn btn-simple" href="?view=categorias"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>CATEGORIAS</a></li>
			<li><a rel="tooltip" class="btn btn-simple" href="?view=logout"><i class="fa fa-sign-out" aria-hidden="true"></i>SALIR</a></li>
			';
			//<li><a rel="tooltip" class="btn btn-simple" href="?view=compra&id='.$_users[$_SESSION['app_id']]['iduser'].'"><i class="fa fa-shopping-cart" aria-hidden="true"></i>COMPRAS</a></li>
			//<li><a rel="tooltip" class="btn btn-simple" href="pagina2.php"><i class="fa fa-bars" aria-hidden="true"></i>CONOCENOS</a></li>
			}
		
      else if (isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']]['permisos'] >= 0) {

       echo '<a rel="tooltip" href="?view=perfil&id='.$_SESSION['app_id'].'">'. strtoupper($_users[$_SESSION['app_id']]['user']) .'<i class="fa fa-wrench" aria-hidden="true"></i></a></li>
			 <li><a rel="tooltip" class="btn btn-simple" href="reporteProdicar.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>MIS FACTURAS</a></li>
			 <li><a rel="tooltip" class="btn btn-simple" href="?view=logout"><i class="fa fa-sign-out" aria-hidden="true"></i>SALIR</a></li>
       ';
			 //<li><a rel="tooltip" class="btn btn-simple" href="pagina2.php"><i class="fa fa-bars" aria-hidden="true"></i>CONOCENOS</a></li>
      }
   
	
      ?>
    </li>

    </ul>
  </div>
<!-- <div class="collapse navbar-collapse" id="navigation-index">
<ul class="nav navbar-nav navbar-right"> -->
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
if(!isset($_SESSION['app_id'])) {
  include(HTML_DIR . '/public/login.html');
  include(HTML_DIR . '/public/reg.html');
  include(HTML_DIR . '/public/lostpass.html');
}

?>
