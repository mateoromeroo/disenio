<?php 
	// echo "--->".$vistaPaginador;
 ?>

<div class="rutas-sect1 noticias col-xs-12">
	<div class="not-sect1 col-xs-12">
		<!-- background-image -->
	</div>
	<div class="not-sect2 col-xs-12">
		
		<div class="col-xs-12 not-sect2-1">
			<div class="container">
				<div class="col-xs-12 col-sm-offset-1 col-sm-10">
					<div class="rutas-sect2-tit not-sect2-noticias col-xs-12">
						A donde desea ir?
					</div>
				</div>
				<div class="rutas-busqueda col-xs-12 col-sm-offset-1 col-sm-10">

					<input id="origin-input" class="controls" type="text" placeholder="Ingrese un punto de origen">

					<input id="destination-input" class="controls" type="text" placeholder="Ingrese el punto de destino">

					<div id="mode-selector" class="controls">
					  <input type="radio" name="type" id="changemode-walking" checked="checked">
					  <label for="changemode-walking">Caminando</label>
					  
					  <br class="visible-xs">
					  <input type="radio" name="type" id="changemode-transit">
					  <label for="changemode-transit">Transporte Público</label>
					  
					  <br class="visible-xs">
					  <input type="radio" name="type" id="changemode-driving">
					  <label for="changemode-driving">Conduciendo</label>
					</div>

					<!-- MAPA -->
					<div id="map"></div>

				</div>			
			</div>
		</div>

		<div class="rutas-sect3 col-xs-12">
			<div class="container">
				<div class="rutas-sect3-paraderos col-xs-12 col-sm-offset-1 col-sm-10">
					<div class="col-xs-12">
						Ver paraderos de las empresas de transporte
					</div>
					<div class="rutas-sect3-empresas col-xs-12">
						<div class="col-xs-12 col-sm-6">
							<button>Consorcio via sac</button>
						</div>
						<div class="col-xs-12 col-sm-6">
							<button>Consorcio via sac</button>
						</div>
						<div class="col-xs-12 col-sm-6">
							<button>Consorcio via sac</button>
						</div>
						<div class="col-xs-12 col-sm-6">
							<button>Consorcio via sac</button>
						</div>
						<div class="col-xs-12 col-sm-6">
							<button>Consorcio via sac</button>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>

