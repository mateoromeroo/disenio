<?php 
session_start();

// Obligatorios
include '../common/config.php';
include '../functions/functions.php';
require '../post/post.php';//Si se va a trabajar con envio de datos.
require_once '../models/general.class.php';// clases general query
$gen = new generalQuery(); 
require_once '../models/view.class.php';// clase que genera las vistas 
require_once '../models/modules.class.php';// 
require '../models/login.class.php';// clases login
include '../common/login_validate.php';// archivo que valida la sesion de usuario
include '../common/theme.php';// archivo que actualiza el tema.


// Inicia objeto de clase
$obj = new Noticia(); 

//Datos Generales x Archivo
$type_sys = SYS;
$htmlTitulo = 'Módulo de Noticias';


// Inicializa variable.
$hidden = '';
$block = '';
$visible = '';
$msg = '';



//Cantidad de registros por página
    $limit = 5;



##########################  MENU  ######################################

    $arg_btn_home = array(
        array('list-alt'  ,'<br>Módulo de<br> Noticias'   ,'noticia.php'    , "block")
        ,array('list-alt'  ,'<br>Módulo de<br> Empresas'   ,'empresa.php'    , "block")
        ,array('list-alt'  ,'<br>Módulo de<br> Quejas'   ,'quejas.php'    , "block")
        ,array('list-alt'  ,'<br>Módulo de<br> Contactenos'   ,'contactenos.php'    , "block")
    );

    $htmlBtnHome = btn_link_home($arg_btn_home);
    $htmlMenu = menu_view($arg_btn_home);

##########################  FIN-MENU  ##################################




// @Section-1 :> Eventos de BD: update,delete,insert | todas las vistas
    #Funcionalidades de botón
    if($btn_op_2!=''){
        switch($btn_op_2){
            case 'activar-exe':
                for($i=0;$i<$count_check;$i++){
                    $result = $obj->cambiarEstado(1,$check_selected[$i]);
                }

                if($result == 1){
                    $msg = time_alert_text('success',3000,'Se han activado <b>'.$count_check.'</b> registros.');
                }else{
                    $msg = alert_text('danger','Hubo un error, informar a los encargados.');
                }
            break;
            
            case 'desactivar-exe':
                for($i=0;$i<$count_check;$i++){
                    $result = $obj->cambiarEstado(2,$check_selected[$i]);
                }

                if($result == 1){
                    $msg = time_alert_text('success',3000,'Se han desactivado <b>'.$count_check.'</b> registros.');
                }else{
                    $msg = alert_text('danger','Hubo un error, informar a los encargados.');
                }
            break;
                
            case 'eliminar-exe':
                for($i=0;$i<$count_check;$i++){
                    $result = $obj->eliminar($check_selected[$i]);
                }

                if($result == 1){
                    $msg = time_alert_text('success',3000,'Se han eliminado <b>'.$count_check.'</b> registros.');
                }else{
                    $msg = alert_text('danger','Hubo un error, informar a los encargados.');
                }
            break;

            case 'listar-exe':
                echo '<br><br><br><br>';
                echo $limit.' - '.$page.' - '.$btn_op;
            break;
            
            case 'agregar-exe':

                $arg = array(
                        $noticia_orden
                        ,$noticia_titulo
                        ,$noticia_subtitulo
                        ,$noticia_descripcion
                        ,$noticia_descripcion2
                        ,$noticia_descripcion3
                        ,$noticia_imagen
                        ,$noticia_imagen2
                        ,$noticia_imagen3
                        ,$noticia_link_face
                        // ,$noticia_activo <----- No va, por que en otra vista ya se le incluye un valr por defecto (1)
                        ,$noticia_titulo_ingles
                        ,$noticia_subtitulo_ingles
                        ,$noticia_descripcion_ingles
                        ,$noticia_descripcion2_ingles
                        ,$noticia_descripcion3_ingles
                        ,$noticia_fecha
                    );

                $result = $obj->agregar($arg);

                if($result == 1){
                    $msg = time_alert_text('success',4000,'Se guardaron los datos correctamente.');
                }else{
                    $msg = alert_text('danger','Hubo un error, informar a los encargados.');
                }
            break;
            
            case 'modificar-exe':
               
                $arg = array(
                        'id' => $noticia_id
                        ,'fields' => array(
                                $noticia_orden
                                ,$noticia_titulo
                                ,$noticia_subtitulo
                                ,$noticia_descripcion
                                ,$noticia_descripcion2
                                ,$noticia_descripcion3
                                ,$noticia_imagen
                                ,$noticia_imagen2
                                ,$noticia_imagen3
                                ,$noticia_link_face
                                ,$noticia_titulo_ingles
                                ,$noticia_subtitulo_ingles
                                ,$noticia_descripcion_ingles
                                ,$noticia_descripcion2_ingles
                                ,$noticia_descripcion3_ingles
                                ,$noticia_fecha
                        )
                    );

                $result = $obj->editar($arg);

                if($result == 1){
                    $msg = time_alert_text('success',3000,'Se guardaron los datos correctamente.En breve será redireccionado...');
                    $msg.= script_redirect('noticia.php',3000);
                }else{
                    $msg = alert_text('danger','Hubo un error, informar a los encargados.');
                }
            break;
        }      
    }
