<?php 

// require_once 'intranet/common/config.php';
// require_once 'intranet/models/general.class.php';
// include 'models/web.class.php';
// include 'functions/functions.php';
// $obj = new Catalogo_web();

// 	$arg = array(
// 		$noticia_id
// 	);


// 	$listaQuejas = $obj->listaQuejas($arg);


// 	$visibleP='visible';
// 	$alertP = '';
// 	if($listaQuejas=='0'){
// 		# Sección de productos
// 		$alertP = '
// 			<br><br>
// 			<div class="alert-info text-center section-general"><b> No se encontraron productos.</b></div>
// 		';
// 		$visibleP = 'hidden';
// 	}

// 	// $totalquejas = $obj->totalquejas();
// 	// echo "total de quejas: ".$totalquejas;

// 	// $total = $totalquejas;
// 	// $limit = 3;
// 	// $pag = 1;
// 	// $btn_op = 1;

// 	// $paginador = paginator($total,$limit,$pag,$btn_op);


// /*** paginador ***/

// 	$totalQuejas = $obj->totalQuejas();

// 	$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

// 	$postPorPagina = 4;

// 	$inicio = ($pagina_actual > 1)? (($pagina_actual - 1)*$postPorPagina) : 0;

// 	$numeroPaginas = ceil($totalQuejas / $postPorPagina);

// 	$quejasPorPagina = $obj->quejaXpagina($inicio,$postPorPagina);

	// $vistaPaginador = $obj->paginadorNoticia();


/*** fin de paginador ***/

if (isset($_POST['queja-comentario'])) {
	

$queja = $_POST['queja-comentario']	;
echo "->".$queja;
$quejaHTML = '<div class="not-sect2-noticia quejas-sect2 col-xs-12">
                        
                        <div class="queja-sect2-contenedor col-xs-12">
                            <div class="not-sect2-tit queja-sect2-tit col-xs-12">
                                Cobrador no quiso reconocer medio pasaje
                            </div>
                            <div class="not-sect2-parr col-xs-12">
                                <p><span style="&quot;color:" rgb(29,="" 33,="" 41);="" font-family:="" helvetica,="" arial,="" sans-serif;&quot;="">'.$queja.'</span><br></p>
                            </div>
                            <div class="not-sect2-fecha col-xs-6">
                                
                            </div>
                            <div class="not-sect2-btn queja-sect2-btn col-xs-6">
                                <form action="quejasDetalle.php" method="post" style="margin-bottom: 15px;">
                                    <button type="submit" name="quejas-id" class="not-sect2-btnLeer queja-sect2-btnLeer" value="3"><span class="raya-leer">Leer más</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="fb-comments" data-href="https://webtransporte.herokuapp.com/quejas.php" data-width="100%" data-numposts="5" data-colorscheme="dark"></div>';

$grabarComentario = fopen("lista_quejas.html","a");

fwrite($grabarComentario,$quejaHTML);
fclose($grabarComentario);


}



$view = $path['views'].basename($_SERVER['PHP_SELF']); 
require $path['tpl'].'template.php'; 
?>