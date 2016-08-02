<?php
  $pagina = $_SERVER["REQUEST_URI"];   
  $explode = explode("/",$pagina);
  $active = $explode[(count($explode)-1)];
?>

<ul class="nav nav-pills nav-stacked">
	<br />
	<!--<li role="presentation" class="tituloMenuLateral">Mantenedor de Productos</li>-->
	<li role="presentation" class="<?php if($active == 'ingresarProducto.php') echo 'active' ?>" ><a href="ingresarProducto.php">Ingresar Producto</a></li>
	<li role="presentation" class="<?php if($active == 'index.php' || $active == '') echo 'active' ?>"><a href="index.php">Listado de Productos</a></li>
</ul>