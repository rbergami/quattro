<?php

// parametri di connessione
$db_server="localhost";
$db_user="mrmoon";
$db_password="mrzmrz";

//connessione al db server
$conn= mysql_connect($db_server, $db_user, $db_password)
	or die("Errore! Impossibile connettersi al db server");

//nome database
$db_nomedb="recensioni";

//sceglie il db
if (!mysql_select_db($db_nomedb, $conn)) die ("Errore! Impossibile connettersi al database $db_nomedb");
?>