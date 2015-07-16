<?php
namespace Jupiter\Entidade;

use Jupiter\Persistencia\Conn;

class Lixo
{
	public static function getAllData()
	{
		$sql = "SELECT Nome, Email, Logradouro, Numero, Bairro, TipoLixo, Latitude, Longitude, Data FROM localizacao;";
		var_dump(Conn::getInstance());
		$result = Conn::getInstance()->query($sql);

		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
}
?>