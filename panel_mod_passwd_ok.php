<?php 
//avvio sessione
session_start();
// Verifica se la richiesta provenga effettivamente dal FORM
if ($_SERVER["REQUEST_METHOD"] == "GET") die("Non puoi accedere allo script direttamente!");

//se l'utente ha già effettuato login recupera i dati personali dell'utente nell'array $dati
if (isset($_SESSION['dati'])) $dati=$_SESSION['dati'];
	else die ("Non sei loggato!");
include "header.php";
echo"
<div class=\"feature\">
<p></p>
<h2>Modifica dei dati personali</h2>";
//aggiorna il database coi nuovi dati
$sql="UPDATE utenti SET passwd='".$HTTP_POST_VARS['passwd']."' WHERE user='".$dati['user']."'";
if (!$res = mysql_query($sql, $conn)) 
	echo "Errore nella esecuzione della query impossibile aggiornare i dati personali<br>";
//se invece la query va a buon fine...
else {
echo "<p>Password modificata con successo!</p>";

//aggiornamento della sessione!
// seleziona il nome utente dal form per recuperarne i dati
$userforquery=$dati['user'];
$query="SELECT * FROM utenti WHERE user='$userforquery'";
if ($res = mysql_query($query, $conn)); 
else echo "Errore nella esecuzione della query \"$query\"";
//recupera i dati memorizzati dell'utente in un array associativo
$user_stored_data = mysql_fetch_array($res);
//reinserimento dati utente nella sessione corrente, quelli aggiornati!
$_SESSION['dati']=$user_stored_data;
}
//chiude <div class="feature">
echo "</div>";
include "navbar.php";
include "footer.php";
?>
