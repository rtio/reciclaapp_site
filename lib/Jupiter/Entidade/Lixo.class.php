<?php
namespace Jupiter\Entidade;

use Jupiter\Persistencia\Conn;

use \PDO as PDO;

class Lixo
{
	public static function getAllData()
	{
		$sql = "SELECT Logradouro, Numero, Bairro, TipoLixo, Latitude, Longitude, DATE_FORMAT(Data, '%d/%m/%Y') AS Data FROM localizacao;";
		$result = Conn::getInstance()->query($sql);

		return $result->fetchAll(PDO::FETCH_OBJ);
	}
}
?>