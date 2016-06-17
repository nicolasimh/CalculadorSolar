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
  		<a class="navbar-brand" href="#">Calculador Solar</a>
	</div>
	<div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
  		<ul class="nav navbar-nav">
    		<li <?php if( $active == 'calculador') echo 'class="active"';?>><a href="<?php echo RUTA;?>">Inicio</a></li>
        <li <?php if( $active == 'proyectos') echo 'class="active"';?>><a href="<?php echo RUTA;?>proyectos/">Mis Proyectos</a></li>
    		<li <?php if( $active == 'calculadora') echo 'class="active"';?>><a href="<?php echo RUTA;?>calculadora/">Calculadora</a></li>
        <li <?php if( $active == 'cotizacion') echo 'class="active"';?>><a href="<?php echo RUTA;?>cotizacion/">Cotización</a></li>
        <li <?php if( $active == 'proveedor') echo 'class="active"';?>><a href="<?php echo RUTA;?>proveedor/">Proveedor</a></li>
  		</ul>
	</div>
</div>