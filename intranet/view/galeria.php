<?php require_once '../controller/galeria.controller.php'; ?>

<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="UTF-8">
    <meta lang="ES">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>::Módulo de Galería de fotos::</title>
    <link rel="stylesheet" type="text/css" href="app/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app/css/style.css">
    <script src="app/js/jquery.js"></script>
    <script src="app/js/bootstrap.js"></script>
    <script src="app/js/app.js"></script>
    <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
    
    <style type="text/css">
      /* TEMA */
      <?= $styleMask; ?>
        
        body{
            background: url(app/img/fondo-home.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;        
        }  
    </style>
  </head>

  <body>

    <?php include 'tpl/header.php'; ?>

    <div class="wrapper" id="wrapper">
      <!-- LEFT -->
        <div class="left-container" id="left-container">
          <div class="hide-sidebar" id="show-nav">
            <form method="POST">       
                <ul id="side" class="side-nav">
                    <?= $htmlMenu;/*$menu;*/ ?>
                </ul>
            </form>
          </div> 
        </div>

      <!-- RIGHT -->
        <div class="right-container <?= $body; ?>" id="right-container">
          <div class="container-fluid">
            <div class="row">         
                <div class="col-xs-12">
                  <center>
                    <h3>
                      <b><?= $htmlTitulo; ?></b>
                    </h3>

                  </center>

                  <div class="col-xs-12 section-home">
                    <center>
                        <form class="form-g" action="<?= URL; ?>" method="post">
                          <div class="form-options">
                            <div class="col-xs-12 col-sm-6 col-md-7 text-center">
                              <div class="sec-form-options form-g col-xs-12">
                                <label>Opciones</label>
                                <button type="submit" class="btn btn-primary" formaction="galeria-form.php" name="btn-op-form" value="agregar-form">
                                  <span class="glyphicon glyphicon-plus" aria-hidden="true" style="font-size:14px;"></span>
                                  <span class="hidden-xs hidden-sm">Agregar</span>
                                </button>
                                <button type="submit" class="btn btn-primary" name="btn-op-2" value="desactivar-exe/<?= $btn_op; ?>//<?= $page; ?>" title="Desactivar seleccionados">
                                  <span class="glyphicon glyphicon-remove" aria-hidden="true" style="font-size:14px;"></span>
                                  <span class="hidden-xs hidden-sm">Desactivar</span>
                                </button>
                                <button type="submit" class="btn btn-primary" name="btn-op-2" value="eliminar-exe/<?= $btn_op; ?>//<?= $page; ?>" title="Eliminar seleccionados">
                                  <span class="glyphicon glyphicon-trash" aria-hidden="true" style="font-size:14px;"></span>
                                  <span class="hidden-xs hidden-sm">Eliminar</span>
                                </button>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-5 hidden-xs">
                              <div class="sec-form-options form-g col-xs-12">
                                <label>Buscar</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" name="txt-search" placeholder="Escriba el nombre" value="<?= $txt_search; ?>" id="input-search">
                                  <div class="input-group-btn">
                                    <button disabled type="submit" class="btn btn-primary" name="btn-op" value="buscar-exe" id="btn-search">
                                      <span class="glyphicon glyphicon-search" aria-hidden="true" style="font-size:14px;"></span>
                                    </button>
                                  </div>
                                </div>      
                              </div>
                            </div>
                          </div>

                          <center>
                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                              <?= $msg; ?>
                            </div>
                          </center>
                          <div class="form-conten">
                            <?= $htmlDinamicList_1; ?>
                          </div>
                        </form>
                    </center> 
                  </div>
                </div>
            </div>          
          </div>
        </div>
    </div>

    <!-- Formulario para agregar/modificar -->
    <div class="section-float-form section-usuario-form">
      <form action="<?= URL; ?>" method="POST">
        <div class="col-xs-12">
          <div class="text-form text-just">
            <h4>
              <b>
                Agregar nuevo registro
              </b>
            </h4>

            <p>
              Toda transacción que realice es almacenada, 
              se recomienda verificar los datos antes de ser guardados. <span class="glyphicon glyphicon-thumbs-up" style="color:blue;"></span>
            </p>
          </div>

          <div class="obj-form">
            <div class="section-input">
              <label>Orden:</label>
              <input type="number" class="form-control" name="categoria_orden" required>
            </div>
            <div class="section-input">
              <label>Nombre:</label>
              <input type="text" class="form-control" name="categoria_nombre" required>
            </div>
            <div class="section-input">
              <label>Nombre en inglés:</label>
              <input type="text" class="form-control" name="categoria_nombre_ingles" required>
            </div>
            <!-- hidden obj -->
            <div class="section-input">
              <button type="submit" name="btn-op-2" value="agregar-exe/<?= $btn_op; ?>/<?= $valor_filtro; ?>/<?= $valor_pagina; ?>" class="btn btn-success btn-save">
                Guardar <span class="glyphicon glyphicon-saved"></span>
              </button>
              <br><br><br>
              <button type="button" class="btn btn-danger btn-close-form" id="closeFormRight">
                Ocultar <span class="glyphicon glyphicon-chevron-right"></span>
              </button>
            </div>  
          </div>
        </div>
      </form>
    </div>


    <footer>
        <div class="section-menu">
            <button type="button" class="btn-md btn-primary btn-foot btn-view-des">
              <span class="glyphicon glyphicon-chevron-up" aria-hidden="true" style="font-size:14px;"></span>
              <br>Ver Desactivados 
            </button>
            <button type="button" class="btn-md btn-danger btn-foot btn-view-des close-view-des">
              <span class="glyphicon glyphicon-chevron-down" aria-hidden="true" style="font-size:14px;"></span>
              <br>Ocultar Desactivados  
            </button>
    
            <button type="button" class="btn-md btn-primary btn-foot" id="callFormRight">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="font-size:14px;"></span>
              <br>Agrega Rápido
            </button>
        </div>
        <section class="view-desactivados" id="view-desactivados">
            <div class="container table-des">
                <form action="<?= URL; ?>" method="post">
                    <div class="section-table">
                      <?= $htmlDinamicList_2; ?>
                    </div>
                    
                    <div class="btn-section text-right">
                        <button type="submit" class="btn-sm btn-success" name="btn-op-2" value="activar-exe/<?= $btn_op; ?>/<?= $tipo_usuario_id; ?>/<?= $page; ?>">
                          <span class="glyphicon glyphicon-ok" aria-hidden="true" style="font-size:14px;"></span>
                          Activar
                        </button>
                        <!--button disabled type="submit" class="btn-sm btn-default" name="btn-op-2" value="listar-exe/<?= $btn_op; ?>">
                          Cargar en página
                        </button-->
                    </div> 
                </form>
            </div>   
        </section>
    </footer>

    <div class="carga"></div>

  </body>

</html>