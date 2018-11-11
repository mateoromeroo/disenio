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

					<div id="map"></div>

					<!-- <div class="rutas-mapa-contenedor col-xs-12 col-sm-offset-1 col-sm-10">
						<div class="rutas-mapa" id="map"></div>
					</div>	 -->

					<!-- <form action="" method="post">
						<div class="rutas-izq col-xs-12 col-sm-6">
							<div class="col-xs-12">
								Punto de inicio
							</div>
							<div class="col-xs-12">
								<input class="rut-input rut-input1" type="text">
							</div>
						</div>
						<div class="rutas-der col-xs-12 col-sm-6">
							<div class="col-xs-12">
								Punto de Destino
							</div>
							<div class="col-xs-12">
								<input class="rut-input rut-input2" type="text">
							</div>
						</div>
						<div class="queja-btn col-sx-12">
							<button type="submit" name="queja-btnBuscar" class="rutas-btnBuscar">
								Buscar
							</button>
						</div>
					</form> -->
				</div>			
			</div>
		</div>

	<!-- MAPA -->

		<!-- <div class="rutas-mapa-contenedor col-xs-12 col-sm-offset-1 col-sm-10">
			<div class="rutas-mapa" id="map"></div>
		</div> -->

		<div class="rutas-sect3 col-xs-12">
			<div class="container">
				<div class="col-xs-12 col-sm-offset-1 col-sm-10">
					<div class="rutas-sect3-cuadro col-xs-12">
						<div class="col-xs-12 col-sm-6 col-md-5">
								Ruta más corta:
						</div>
						<div class="rutas-sect3-color col-xs-12 col-sm-6 col-md-offset-2 col-md-5">
							<div class="col-xs-12 rutas-sect3-verde">
								
							</div>	
						</div>
						<div class="col-xs-12 col-sm-6 col-md-5">
								Otras rutas
						</div>
						<div class="rutas-sect3-color col-xs-12 col-sm-6 col-md-offset-2 col-md-5">
							<div class="col-xs-12 rutas-sect3-azul">
								
							</div>	
						</div>
						<div class="col-xs-12">
							Que carros puedo tomar?
						</div>
						<div class="col-xs-12 col-sm-5">
								carro1
						</div>
						<div class="col-xs-12 col-sm-2">
								--->				
						</div>
						<div class="col-xs-12 col-sm-5">
								pasaje: S/. 2.00
						</div>
						<div class="col-xs-12 col-sm-5">
								carro2
						</div>
						<div class="col-xs-12 col-sm-2">
								--->				
						</div>
						<div class="col-xs-12 col-sm-5">
								pasaje: S/. 1.80
						</div>
						<div class="col-xs-12 col-sm-5">
								carro3
						</div>
						<div class="col-xs-12 col-sm-2">
								--->				
						</div>
						<div class="col-xs-12 col-sm-5">
								pasaje: S/. 2.00
						</div>
						
					</div>
				</div>			
			</div>
		</div>
	</div>
</div>

<script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          mapTypeControl: false,
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });

        new AutocompleteDirectionsHandler(map);
      }

       /**
        * @constructor
       */
      function AutocompleteDirectionsHandler(map) {
        this.map = map;
        this.originPlaceId = null;
        this.destinationPlaceId = null;
        this.travelMode = 'WALKING';
        var originInput = document.getElementById('origin-input');
        var destinationInput = document.getElementById('destination-input');
        var modeSelector = document.getElementById('mode-selector');
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);

        var originAutocomplete = new google.maps.places.Autocomplete(
            originInput, {placeIdOnly: true});
        var destinationAutocomplete = new google.maps.places.Autocomplete(
            destinationInput, {placeIdOnly: true});

        this.setupClickListener('changemode-walking', 'WALKING');
        this.setupClickListener('changemode-transit', 'TRANSIT');
        this.setupClickListener('changemode-driving', 'DRIVING');

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
      }

      // Sets a listener on a radio button to change the filter type on Places
      // Autocomplete.
      AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
        var radioButton = document.getElementById(id);
        var me = this;
        radioButton.addEventListener('click', function() {
          me.travelMode = mode;
          me.route();
        });
      };

      AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
        var me = this;
        autocomplete.bindTo('bounds', this.map);
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          if (!place.place_id) {
            window.alert("Please select an option from the dropdown list.");
            return;
          }
          if (mode === 'ORIG') {
            me.originPlaceId = place.place_id;
          } else {
            me.destinationPlaceId = place.place_id;
          }
          me.route();
        });

      };

      AutocompleteDirectionsHandler.prototype.route = function() {
        if (!this.originPlaceId || !this.destinationPlaceId) {
          return;
        }
        var me = this;

        this.directionsService.route({
          origin: {'placeId': this.originPlaceId},
          destination: {'placeId': this.destinationPlaceId},
          travelMode: this.travelMode
        }, function(response, status) {
          if (status === 'OK') {
            me.directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      };

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWTqbyGQEG91zL0IeVEuPi3ZTGvji0TE8&libraries=places&callback=initMap"
        async defer></script>