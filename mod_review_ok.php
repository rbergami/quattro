<?php 
//ripristina la sessione
session_start();

// Verifica se la richiesta provenga effettivamente dal FORM
if ($_SERVER["REQUEST_METHOD"] == "GET") die("<p>Non puoi accedere allo script direttamente!</p>");

//recupera i dati personali dell'utente nell'array $dati
if (isset($_SESSION['dati'])) $dati=$_SESSION['dati'];

include "header.php";

//apre la feature
echo "<div class=\"feature\">";
//query per aggiornare la recensione
//strip_tags() toglie tag php e html che potrebbero causare problemi se inseriti malintenzionatamente da utenti
//addslashes() risolve il problema di mysql \'
$sql = "UPDATE `recensioni` SET artista='".$HTTP_POST_VARS['artista']."', titolo='".$HTTP_POST_VARS['titolo']."' , anno='".$HTTP_POST_VARS['anno']."', genere='".$HTTP_POST_VARS['genere']."', testo='".strip_tags(addslashes($HTTP_POST_VARS['testo']))."' WHERE id='".$HTTP_POST_VARS['id_review']."'";                     
if ($upd=mysql_query($sql, $conn)){
echo "<p><h2>Recensione modificata con successo.</h2></p>";
}
else echo "<p><h2>Errore! Impossibile eseguire la query.</h2></p>";

//chiude la feature
echo "</div>"; 

include "navbar.php";
include "footer.php";
?>