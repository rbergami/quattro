<?php
//ripristina la sessione
session_start();

//recupera i dati personali dell'utente nell'array $dati
if (isset($_SESSION['dati'])) $dati=$_SESSION['dati'];

include "header.php";

//apre la feature
echo "<div class=\"feature\">";

$testo="Registazione a \"QuAtTro - Recensioni musicali\"\nI dati di login sono:\nNomeUtente: ".$dati['user']."\nPassword: ".$dati['passwd']."\nNome: ".$dati['nome']."\nCognome: ".$dati['cognome']."\n           Grazie!";

mail($dati['email'],"Dati personali per QuAtTro Website",$testo,"Da register@quattro");
echo "<p><h2>Email inviata all' indirizzo di posta personale.</h2></p>";

//chiude la feature
echo "</div>"; 

include "navbar.php";
include "footer.php";
?>
