<?php
namespace Entidade;

use reciclaapp_site\Persistencia\Conexao;

class LixoDenuncia
{
	//Uso posterior
	private $nomeDoDenunciante;
	private $emailDoDenunciante;
	private $logradouroDoLixo;
	private $NumeroDoLocalDoLixo;
	private $BairroDoLixo;
	private $TipoDoLixo;
	private $Latitude;
	private $Logitude;
	private $DataDaDenuncia;
	
	public static function getAllData()
	{
		$sql = "SELECT `ID`, `Nome`, `Email`, `Logradouro`, `Numero`, `Bairro`, `TipoLixo`, `Latitude`, `Longitude`, `Data` FROM `Localizacao` WHERE 1";
		$query = Conexao::getInstance()->query($sql);
		
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
}
?>