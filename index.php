<?php
spl_autoload_register(function ($class) 
{
    require_once(str_replace('\\', '/', $class . '.class.php'));
});

echo json_encode(\Entidade\LixoDenuncia::getAllData());
?>