<?php

error_reporting(E_ALL ^ E_DEPRECATED);

// parametri di connessione
$db_server=getenv(strtoupper(getenv("DATABASE_SERVICE_NAME"))."_SERVICE_HOST");
$db_user=getenv("DATABASE_USER");
$db_password=getenv("DATABASE_PASSWORD");

//connessione al db server
$conn= mysql_connect($db_server, $db_user, $db_password)
	or die("Errore! Impossibile connettersi al db server");

//nome database
$db_nomedb="recensioni";

//sceglie il db
if (!mysql_select_db($db_nomedb, $conn)) die ("Errore! Impossibile connettersi al database $db_nomedb");


?>
