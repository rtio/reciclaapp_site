var map;
var idInfoBoxAberto;
var infoBox = [];
var markers = [];

function initialize() {	
	var latlng = new google.maps.LatLng(-3.7906912, -38.5184577);
	
    var options = {
        zoom: 8,
		center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("mapa"), options);
}

initialize();

function abrirInfoBox(id, marker) {
	if (typeof(idInfoBoxAberto) == 'number' && typeof(infoBox[idInfoBoxAberto]) == 'object') {
		infoBox[idInfoBoxAberto].close();
	}

	infoBox[id].open(map, marker);
	idInfoBoxAberto = id;
}

function carregarPontos() {
	
	$.getJSON('js/pontos.json', function(pontos) {
		
		var latlngbounds = new google.maps.LatLngBounds();
		
		$.each(pontos, function(index, ponto) {
			
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(ponto.Latitude, ponto.Longitude),
				title: "Denuncia",
				icon: 'img/marcador.png'
			});
			
			var myOptions = {
				content: "<p>" + ponto.TipoLixo + "</p>" + "<p>Data da denuncia: " + ponto.Data + "</p>",
				pixelOffset: new google.maps.Size(-150, 0)
        	};

			infoBox[parseInt(ponto.ID)] = new InfoBox(myOptions);
			infoBox[parseInt(ponto.ID)].marker = marker;
			
			infoBox[parseInt(ponto.ID)].listener = google.maps.event.addListener(marker, 'click', function (e) {
				abrirInfoBox(parseInt(ponto.ID), marker);
			});
			
			markers.push(marker);
			
			latlngbounds.extend(marker.position);
			
		});
		var mcOptions = {gridSize: 50, maxZoom: 15};

		var markerCluster = new MarkerClusterer(map, markers, mcOptions);
		
		map.fitBounds(latlngbounds);
		
	});
	
}

carregarPontos();