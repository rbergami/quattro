<?php
//ripristina la sessione
session_start();

//recupera i dati personali dell'utente nell'array $dati
if (isset($_SESSION['dati'])) $dati=$_SESSION['dati'];

include "header.php";

//apre la feature
echo "<div class=\"feature\">";

$sql = "DELETE FROM utenti WHERE user='".$dati['user']."'";
if ($upd=mysql_query($sql, $conn)){
echo "<p><h2>Cancellazione effettuata con successo, torna a trovarci come ospite.</h2></p>";
}
else echo "<p><h2>Errore! Impossibile eseguire la query.</h2></p>";
//chiude la feature
echo "</div>"; 

include "navbar.php";
include "footer.php";
?>
