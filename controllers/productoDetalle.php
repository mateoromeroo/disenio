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

if($_POST['producto-tipo']!=''){
	$producto_tipo = $_POST['producto-tipo'];
}else{
	if($_POST['categoria-anterior']!=''){
			$producto_tipo = $_POST['categoria-anterior'];
	}else{
		$producto_tipo = 1;
	}
}
$productoTipo = $producto_tipo;

$colorProdDet = $obj->colorProducto($productoTipo);

$arrSubcat = $_POST['input-subcategoria-id'];
$producto_id = $_POST['producto-id'];

$aux = explode('/',$arrSubcat);

if($_POST['input-categoria-idx']!=''){
	$categoria_id = $_POST['input-categoria-idx'];
}else{
	$categoria_id = $aux[1];
}

$subcategoria_id = $aux[0];

$rango_precios = $_POST['rango_precios'];
	# TITULO CAT/SUBCAT
	if($producto_tipo==1){
		// $tituloSecCat = 'MÁQUINAS';
		 $tituloSecCat = 'Máquinas';
	}else if($producto_tipo==2){
		// $tituloSecCat = 'INSUMOS';
		$tituloSecCat = 'Insumos';
	}

$arg = array($producto_id);

$resultDetalle = $obj->detalleProducto($arg);

$htmlNombre = $resultDetalle[0];
$htmlNombreIngles = $resultDetalle[1];
$htmlCarateristicas = $resultDetalle[2];
$htmlCarateristicasIngles = $resultDetalle[3];
$htmlImg1 = $resultDetalle[4];
$htmlImg2 = $resultDetalle[5];
$htmlImg3 = $resultDetalle[6];

$htmlImgNombre1 = $resultDetalle[7]; 
$htmlImgNombre2 = $resultDetalle[8];
$htmlImgNombre3 = $resultDetalle[9];

$arg2=array(
	// $producto_tipo
	// ,$categoria_id
	// ,$subcategoria_id
	// ,$rango_precios
	$producto_id
);

//Paginador de Slider

if($htmlImgNombre1 != ''){
	$pag1 = '';
}else{
	$pag1 = 'hidden';
}

if($htmlImgNombre2 != ''){
	$pag2 = '';
}else{
	$pag2 = 'hidden';
}

if($htmlImgNombre3 != ''){
	$pag3 = '';
}else{
	$pag3 = 'hidden';
}




// $listaProductosSimilares = $obj->listaProductos($arg2);

// $visiblePS='visible';
// $alertPS = '';
// if($listaProductosSimilares=='0'){
// 	# Sección de productos similares
// 	$alertPS = '
// 		<br><br>
// 		<div class="alert-info text-center section-general"><b> No se encontraron productos.</b></div>
// 	';
// 	$visiblePS = 'hidden';
// }

//echo '<br> -> '.$producto_tipo;
//echo '<br> -> '.$categoria_id;
//echo '<br> -> '.$subcategoria_id;
//echo '<br> -> '.$rango_precios;
//echo "<br> -> ".$producto_id;


$view = $path['views'].basename($_SERVER['PHP_SELF']); 
require $path['tpl'].'template.php'; 
?>