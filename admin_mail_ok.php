<?php 
//avvio sessione
session_start();
//se l'utente ha già effettuato login recupera i dati personali dell'utente nell'array $dati
if (isset($_SESSION['dati'])) $dati=$_SESSION['dati'];
	else die ("Non sei loggato!");

// Verifica se la richiesta provenga effettivamente dal FORM di ricerca
if ($_SERVER["REQUEST_METHOD"] == "GET") die("Non puoi accedere allo script direttamente!");
include "header.php";

echo "<div class=\"feature\">";
if ($HTTP_POST_VARS['dest']=="TUTTI"){
$query="SELECT email FROM utenti";
if (!$indirizzi = mysql_query($query, $conn)) die ("Impossibile connettersi al db server!"); 
	for ($i=0;$i< mysql_num_rows($indirizzi);$i++){
		$ind=mysql_fetch_row($indirizzi);
	//il primo if serve per farlo solo una volta
	if ($i==0) if( mail($ind[0],$HTTP_POST_VARS['subject'],$HTTP_POST_VARS['testo'],"Da admin@quattro")) echo "<h3>Mail inviate con successo.</h3>"; 
	else "<h3>Impossibile spedire le email, riprovare.</h3>";
	};
}
else
if( mail($HTTP_POST_VARS['dest'],$HTTP_POST_VARS['subject'],$HTTP_POST_VARS['testo'],"Da admin@quattro")) echo "<h3>Mail inviata con successo!</h3>"; 
else "<h3>Impossibile spedire l'email, riprovare.</h3>";
echo "</div>";
include "navbar.php";
include "footer.php";
?>