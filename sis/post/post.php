<?php 

//Variable de validacion de contenido post
$data_post = 0;


// LOGIN
$post_usuario = '';
$post_password = ''; 
if(isset($_POST['user']) && isset($_POST['password'])){
	$post_usuario = htmlspecialchars($_POST['user']);
	$post_password = md5(htmlspecialchars($_POST['password']));	
}


// Id como valor de un botón
if(isset($_POST['btn-op-form'])){
	$arr3 = explode('/',$_POST['btn-op-form']);
	$btn_op_form = $arr3[0];
	$btn_id = $arr3[1];
	$btn_id_2 = $arr3[1];
}


if(isset($_POST['btn-id']) && $_POST['btn-id']!=''){
	$btn_id = $_POST['btn-id'];
}

//OTHER
$btn_op='';
if(isset($_POST['btn-op'])){
	$arr0 = explode('/',$_POST['btn-op']); 
	$btn_op = $arr0[0];
}else{
	$btn_op = '';
}


//paginador
$page=0;
if(isset($_POST['btn-pag'])){

	$arr = explode('/',$_POST['btn-pag']);

	$page = $arr[0]-1;

	if($arr[1]!=''){
		$btn_op = $arr[1];
	}
}


$btn_op_2='';
if(isset($_POST['btn-op-2'])){
	//$btn_op_2 = $_POST['btn-op-2'];
	$arr2 = explode('/',$_POST['btn-op-2']);
	$btn_op_2 = $arr2[0];
	$btn_op = $arr2[1];
	$valor_filtro = $arr2[2];
	$valor_pagina = $arr2[3];

	if($valor_filtro!=''){
		$tipo_usuario_id = $valor_filtro;
	}

	if($valor_pagina!=''){
		$page = $valor_pagina;
	}
}


$btn_save = '';
if(isset($_POST['btn-save'])){
	$btn_save = $_POST['btn-save'];
}else{
	$btn_save = '';
}


$txt_search='';
if(isset($_POST['txt-search'])){
	if($_POST['txt-search']!=''){
		$txt_search = $_POST['txt-search'];
	}
}


//checks
$count_check_register = 0;
if(isset($_POST["check-id"])){
	$check_selected=$_POST["check-id"];
	$count_check = count($check_selected);
}





/*
* ---------------------------------------------
* Datos post de formularios (agregar/modificar)
* ---------------------------------------------
*/


/*
*
* @module
* CONTÁCTENOS
*
*/

if(isset($_POST['contact-asunto'])){
	$contact_asunto = htmlspecialchars($_POST['contact-asunto']);
}

if(isset($_POST['contact-mensaje'])){
	$contact_mensaje = htmlspecialchars($_POST['contact-mensaje']);
}

if(isset($_POST['contact-archivo'])){
	$contact_archivo = htmlspecialchars($_POST['contact-archivo']);
}




/*
*
* @module
* USUARIOS
*
*/


//Filtros (para agregar usuarios nuevos)
#Módulo usuario :: filtro por tipo usuario
if(isset($_POST['tipo_usuario'])){
	$data_post = 1;
	$tipo_usuario_id = htmlspecialchars($_POST['tipo_usuario']);
}else{
	$data_post = 0;
}

//Formulario
if(isset($_POST['usuario_id'])){
	$usuario_id = htmlspecialchars($_POST['usuario_id']);
}

if(isset($_POST['tipo_usuario'])){
	$tipo_usuario = htmlspecialchars($_POST['tipo_usuario']);
}

if(isset($_POST['usuario_nombre'])){
	$usuario_nombre = htmlspecialchars($_POST['usuario_nombre']);
}

if(isset($_POST['usuario_user'])){
	$usuario_user = htmlspecialchars($_POST['usuario_user']);
}

if(isset($_POST['usuario_pass'])){
	$usuario_pass = htmlspecialchars($_POST['usuario_pass']);
}

