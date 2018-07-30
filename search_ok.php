<?php 
session_start();
//se l'utente ha già effettuato login recupera i dati personali dell'utente nell'array $dati
if (isset($_SESSION['dati'])) $dati=$_SESSION['dati'];

// Verifica se la richiesta provenga effettivamente dal FORM di ricerca
if ($_SERVER["REQUEST_METHOD"] == "GET") die("Non puoi accedere allo script direttamente!");

include "header.php";

// cerca le recensioni coerenti alla keyword inserita
$sql="SELECT id,artista,titolo,genere FROM `recensioni` WHERE ".$HTTP_POST_VARS['kind']." LIKE '%".$HTTP_POST_VARS['keyword']."%'";
if (!$recensioni=mysql_query($sql, $conn)) die ("Impossibile connettersi al database,riprovare.");

echo "<p></p><div class=\"feature\">
		<h2>Cerca Recensione</h2>
		<p></p><p></p>";
$nrighe = mysql_num_rows($recensioni);
$ncol = mysql_num_fields($recensioni);
if ($nrighe == 0) echo "<h3>Nessuna recensione trovata, riprovare.</h3>";
else {
	echo "<h3>Recensioni trovate:</h3><table width=\"95%\" >";
	echo "<tr><td><strong>Artista</strong></td><td><strong>Titolo</strong></td><td><strong>Genere</strong></td><td><strong>Link alla Recensione</strong></td></tr>";
	for ($i=0;$i<$nrighe;$i++){
		echo "<tr>";
		$rec= mysql_fetch_array($recensioni);
		echo "<td>".$rec['artista']."</td>";
		echo "<td>".$rec['titolo']."</td>";
		echo "<td>".$rec['genere']."</td>";
		echo "<td><a href=\"show_review.php?id_review=".$rec['id']."&".session_name()."=".session_id()."\">link...</a></td>";
		echo "</tr>";
	}
echo "</table>";
}
//chiude la feature
echo "</div>";

//pulizia del buffer delle query del db server
mysql_free_result($recensioni);
//chiude else iniziale

include "navbar.php";
include "footer.php";
?> 
