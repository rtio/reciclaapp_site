<?php
namespace Persistencia;

use \PDO;

class Conexao
{
	define('SERVIDOR', 'jupitertec.com.br');
	define('BANCO',    'jupadmin_reciclabase');
	define('USUARIO',  'jupadmin_recadm');
	define('SENHA',    'J4ze9lMXn,0]');

	public static $instance; 

	public static function getInstance() 
	{
		try
		{
			if (!isset(self::$instance)) 
			{ 
				self::$instance = new PDO('mysql:host='.SERVIDOR.';dbname='.BANCO, USUARIO, SENHA, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
				self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING); 
			} 
			return self::$instance; 
		}
		catch(Exception $e)
		{
			echo 'Erro ao se conectar: '.$e;
		}

	}
}
?>