if(isset($_POST['usuario_pass_new']) && $_POST['usuario_pass_new']!=''){
	$usuario_pass = md5(htmlspecialchars($_POST['usuario_pass_new']));
}


/*
*
* @module
* CATEGORÍA
*
*/
//Formulario

if(isset($_FILES['producto_archivo']['tmp_name']) && $_FILES['producto_archivo']['tmp_name']!=''){
    if (!empty($_FILES['producto_archivo']['name'])) {
        $maxsize = 16777216; //equivale a 2mb
        if ($_FILES['producto_archivo']['size'] <= $maxsize) {
            $pdfURL = "app/docs/";
            if (!move_uploaded_file($_FILES['producto_archivo']['tmp_name'], $pdfURL . $newfile_pdf));
            @unlink("app/docs/".$producto_archivo_c);
            $producto_archivo = $newfile_pdf;
        } else {
            //$producto_archivo = $_POST['producto_archivo_c'];
        }
    }
}else{
	if (isset($producto_archivo_c)) {
		$producto_archivo = $producto_archivo_c;
	}
	
}



/*
//echo '<br><br><br><br> btn-op-2 --> '.$btn_op_2;

echo '<br><br><br><br> btn-op-2 --> '.$btn_op_2;
echo '<br><br> btn-op --> '.$btn_op;
echo '<br><br> filtro --> '.$tipo_usuario_id;
echo '<br><br> busqueda --> '.$txt_search;

echo '<br><br><br><br> page --> '.$page;


echo '<br><br><br><br> btn-id --> '.$btn_id;
*/

/*
*
* @module
* NOTICIA
*
*/
//Formulario
if(isset($_POST['noticia_id'])){
	$noticia_id = htmlspecialchars($_POST['noticia_id']);
}

if(isset($_POST['noticia_orden'])){
	$noticia_orden = htmlspecialchars($_POST['noticia_orden']);
}

if(isset($_POST['noticia_titulo'])){
	$noticia_titulo = htmlspecialchars($_POST['noticia_titulo']);
}

if(isset($_POST['noticia_subtitulo'])){
	$noticia_subtitulo = htmlspecialchars($_POST['noticia_subtitulo']);
}
if(isset($_POST['noticia_descripcion'])){
	$noticia_descripcion = htmlspecialchars($_POST['noticia_descripcion']);
	$noticia_descripcion = html_entity_decode($noticia_descripcion, ENT_NOQUOTES, "UTF-8");
}

if(isset($_POST['noticia_descripcion2'])){
	$noticia_descripcion2 = htmlspecialchars($_POST['noticia_descripcion2']);
	$noticia_descripcion2 = html_entity_decode($noticia_descripcion2, ENT_NOQUOTES, "UTF-8");
}

if(isset($_POST['noticia_descripcion3'])){
	$noticia_descripcion3 = htmlspecialchars($_POST['noticia_descripcion3']);
	$noticia_descripcion3 = html_entity_decode($noticia_descripcion3, ENT_NOQUOTES, "UTF-8");
}

// Archivos de imagen

// Para cuando no se modifica la imagen:
if(isset($_POST['noticia_imagen1_c'])){
	$noticia_imagen1_c = htmlspecialchars($_POST['noticia_imagen1_c']);
}

if(isset($_POST['noticia_imagen2_c'])){
	$noticia_imagen2_c = htmlspecialchars($_POST['noticia_imagen2_c']);
}

if(isset($_POST['noticia_imagen3_c'])){
	$noticia_imagen3_c = htmlspecialchars($_POST['noticia_imagen3_c']);
}

// imagen 1

$newnom_noticia = date("YmdHis"); // date le signa un nombre no repetitivo
$maxsize1_noticia = 500 * 600; // 300kb -> peso de la imagen
$newfile_img_noticia = $newnom_noticia.'.jpg'; // concatena

