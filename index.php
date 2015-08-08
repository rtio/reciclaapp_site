<?php include 'dados.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>:: Recicla App ::</title>
        <link rel="icon" type="image/png" href="img/96x96.png">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
     <style>
      html, body, #mapa {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
      .btn
      {
        position:absolute; 
        top:110px; 
        left:16px;
      }
    </style>
    <body>

    <div id="mapa"></div>

    <div class="btn"><button>Sobre o projeto</button></div>
    
    <script src="js/jquery.min.js"></script>
 
    <!-- Maps API Javascript -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPMiAsdQRu8JXSBozndkoeI8M3BP12XwA"></script>
        
    <!-- Caixa de informação -->
    <script src="js/infobox.js"></script>
    
        <!-- Agrupamento dos marcadores -->
    <script src="js/markerclusterer.js"></script>
 
        <!-- Arquivo de inicialização do mapa -->
    <script src="js/mapa.js"></script>

    </body>
</html>