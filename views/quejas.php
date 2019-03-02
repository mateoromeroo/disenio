<?php 
	// echo "--->".$vistaPaginador;
 ?>

<div id="fb-root"></div>
<script async defer src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2"></script>

<div class="noticias col-xs-12">
	<div class="not-sect1 col-xs-12">
		<!-- background-image -->
	</div>
	<div class="not-sect2 col-xs-12">
		<div class="quejas-contenedor col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">
			<div class="quejas-sect2-noticias col-xs-12">
				Quejas y/o Sugerencias
			</div>
			<div class="quejas-sect2-txt col-xs-12">
				<div class="quejas2-sect2-bordebajo col-xs-12">
					 Muchas veces sufrimos abusos por parte de un chofer o cobrador, ya sea por que no quiere aceptar el medio pasaje entre otras cosas. En esta sección puedes ver las experiencias de muchas personas que no han sido escuchado su reclamo. Si tienes alguna queja o sugerencia puedes contarnos tu experiencia también aquí.
				</div>
			</div>

			<?php include("lista_quejas.html"); ?>

			
			<div class="not-paginador col-xs-12">
					<?php 

						for ($i=1; $i <= $numeroPaginas; $i++) { 
							if ($i == $pagina_actual) { // Si estamos en la página actual...
								echo "<span class='activePaginador not-paginador-num'><a href='?pagina=$i'>$i</a></span>"; // Lo mostramos activado.
							}else{ // sino solo mostramos sin activar.
								echo "<span class='not-paginador-num'><a href='?pagina=$i'>$i</a></span>";
							}
						}

					 ?>
			</div>
			
			<div class="queja-realizarQueja-txt col-xs-12">
				Si has tenido algun problema o tienes alguna queja o sugerencia con alguna empresa de transporte público, puedes contarnos tu experiencia en esta sección.
			</div>
			<div class="queja-realizarQueja col-xs-12">
				<form action="quejasPublicar.php" method="post">
					<button type="submit" name="queja-btnEscribir" class="btn-publicar">
						Escribir publicación
					</button>
				</form>
			</div>
		</div>
	</div>
</div>