// si se modifica la imagen:
if(isset($_FILES['noticia_imagen']['tmp_name']) && $_FILES['noticia_imagen']['tmp_name']!=''){
	if (!empty($_FILES['noticia_imagen']['name'])) {
		if ($_FILES['noticia_imagen']['size'] <= $maxsize1_noticia) {
			$productoURL = "app/img/noticias/";
			if (!move_uploaded_file($_FILES['noticia_imagen']['tmp_name'], $productoURL . $newfile_img_noticia));
			@unlink("app/img/noticias/".$noticia_imagen1_c);
			$noticia_imagen = $newfile_img_noticia;

		}else{
			//$noticia_imagen = $_POST['noticia_imagen1_c'];
		}
	}
}else{ // si no se modifica la imagen:

	if (isset($noticia_imagen1_c)) {
		$noticia_imagen = $noticia_imagen1_c;
	}
	
}

// imagen 2 

$newnom_noticia2 = date("YmdHis"); // date le signa un nombre no repetitivo
$maxsize1_noticia2 = 500 * 600; // 300kb -> peso de la imagen
$newfile_img_noticia2 = $newnom_noticia2.'2.jpg'; // concatena

if(isset($_FILES['noticia_imagen2']['tmp_name']) && $_FILES['noticia_imagen2']['tmp_name']!=''){
	if (!empty($_FILES['noticia_imagen2']['name'])) {
		if ($_FILES['noticia_imagen2']['size'] <= $maxsize1_noticia2) {
			$noticiaURL = "app/img/noticias/";
			if (!move_uploaded_file($_FILES['noticia_imagen2']['tmp_name'], $noticiaURL . $newfile_img_noticia2));
			@unlink("app/img/noticias/".$noticia_imagen2_c);
			$noticia_imagen2 = $newfile_img_noticia2;

		}else{
			//$noticia_imagen = $_POST['noticia_imagen2_c'];
		}
	}
}else{
	if (isset($noticia_imagen2_c)) {
		$noticia_imagen2 = $noticia_imagen2_c;
	}
	
}

// imagen 3 

$newnom_noticia3 = date("YmdHis"); // date le signa un nombre no repetitivo
$maxsize1_noticia3 = 500 * 600; // 300kb -> peso de la imagen
$newfile_img_noticia3 = $newnom_noticia3.'3.jpg'; // concatena

if(isset($_FILES['noticia_imagen3']['tmp_name']) && $_FILES['noticia_imagen3']['tmp_name']!=''){
	if (!empty($_FILES['noticia_imagen3']['name'])) {
		if ($_FILES['noticia_imagen3']['size'] <= $maxsize1_noticia3) {
			$noticiaURL = "app/img/noticias/";
			if (!move_uploaded_file($_FILES['noticia_imagen3']['tmp_name'], $noticiaURL . $newfile_img_noticia3));
			@unlink("app/img/noticias/".$noticia_imagen3_c);
			$noticia_imagen3 = $newfile_img_noticia3;

		}else{
			//$noticia_imagen3 = $_POST['noticia_imagen3_c'];
		}
	}
}else{
	if (isset($noticia_imagen3_c)) {
		$noticia_imagen3 = $noticia_imagen3_c;
	}
	
}

if(isset($_POST['noticia_link_face'])){
	$noticia_link_face = htmlspecialchars($_POST['noticia_link_face']);
}

if(isset($_POST['noticia_activo'])){
	$noticia_activo = htmlspecialchars($_POST['noticia_activo']);
}
if(isset($_POST['noticia_titulo_ingles'])){
	$noticia_titulo_ingles = htmlspecialchars($_POST['noticia_titulo_ingles']);
}

if(isset($_POST['noticia_subtitulo_ingles'])){
	$noticia_subtitulo_ingles = htmlspecialchars($_POST['noticia_subtitulo_ingles']);
}

if(isset($_POST['noticia_descripcion_ingles'])){
	$noticia_descripcion_ingles = htmlspecialchars($_POST['noticia_descripcion_ingles']);
	$noticia_descripcion_ingles = html_entity_decode($noticia_descripcion_ingles, ENT_NOQUOTES, "UTF-8");
}

