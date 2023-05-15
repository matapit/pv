<?php 
define('HOST', 'localhost');
define('DBNAME', 'comptabilite');
define('USRNAME', 'root');
define('PWD', 'qtQbV[jZ');

function connect()
{
	try{
		$res = new PDO('mysql:HOST=localhost;dbname='.DBNAME,USRNAME,PWD);
		$res->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch(PDOException $e){
		echo 'The database is not available please try later';
	}

	return $res;
}



 ?> 