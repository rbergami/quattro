<?php 
session_start();
//se l'utente ha già effettuato login recupera i dati personali dell'utente nell'array $dati
if (isset($_SESSION['dati'])) $dati=$_SESSION['dati'];

include "header.php";

//recuperiamo dal link la variabile che identifica la recensione da cancellare
$id_review=$HTTP_GET_VARS['id_review'];

echo "<div class=\"feature\">";
//elimina recensione
$sql="DELETE FROM recensioni WHERE id='".$id_review."'";
if (!mysql_query($sql, $conn)) die("<h3>Impossibile cancellare la recensione!</h3></div>");

//elimina i relativi commenti
$sql="DELETE FROM commenti WHERE id_review='".$id_review."'";
if (!mysql_query($sql, $conn)) die("<h3>Impossibile eliminare i commenti!</h3></div>");

echo "<h3>Recensione e relativi commenti eliminati con successo!</h3>";
//chiude la feature
echo "</div>";

include "navbar.php";
include "footer.php";
?> 