if(isset($_POST['noticia_descripcion2_ingles'])){
	$noticia_descripcion2_ingles = htmlspecialchars($_POST['noticia_descripcion2_ingles']);
	$noticia_descripcion2_ingles = html_entity_decode($noticia_descripcion2_ingles, ENT_NOQUOTES, "UTF-8");
}
if(isset($_POST['noticia_descripcion3_ingles'])){
	$noticia_descripcion3_ingles = htmlspecialchars($_POST['noticia_descripcion3_ingles']);
	$noticia_descripcion3_ingles = html_entity_decode($noticia_descripcion3_ingles, ENT_NOQUOTES, "UTF-8");
}
if(isset($_POST['noticia_fecha'])){
	$noticia_fecha = htmlspecialchars($_POST['noticia_fecha']);
}






/*
*
* @module
* QUEJAS
*
*/
//Formulario
if(isset($_POST['quejas_id'])){
	$quejas_id = htmlspecialchars($_POST['quejas_id']);
}

if(isset($_POST['quejas_orden'])){
	$quejas_orden = htmlspecialchars($_POST['quejas_orden']);
}

if(isset($_POST['quejas_titulo'])){
	$quejas_titulo = htmlspecialchars($_POST['quejas_titulo']);
}

if(isset($_POST['quejas_subtitulo'])){
	$quejas_subtitulo = htmlspecialchars($_POST['quejas_subtitulo']);
}
if(isset($_POST['quejas_descripcion'])){
	$quejas_descripcion = htmlspecialchars($_POST['quejas_descripcion']);
	$quejas_descripcion = html_entity_decode($quejas_descripcion, ENT_NOQUOTES, "UTF-8");
}

if(isset($_POST['quejas_descripcion2'])){
	$quejas_descripcion2 = htmlspecialchars($_POST['quejas_descripcion2']);
	$quejas_descripcion2 = html_entity_decode($quejas_descripcion2, ENT_NOQUOTES, "UTF-8");
}

if(isset($_POST['quejas_descripcion3'])){
	$quejas_descripcion3 = htmlspecialchars($_POST['quejas_descripcion3']);
	$quejas_descripcion3 = html_entity_decode($quejas_descripcion3, ENT_NOQUOTES, "UTF-8");
}

// Archivos de imagen

// Para cuando no se modifica la imagen:
if(isset($_POST['quejas_imagen1_c'])){
	$quejas_imagen1_c = htmlspecialchars($_POST['quejas_imagen1_c']);
}

if(isset($_POST['quejas_imagen2_c'])){
	$quejas_imagen2_c = htmlspecialchars($_POST['quejas_imagen2_c']);
}

if(isset($_POST['quejas_imagen3_c'])){
	$quejas_imagen3_c = htmlspecialchars($_POST['quejas_imagen3_c']);
}

// imagen 1

$newnom_quejas = date("YmdHis"); // date le signa un nombre no repetitivo
$maxsize1_quejas = 500 * 600; // 300kb -> peso de la imagen
$newfile_img_quejas = $newnom_quejas.'.jpg'; // concatena

// si se modifica la imagen:
if(isset($_FILES['quejas_imagen']['tmp_name']) && $_FILES['quejas_imagen']['tmp_name']!=''){
	if (!empty($_FILES['quejas_imagen']['name'])) {
		if ($_FILES['quejas_imagen']['size'] <= $maxsize1_quejas) {
			$productoURL = "app/img/quejas/";
			if (!move_uploaded_file($_FILES['quejas_imagen']['tmp_name'], $productoURL . $newfile_img_quejas));
			@unlink("app/img/quejas/".$quejas_imagen1_c);
			$quejas_imagen = $newfile_img_quejas;

		}else{
			//$quejas_imagen = $_POST['quejas_imagen1_c'];
		}
	}
}else{ // si no se modifica la imagen:

	if (isset($quejas_imagen1_c)) {
		$quejas_imagen = $quejas_imagen1_c;
	}
	
}

