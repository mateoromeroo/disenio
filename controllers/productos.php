<?php 

require_once 'sis/common/config.php';
require_once 'sis/models/general.class.php';
include 'models/web.class.php';
include 'functions/functions.php';
$obj = new Catalogo_web();

/*
if($_POST['producto-tipo']!=''){
	$producto_tipo = $_POST['producto-tipo'];
}else{
	$producto_tipo = 1;
}
*/

if($_POST['categoria-anterior']!=''){
	$producto_tipo = $_POST['categoria-anterior'];
}else{
	if($_POST['producto-tipo']!=''){
		$producto_tipo = $_POST['producto-tipo'];
	}else{
		$producto_tipo = 1;
	}
}

    $productoTipo = $producto_tipo;

	$arg = array(
		$producto_tipo
	);

	//Listado de categorias/subcategorias
	$listaCategoria = $obj->listaCategoria($arg);

	//Obtenemos el color:
	$categoria_color = $obj->colorProducto($arg);

	$arg2 = array(
		$producto_tipo
		,$categoria_color
	);	

	//Listado de productos
	$listaProductos = $obj->listaProductos($arg2);

	$visibleP='visible';
	$alertP = '';
	if($listaProductos=='0'){
		# Sección de productos
		$alertP = '
			<br><br>
			<div class="alert-info text-center section-general"><b> No se encontraron productos.</b></div>
		';
		$visibleP = 'hidden';
	}




$view = $path['views'].basename($_SERVER['PHP_SELF']); 
require $path['tpl'].'template.php'; 
?>