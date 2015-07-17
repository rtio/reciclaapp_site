var markersData = null;
$.ajax({
    url : "http://localhost/reciclaapp_site/dados.php",
    dataType : "json",
    success : function(data)
    {
      markersData = data;
    }
});//termina o ajax
/*
var markersData = [
  {
      Latitude: -3.7427431,
      Longitude: -38.5014406,
      Bairro: "Estácio Fic",
      Logradouro:"Rua Visconde de Mauá, 1940",
      TipoLixo: "Lixo Residencial",
      Data: "Data da denuncia: 07/07/2015" // não colocar virgula no último item de cada marcador
   },
   {
      Latitude: -3.7376735,
      Longitude: -38.5361826,
      Bairro: "UFC",
      Logradouro:"Avenida da Universidade, 2307",
      TipoLixo: "Outros",
      Data: "Data da denuncia: 25/06/2015" // não colocar virgula no último item de cada marcador
   },
   {
      Latitude: -3.7220178,
      Longitude: -38.528197,
      Bairro: "Santa Casa de Misericória",
      Logradouro:"Rua Senador Pompeu, 349",
      TipoLixo: "Lixo Hospitalar",
      Data: "Data da denuncia: 01/07/2015" // não colocar virgula no último item de cada marcador
   } // não colocar vírgula no último marcador
];
*/

// Esta função vai percorrer a informação contida na variável markersData
// e cria os marcadores através da função createMarker
function displayMarkers(){

   // esta variável vai definir a área de mapa a abranger e o nível do zoom
   // de acordo com as posições dos marcadores
   var bounds = new google.maps.LatLngBounds();

   // Loop que vai percorrer a informação contida em markersData 
   // para que a função createMarker possa criar os marcadores 
   for (var i = 0; i < markersData.length; i++){

      var latlng = new google.maps.LatLng(markersData[i].Latitude, markersData[i].Longitude);
      var Bairro = markersData[i].Bairro;
      var Logradouro = markersData[i].Logradouro;
      var TipoLixo = markersData[i].TipoLixo;
      var Data = markersData[i].Data;

      createMarker(latlng, Bairro, Logradouro, TipoLixo, Data);

      // Os valores de latitude e longitude do marcador são adicionados à
      // variável bounds
      bounds.extend(latlng); 
   }

   // Depois de criados todos os marcadores,
   // a API, através da sua função fitBounds, vai redefinir o nível do zoom
   // e consequentemente a área do mapa abrangida de acordo com
   // as posições dos marcadores
   map.fitBounds(bounds);
}

// Função que cria os marcadores e define o conteúdo de cada Info Window.
function createMarker(latlng, Bairro, Logradouro, TipoLixo, Data){
    var image = {
    url: 'images/trash.png',
    // This marker is 20 pixels wide by 32 pixels tall.
    size: new google.maps.Size(32, 32),
    // The origin for this image is 0,0.
    origin: new google.maps.Point(0,0),
    // The anchor for this image is the base of the flagpole at 0,32.
    anchor: new google.maps.Point(0, 32)
  };
   var marker = new google.maps.Marker({
      map: map,
      animation: google.maps.Animation.DROP,
      icon: image,
      draggable:false,
      position: latlng,
      title: Bairro
   });

   // Evento que dá instrução à API para estar alerta ao click no marcador.
   // Define o conteúdo e abre a Info Window.
   google.maps.event.addListener(marker, 'click', function() {
      
      // Variável que define a estrutura do HTML a inserir na Info Window.
      var iwContent = '<div id="iw_container">' +
      '<div class="iw_title">' + Bairro + '</div>' +
      '<div class="iw_content">' + Logradouro + '<br />' +
      TipoLixo + '<br />' +
      Data + '</div></div>';
      
      // O conteúdo da variável iwContent é inserido na Info Window.
      infoWindow.setContent(iwContent);

      // A Info Window é aberta com um click no marcador.
      infoWindow.open(map, marker);
   });
}

function initialize() {
   var mapOptions = {
      center: new google.maps.LatLng(-3.7493426,-38.5321613),
      zoom: 8,
      mapTypeId: 'roadmap',
   };

   map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

   // Cria a nova Info Window com referência à variável infoWindow.
   // O conteúdo da Info Window é criado na função createMarker.
   infoWindow = new google.maps.InfoWindow();

   // Evento que fecha a infoWindow com click no mapa.
   google.maps.event.addListener(map, 'click', function() {
      infoWindow.close();
   });

   // Chamada para a função que vai percorrer a informação
   // contida na variável markersData e criar os marcadores a mostrar no mapa
   displayMarkers();
}
google.maps.event.addDomListener(window, 'load', initialize);