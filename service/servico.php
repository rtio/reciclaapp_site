<?php
header('Content-Type: text/html; charset=utf-8');
if($_GET)
{
	try
	{
		$username = 'reciclaa_admin';
		$password = 'recicla2015*';

    	$conn = new PDO('mysql:host=localhost;dbname=reciclaa_recicdb', $username, $password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare('INSERT INTO Localizacao (Nome, Email, Logradouro, Numero, Bairro, TipoLixo, Latitude, Longitude, Data) VALUES(:Nome, :Email, :Logradouro, :Numero, :Bairro, :TipoLixo, :Latitude, :Longitude, NOW())');

		$stmt->bindParam(':Nome',       $_GET['nome'],       PDO::PARAM_STR);
		$stmt->bindParam(':Email',      $_GET['email'],      PDO::PARAM_STR);
		$stmt->bindParam(':Logradouro', $_GET['logradouro'], PDO::PARAM_STR);
		$stmt->bindParam(':Numero',     $_GET['numero'],     PDO::PARAM_INT);
		$stmt->bindParam(':Bairro',     $_GET['bairro'],     PDO::PARAM_STR);
		$stmt->bindParam(':TipoLixo',   $_GET['tipoLixo'],   PDO::PARAM_STR);
		$stmt->bindParam(':Latitude',   $_GET['latitude'],   PDO::PARAM_STR);
		$stmt->bindParam(':Longitude',  $_GET['longitude'],  PDO::PARAM_STR);
		
		$stmt->execute();
	} 
	catch(PDOException $e) 
	{
    	echo 'ERROR: ' . $e->getMessage();
	}
}
?>