// imagen 2 

$newnom_quejas2 = date("YmdHis"); // date le signa un nombre no repetitivo
$maxsize1_quejas2 = 500 * 600; // 300kb -> peso de la imagen
$newfile_img_quejas2 = $newnom_quejas2.'2.jpg'; // concatena

if(isset($_FILES['quejas_imagen2']['tmp_name']) && $_FILES['quejas_imagen2']['tmp_name']!=''){
	if (!empty($_FILES['quejas_imagen2']['name'])) {
		if ($_FILES['quejas_imagen2']['size'] <= $maxsize1_quejas2) {
			$quejasURL = "app/img/quejas/";
			if (!move_uploaded_file($_FILES['quejas_imagen2']['tmp_name'], $quejasURL . $newfile_img_quejas2));
			@unlink("app/img/quejas/".$quejas_imagen2_c);
			$quejas_imagen2 = $newfile_img_quejas2;

		}else{
			//$quejas_imagen = $_POST['quejas_imagen2_c'];
		}
	}
}else{
	if (isset($quejas_imagen2_c)) {
		$quejas_imagen2 = $quejas_imagen2_c;
	}
	
}

// imagen 3 

$newnom_quejas3 = date("YmdHis"); // date le signa un nombre no repetitivo
$maxsize1_quejas3 = 500 * 600; // 300kb -> peso de la imagen
$newfile_img_quejas3 = $newnom_quejas3.'3.jpg'; // concatena

if(isset($_FILES['quejas_imagen3']['tmp_name']) && $_FILES['quejas_imagen3']['tmp_name']!=''){
	if (!empty($_FILES['quejas_imagen3']['name'])) {
		if ($_FILES['quejas_imagen3']['size'] <= $maxsize1_quejas3) {
			$quejasURL = "app/img/quejas/";
			if (!move_uploaded_file($_FILES['quejas_imagen3']['tmp_name'], $quejasURL . $newfile_img_quejas3));
			@unlink("app/img/quejas/".$quejas_imagen3_c);
			$quejas_imagen3 = $newfile_img_quejas3;

		}else{
			//$quejas_imagen3 = $_POST['quejas_imagen3_c'];
		}
	}
}else{
	if (isset($quejas_imagen3_c)) {
		$quejas_imagen3 = $quejas_imagen3_c;
	}
	
}

if(isset($_POST['quejas_link_face'])){
	$quejas_link_face = htmlspecialchars($_POST['quejas_link_face']);
}

if(isset($_POST['quejas_activo'])){
	$quejas_activo = htmlspecialchars($_POST['quejas_activo']);
}
if(isset($_POST['quejas_titulo_ingles'])){
	$quejas_titulo_ingles = htmlspecialchars($_POST['quejas_titulo_ingles']);
}

if(isset($_POST['quejas_subtitulo_ingles'])){
	$quejas_subtitulo_ingles = htmlspecialchars($_POST['quejas_subtitulo_ingles']);
}

if(isset($_POST['quejas_descripcion_ingles'])){
	$quejas_descripcion_ingles = htmlspecialchars($_POST['quejas_descripcion_ingles']);
	$quejas_descripcion_ingles = html_entity_decode($quejas_descripcion_ingles, ENT_NOQUOTES, "UTF-8");
}

if(isset($_POST['quejas_descripcion2_ingles'])){
	$quejas_descripcion2_ingles = htmlspecialchars($_POST['quejas_descripcion2_ingles']);
	$quejas_descripcion2_ingles = html_entity_decode($quejas_descripcion2_ingles, ENT_NOQUOTES, "UTF-8");
}
if(isset($_POST['quejas_descripcion3_ingles'])){
	$quejas_descripcion3_ingles = htmlspecialchars($_POST['quejas_descripcion3_ingles']);
	$quejas_descripcion3_ingles = html_entity_decode($quejas_descripcion3_ingles, ENT_NOQUOTES, "UTF-8");
}
if(isset($_POST['quejas_fecha'])){
	$quejas_fecha = htmlspecialchars($_POST['quejas_fecha']);
}


