<?php
include 'bootstrap.php';

use Jupiter\Entidade\Lixo;

//var_dump($con);
echo __NAMESPACE__;
var_dump(Lixo::getAllData());
echo json_encode(Lixo::getAllData());
?>