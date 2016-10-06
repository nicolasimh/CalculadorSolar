function soloNumeros( event ) {
	if (event.keyCode < 48 || event.keyCode > 57)
		event.returnValue = false;

}

function preguntaEliminacion( event ){ 
    if ( ! confirm('¿Estas seguro que deseas eliminar este registro?')){ 
       event.preventDefault();
    } 
}

function setNumberDecimal( latitud ) {
    return parseFloat(latitud).toFixed(7);
}

function localizame() {
    if (navigator.geolocation) { /* Si el navegador tiene geolocalizacion */
         navigator.geolocation.getCurrentPosition(coordenadas, errores);
    }else{
     	latitud = 0;
     	longitud = 0;
     	initMap();
    }
}

function coordenadas(position) {
    latitud = position.coords.latitude; /*Guardamos nuestra latitud*/
    longitud = position.coords.longitude; /*Guardamos nuestra longitud*/
    initMapCoordenadas( latitud , longitud );
}

function errores(err) {
    /*Controlamos los posibles errores */
    if (err.code == 0) {
      alert("Oops! Algo ha salido mal");
    }
    if (err.code == 1) {
      alert("Oops! No has aceptado compartir tu posición");
    }
    if (err.code == 2) {
      alert("Oops! No se puede obtener la posición actual");
    }
    if (err.code == 3) {
      alert("Oops! Hemos superado el tiempo de espera");
    }
}

function initMapCoordenadas( latitud , longitud ) {
	$("#latitud").val( setNumberDecimal (latitud) );
  $("#longitud").val( setNumberDecimal(longitud) );
	var latlon = new google.maps.LatLng(latitud,longitud);
	var myOptions = {
                zoom: 15,
                center: latlon
            };
    map = new google.maps.Map(document.getElementById('map'), myOptions);

    coorMarcador = new google.maps.LatLng(latitud,longitud); /Un nuevo punto con nuestras coordenadas para el marcador (flecha) */
                
    var marcador = new google.maps.Marker({
				draggable: true,
                position: coorMarcador, /*Lo situamos en nuestro punto */
                animation: google.maps.Animation.DROP,
                map: map, /* Lo vinculamos a nuestro mapa */
                title: "Fijar Posición del proyecto" 
            });
    marcador.addListener( 'dragend', function (event) {
    	$("#latitud").val(setNumberDecimal (this.getPosition().lat()));
    	$("#longitud").val(setNumberDecimal(this.getPosition().lng()));
      });
}

function initMapDireccion( ) {
  var geoCoder = new google.maps.Geocoder($("#ubicacion").val());
  var request = {address:$("#ubicacion").val()};

  geoCoder.geocode(request, function(result, status){
    var coorMarcador = new google.maps.LatLng(result[0].geometry.location.lat(), 
                                        result[0].geometry.location.lng()
                                      );  
    var myOptions = {
      zoom: 15,
      center: coorMarcador,
    };

    var map = new google.maps.Map(document.getElementById("map"),myOptions);

    var marcador = new google.maps.Marker({
        draggable: true,
                position: coorMarcador, /*Lo situamos en nuestro punto */
                animation: google.maps.Animation.DROP,
                map: map, /* Lo vinculamos a nuestro mapa */
                title: "Fijar Posición del proyecto" 
            });
    $("#latitud").val( setNumberDecimal (marcador.getPosition().lat()) );
    $("#longitud").val( setNumberDecimal(marcador.getPosition().lng()) );
    marcador.addListener( 'dragend', function (event) {
      $("#latitud").val(setNumberDecimal (this.getPosition().lat()));
      $("#longitud").val(setNumberDecimal(this.getPosition().lng()));
      });
  });
}