/*
*
* @module
* CONTÁCTANOS
*
*/
//Formulario
if(isset($_POST['contactenos_id'])){
	$contactenos_id = htmlspecialchars($_POST['contactenos_id']);
}

if(isset($_POST['contactenos_orden'])){
	$contactenos_orden = htmlspecialchars($_POST['contactenos_orden']);
}

if(isset($_POST['contactenos_titulo'])){
	$contactenos_titulo = htmlspecialchars($_POST['contactenos_titulo']);
}

if(isset($_POST['contactenos_subtitulo'])){
	$contactenos_subtitulo = htmlspecialchars($_POST['contactenos_subtitulo']);
}
if(isset($_POST['contactenos_descripcion'])){
	$contactenos_descripcion = htmlspecialchars($_POST['contactenos_descripcion']);
	$contactenos_descripcion = html_entity_decode($contactenos_descripcion, ENT_NOQUOTES, "UTF-8");
}

if(isset($_POST['contactenos_descripcion2'])){
	$contactenos_descripcion2 = htmlspecialchars($_POST['contactenos_descripcion2']);
	$contactenos_descripcion2 = html_entity_decode($contactenos_descripcion2, ENT_NOQUOTES, "UTF-8");
}

if(isset($_POST['contactenos_descripcion3'])){
	$contactenos_descripcion3 = htmlspecialchars($_POST['contactenos_descripcion3']);
	$contactenos_descripcion3 = html_entity_decode($contactenos_descripcion3, ENT_NOQUOTES, "UTF-8");
}

// Archivos de imagen

// Para cuando no se modifica la imagen:
if(isset($_POST['contactenos_imagen1_c'])){
	$contactenos_imagen1_c = htmlspecialchars($_POST['contactenos_imagen1_c']);
}

if(isset($_POST['contactenos_imagen2_c'])){
	$contactenos_imagen2_c = htmlspecialchars($_POST['contactenos_imagen2_c']);
}

if(isset($_POST['contactenos_imagen3_c'])){
	$contactenos_imagen3_c = htmlspecialchars($_POST['contactenos_imagen3_c']);
}

// imagen 1

$newnom_contactenos = date("YmdHis"); // date le signa un nombre no repetitivo
$maxsize1_contactenos = 500 * 600; // 300kb -> peso de la imagen
$newfile_img_contactenos = $newnom_contactenos.'.jpg'; // concatena

// si se modifica la imagen:
if(isset($_FILES['contactenos_imagen']['tmp_name']) && $_FILES['contactenos_imagen']['tmp_name']!=''){
	if (!empty($_FILES['contactenos_imagen']['name'])) {
		if ($_FILES['contactenos_imagen']['size'] <= $maxsize1_contactenos) {
			$productoURL = "app/img/contactenos/";
			if (!move_uploaded_file($_FILES['contactenos_imagen']['tmp_name'], $productoURL . $newfile_img_contactenos));
			@unlink("app/img/contactenos/".$contactenos_imagen1_c);
			$contactenos_imagen = $newfile_img_contactenos;

		}else{
			//$contactenos_imagen = $_POST['contactenos_imagen1_c'];
		}
	}
}else{ // si no se modifica la imagen:

	if (isset($contactenos_imagen1_c)) {
		$contactenos_imagen = $contactenos_imagen1_c;
	}
	
}

// imagen 2 

$newnom_contactenos2 = date("YmdHis"); // date le signa un nombre no repetitivo
$maxsize1_contactenos2 = 500 * 600; // 300kb -> peso de la imagen
$newfile_img_contactenos2 = $newnom_contactenos2.'2.jpg'; // concatena

