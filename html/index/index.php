<?php
echo include(HTML_DIR . 'overall/header.php');
echo include(HTML_DIR . '/overall/topnav.php');
?>
<style> body{color:#e4e8ec} </style>
<body class="index-page">

	<?php

		if(isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']]['permisos'] >= 2)
		{
			echo '<div class="main main-raised">
							<div class="container">
									<div class="section text-center section-landing">
										<div class="title">';
										echo	'	<h1>Bienvenido Administrador de ' . APP_TITLE . ' Agradecemos su visita.</h1>';
			echo '							</div>
									</div>
							</div>
						</div>
									';
		}
	else if (isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']]['permisos'] >= 0)
	{
			include(HTML_DIR . '/overall/body2.php');

	}
		else
	{
		include(HTML_DIR . '/overall/body.php');
	}

	?>



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

</div>
</div>
</div>

					</div>
				</div>
			</div>

		</div>
	</div>

<?php include(HTML_DIR . 'overall/footer.php'); ?>

</body>
</html>
