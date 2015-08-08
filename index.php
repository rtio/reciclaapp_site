<?php include 'dados.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>:: Recicla App ::</title>
        <link rel="icon" type="image/png" href="img/96x96.png">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>

    <body>

    <div id="mapa"></div>

    <div class="infoProjeto">
        <button type="button" id="btnSobre" class="btn btn-success">Sobre o projeto</button>
    </div>

    <!-- Popover title -->
    <div id="popoverTitle" style="display: none">:: Recicla App ::</div>

    <!-- Popover content -->
    <div id="popoverContent" style="display: none">
        <p>Projeto de iniciação científica do Centro Universitário Estácio do Ceará</p>
        <p><b>Orientador: </b>Wellington S. Aguiar</p>
        <p><b>Orientando: </b>Aluno 1</p>
        <p><b>Orientando: </b>Aluno 2</p>
        <p>O projeto se destina à comunidade, para que os usuários do sistema informem focos de lixo, mal armazenados, espalhados pela cidade.</p>
        <p>Faça o download do app <a href="output/reciclaapp.apk">aqui</a>.</p>
    </div>  

    <script src="js/jquery.min.js"></script>
 
    <!-- Maps API Javascript -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPMiAsdQRu8JXSBozndkoeI8M3BP12XwA"></script>
        
    <!-- Caixa de informação -->
    <script src="js/infobox.js"></script>
    
        <!-- Agrupamento dos marcadores -->
    <script src="js/markerclusterer.js"></script>
 
        <!-- Arquivo de inicialização do mapa -->
    <script src="js/mapa.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(function () {
            // Enabling Popover - JS (hidden content and title capturing)
            $("#btnSobre").popover({
                html     : true,
                placement: 'top',
                container: 'body',
                title    : function() {
                  return $('#popoverTitle').html();
                },
                content  : function() {
                  return $('#popoverContent').html();
                }
            });
        });
    </script>

    </body>
</html>