if(isset($_FILES['contactenos_imagen2']['tmp_name']) && $_FILES['contactenos_imagen2']['tmp_name']!=''){
	if (!empty($_FILES['contactenos_imagen2']['name'])) {
		if ($_FILES['contactenos_imagen2']['size'] <= $maxsize1_contactenos2) {
			$contactenosURL = "app/img/contactenos/";
			if (!move_uploaded_file($_FILES['contactenos_imagen2']['tmp_name'], $contactenosURL . $newfile_img_contactenos2));
			@unlink("app/img/contactenos/".$contactenos_imagen2_c);
			$contactenos_imagen2 = $newfile_img_contactenos2;

		}else{
			//$contactenos_imagen = $_POST['contactenos_imagen2_c'];
		}
	}
}else{
	if (isset($contactenos_imagen2_c)) {
		$contactenos_imagen2 = $contactenos_imagen2_c;
	}
	
}

// imagen 3 

$newnom_contactenos3 = date("YmdHis"); // date le signa un nombre no repetitivo
$maxsize1_contactenos3 = 500 * 600; // 300kb -> peso de la imagen
$newfile_img_contactenos3 = $newnom_contactenos3.'3.jpg'; // concatena

if(isset($_FILES['contactenos_imagen3']['tmp_name']) && $_FILES['contactenos_imagen3']['tmp_name']!=''){
	if (!empty($_FILES['contactenos_imagen3']['name'])) {
		if ($_FILES['contactenos_imagen3']['size'] <= $maxsize1_contactenos3) {
			$contactenosURL = "app/img/contactenos/";
			if (!move_uploaded_file($_FILES['contactenos_imagen3']['tmp_name'], $contactenosURL . $newfile_img_contactenos3));
			@unlink("app/img/contactenos/".$contactenos_imagen3_c);
			$contactenos_imagen3 = $newfile_img_contactenos3;

		}else{
			//$contactenos_imagen3 = $_POST['contactenos_imagen3_c'];
		}
	}
}else{
	if (isset($contactenos_imagen3_c)) {
		$contactenos_imagen3 = $contactenos_imagen3_c;
	}
	
}

if(isset($_POST['contactenos_link_face'])){
	$contactenos_link_face = htmlspecialchars($_POST['contactenos_link_face']);
}

if(isset($_POST['contactenos_activo'])){
	$contactenos_activo = htmlspecialchars($_POST['contactenos_activo']);
}
if(isset($_POST['contactenos_titulo_ingles'])){
	$contactenos_titulo_ingles = htmlspecialchars($_POST['contactenos_titulo_ingles']);
}

if(isset($_POST['contactenos_subtitulo_ingles'])){
	$contactenos_subtitulo_ingles = htmlspecialchars($_POST['contactenos_subtitulo_ingles']);
}

if(isset($_POST['contactenos_descripcion_ingles'])){
	$contactenos_descripcion_ingles = htmlspecialchars($_POST['contactenos_descripcion_ingles']);
	$contactenos_descripcion_ingles = html_entity_decode($contactenos_descripcion_ingles, ENT_NOQUOTES, "UTF-8");
}

if(isset($_POST['contactenos_descripcion2_ingles'])){
	$contactenos_descripcion2_ingles = htmlspecialchars($_POST['contactenos_descripcion2_ingles']);
	$contactenos_descripcion2_ingles = html_entity_decode($contactenos_descripcion2_ingles, ENT_NOQUOTES, "UTF-8");
}
if(isset($_POST['contactenos_descripcion3_ingles'])){
	$contactenos_descripcion3_ingles = htmlspecialchars($_POST['contactenos_descripcion3_ingles']);
	$contactenos_descripcion3_ingles = html_entity_decode($contactenos_descripcion3_ingles, ENT_NOQUOTES, "UTF-8");
}
if(isset($_POST['contactenos_fecha'])){
	$contactenos_fecha = htmlspecialchars($_POST['contactenos_fecha']);
}

?>