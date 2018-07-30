<?php 
//ripristina la sessione
session_start();

// Verifica se la richiesta provenga effettivamente dal FORM
if ($_SERVER["REQUEST_METHOD"] == "GET") die("<p>Non puoi accedere allo script direttamente!</p>");

//recupera i dati personali dell'utente nell'array $dati
if (isset($_SESSION['dati'])) $dati=$_SESSION['dati'];
//recuperiamo dal link la variabile che identifica la recensione da mostrare
$id_review=$HTTP_POST_VARS['id_review'];
include "header.php";

//apre la feature
echo "<div class=\"feature\">";

$sql = "INSERT INTO `commenti` ( `id_review` , `user` , `testo` , `data` ) VALUES ( '".$id_review."' , '".$dati['user']."' , '".strip_tags(addslashes($HTTP_POST_VARS['testo']))."' , NOW() )";
// se tutto ok...
if (mysql_query($sql, $conn)){
echo "<p><h3>Nuovo commento inserito con successo.</h3></p>
		<p><ul><li><a href=\"show_review.php?id_review=".$id_review."&".session_name()."=".session_id()."\">Torna alla recensione...</a></li></ul></p>";
}
else echo "<p><h2>Errore! Impossibile inserire il commento!</h2></p>";

//chiude la feature
echo "</div>"; 

include "navbar.php";
include "footer.php";
?>