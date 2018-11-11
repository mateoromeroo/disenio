<?php 

require_once 'sis/common/config.php';
require_once 'sis/models/general.class.php';
include 'models/web.class.php';
include 'functions/functions.php';
$obj = new Catalogo_web();

	$arg = array(
		$noticia_id
	);


	//Listado de categorias/subcategorias
	// $listaCategoria = $obj->listaCategoria($arg);

	//Listado de productos
	$listaQuejas = $obj->listaQuejas($arg);

	// echo '<br>noticia_id---->'.$noticia_id; 

	$visibleP='visible';
	$alertP = '';
	if($listaQuejas=='0'){
		# Sección de productos
		$alertP = '
			<br><br>
			<div class="alert-info text-center section-general"><b> No se encontraron productos.</b></div>
		';
		$visibleP = 'hidden';
	}

	// $totalquejas = $obj->totalquejas();
	// echo "total de quejas: ".$totalquejas;

	// $total = $totalquejas;
	// $limit = 3;
	// $pag = 1;
	// $btn_op = 1;

	// $paginador = paginator($total,$limit,$pag,$btn_op);


/*** paginador ***/

	$totalQuejas = $obj->totalQuejas();

	$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

	$postPorPagina = 4;

	$inicio = ($pagina_actual > 1)? (($pagina_actual - 1)*$postPorPagina) : 0;

	$numeroPaginas = ceil($totalQuejas / $postPorPagina);

	$quejasPorPagina = $obj->quejaXpagina($inicio,$postPorPagina);

	// $vistaPaginador = $obj->paginadorNoticia();


/*** fin de paginador ***/



$view = $path['views'].basename($_SERVER['PHP_SELF']); 
require $path['tpl'].'template.php'; 
?>