// @Fin-Section


// @Section-2 :> Eventos de BD: select y otros | vistas externa

    #Implementar
    #Funcionalidades de botón/redirección
    if($btn_op_form!=''){      
        switch($btn_op_form){
            case 'agregar-form':
                $btn_op_text = 'agregar-exe';
                $título_form = 'Agregar nuevo registro';

            break;
            case 'modificar-form':
                $btn_op_text = 'modificar-exe';

                //obtenemos datos actuales para modificar:
                $usuario_id = $btn_id;
                $result = $obj->listarxId($btn_id);
                foreach($result as $col){
                    $noticia_id = $col['noticia_id'];
                    $noticia_orden = $col['noticia_orden'];
                    $noticia_titulo = $col['noticia_titulo'];
                    $noticia_subtitulo = $col['noticia_subtitulo'];
                    $noticia_descripcion = $col['noticia_descripcion'];
                    $noticia_descripcion2 = $col['noticia_descripcion2'];
                    $noticia_descripcion3 = $col['noticia_descripcion3'];
                    $noticia_imagen = $col['noticia_imagen'];
                    $noticia_imagen2 = $col['noticia_imagen2'];
                    $noticia_imagen3 = $col['noticia_imagen3'];
                    $noticia_link_face = $col['noticia_link_face'];
                    $noticia_titulo_ingles = $col['noticia_titulo_ingles'];
                    $noticia_subtitulo_ingles = $col['noticia_subtitulo_ingles'];
                    $noticia_descripcion_ingles = $col['noticia_descripcion_ingles'];
                    $noticia_descripcion2_ingles = $col['noticia_descripcion2_ingles'];
                    $noticia_descripcion3_ingles = $col['noticia_descripcion3_ingles'];
                    $noticia_fecha = $col['noticia_fecha'];
                }

                $título_form = 'Modificar registro: <b style="color: #EB2929;">'.$noticia_titulo.'</b>';
   
            break;
        }    
    }
// @Fin-Section


// @Section-3 :> Eventos de BD: select y otros casos generales/globales | todas las vistas

    #Funcionalidades generales/globales (aplica como default ante cualquier evento)

    //Listado de tipo
    $selectTipo = $obj->listaTipo($tipo_id);

    //Listado de usuarios activos 
    $htmlDinamicList_1 = $obj->listaActivos($limit,$page,$btn_op); // Lista que aparece al cargar la vista

    //Listado de usuarios no-activos   
    $htmlDinamicList_2 = $obj->listaDesactivados($limit,$page,$btn_op);


// @Fin-Section


// @Section-4 :>  Eventos de BD: select y otros que ejecutan por encima de otros($btn_op_2) | todas las vistas
    #Funcionalidades de listado
    if($btn_op!=''){
        switch($btn_op){   
            // Opciones de ejecucion  
            case 'buscar-exe':
                    $htmlDinamicList_1 = $obj->buscar($txt_search,$btn_op);
            break;      
        }

    }
// @Fin-Section




?>