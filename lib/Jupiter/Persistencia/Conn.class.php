<?php
namespace Jupiter\Persistencia;

use \PDO as PDO;

class Conn
{
	public static $instance;

	const HOST     = 'localhost';
	const DBNAME   = 'reciclaa_recicdb';
	const USER     = 'reciclaa_admin';
	const PASSWORD = 'recicla2015*';

	public static function getInstance()
	{
		try
		{
			if(!isset(self::$instance))
			{
				self::$instance = new PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME, self::USER, self::PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
			}
			return self::$instance;
		}
		catch (PDOException $e)
		{
			echo $e;
		}
		catch (Exception $e)
		{
			echo $e;
		}
	}
}
?>