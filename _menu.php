<?php
  $pagina = $_SERVER["REQUEST_URI"];   
  $explode = explode("/",$pagina);
  $active = $explode[(count($explode)-2)];
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
    		<li <?php if( $active == 'calculadora') echo 'class="active"';?>><a href="<?php echo RUTA;?>calculadora/"><span class="glyphicon glyphicon-leaf"></span> Calculadora</a></li>
        <li <?php if( $active == 'cotizacion') echo 'class="active"';?>><a href="<?php echo RUTA;?>cotizacion/"><span class="glyphicon glyphicon-thumbs-up"></span> Cotización</a></li>
        <li <?php if( $active == 'productos') echo 'class="active"';?>><a href="<?php echo RUTA;?>productos/"><span class="glyphicon glyphicon-grain"></span> Productos</a></li>
  		</ul>
	</div>
</div>