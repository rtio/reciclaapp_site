<?php
include 'bootstrap.php';

use Jupiter\Entidade\Lixo;

echo json_encode(Lixo::getAllData());
?>