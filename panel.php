<?php 
//avvio sessione
session_start();
//se l'utente ha già effettuato login recupera i dati personali dell'utente nell'array $dati
if (isset($_SESSION['dati'])) $dati=$_SESSION['dati'];
	else die ("Non sei loggato!");
include "header.php";

?>
<div class="feature">
<p></p>
<h2>Pagina di amministrazione personale</h2>
<?php 

//Verifica se all'utente corrisponde una sessione 
if (!isset($_SESSION)) printf("<br> <strong>Utente non riconosciuto!</strong><br><br><a href=index.php>Torna alla home page ed effettua il login</a>\n");
else{
echo "<ul>";
echo "<li><strong>Dati personali memorizzati:</strong>";
echo "<p>";
echo "<table>";
printf("<tr><td><strong>UserName: </strong></td><td>%s", $dati['user']);
echo "</td></tr>";
printf("<tr><td><strong>Password: </strong></td><td>********");
echo "</td></tr>";
printf("<tr><td><strong>Nome: </strong></td><td>%s", $dati['nome']);
echo "</td></tr>";
printf("<tr><td><strong>Cognome: </strong></td><td>%s", $dati['cognome']);
echo "</td></tr>";
printf("<tr><td><strong>Indirizzo Email: </strong></td><td>%s", $dati['email']);
echo "</td></tr>";
echo "</table>";
echo "</p></li>";
echo "<p></p>";
printf("<li><a href=\"panel_mod_passwd.php?%s=%s\">Modifica la password</a></li>", session_name(), session_id());
printf("<li><a href=\"panel_mod_others.php?%s=%s\">Modifica gli altri dati personali</a></li>", session_name(), session_id());
printf("<li><a href=\"panel_mod_cancel_ok.php?%s=%s\" onClick=\"return confirm('Sicuro di volerci lasciare? :-(');\">Cancella la tua iscrizione</a></li>", session_name(), session_id());
printf("<li><a href=\"panel_send_email.php?%s=%s\" onClick=\"return confirm('Sicuro volere inviare una email riepilogativa?');\">Invia una email riepilogativa coi tuoi dati al tuo indirizzo</a></li>", session_name(), session_id());

echo "</ul>";
}
//chiude <div class="feature">
echo "</div>";
include "navbar.php";
include "footer.php";
?>
