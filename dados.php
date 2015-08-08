<?php
include 'bootstrap.php';

use Jupiter\Entidade\Lixo;

$fp = fopen('js/pontos.json', 'w');
fwrite($fp, json_encode(Lixo::getAllData()));
fclose($fp);
?>