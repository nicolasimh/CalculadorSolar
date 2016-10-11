<?php
  $pagina = $_SERVER["REQUEST_URI"];   
  $explode = explode("/",$pagina);
  $active = $explode[(count($explode)-2)];
  if ( !empty($_SESSION["login"]) ) {
      
  } else {
      header("location: ".RUTA."login.php");
  }
?>
<div class="container">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
    		<span class="icon-bar"></span>
    		<span class="icon-bar"></span>
    		<span class="icon-bar"></span>
  		</button>
  		<a class="navbar-brand disabled">Calculador Solar <span class="glyphicon glyphicon-certificate"></span></a>
	</div>
	<div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
  		<ul class="nav navbar-nav">
    		<li <?php if( $active == 'calculador') echo 'class="active"';?>><a href="<?php echo RUTA;?>"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
        <li <?php if( $active == 'proyectos') echo 'class="active"';?>><a href="<?php echo RUTA;?>proyectos/"><span class="glyphicon glyphicon-globe"></span> Mis Proyectos</a></li>
    		<li <?php if( $active == 'calculadora') echo 'class="active"';?>><a href="<?php echo RUTA;?>calculadora/nuevoCalculo.php"><span class="glyphicon glyphicon-leaf"></span> Calculadora</a></li>
        <li <?php if( $active == 'configuracion') echo 'class="active"';?>><a href="<?php echo RUTA;?>menu-configuracion.php"><span class="glyphicon glyphicon-grain"></span> Configuración</a></li>
  		</ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <form style="margin-top: 8px;margin-bottom: 0px;" action="<?php echo RUTA?>controller/usuarioController.php" method="POST">
            <button class="btn btn-danger" name="accion" value="logout"><span class="glyphicon glyphicon-off"></span>Salir</button></li>
          </form>
      </ul>
	</div>

</div>