<?php 
session_start();
//se l'utente ha già effettuato login recupera i dati personali dell'utente nell'array $dati
if (isset($_SESSION['dati'])) $dati=$_SESSION['dati'];
include "header.php";

// recupera TUTTE le recensioni inserite
$sql="SELECT id,artista,titolo,genere,avg FROM `recensioni` ORDER BY avg DESC";
if (!$recensioni=mysql_query($sql, $conn)) die("Impossibile connettersi al db server!");


echo "<p></p><div class=\"feature\">
		<h2>Classifica Album:</h2><p></p>";
//recupera il n di col e righe della tabella
$nrighe = mysql_num_rows($recensioni);
$ncol = mysql_num_fields($recensioni);
echo "<table width=\"95%\" >";
echo "<tr><td><strong>Posizione</strong></td><td><strong>Voto Medio</strong></td><td><strong>Artista</strong></td><td><strong>Titolo</strong></td><td><strong>Genere</strong></td><td><strong>Link alla Recensione</strong></td></tr>";
for ($i=0;$i<$nrighe;$i++){
	echo "<tr>";
	$rec= mysql_fetch_array($recensioni);
	$k=$i+1;
	echo "<td><strong>".$k."</strong></td>";
	echo "<td>".$rec['avg']."</td>";
	echo "<td>".$rec['artista']."</td>";
	echo "<td>".$rec['titolo']."</td>";
	echo "<td>".$rec['genere']."</td>";
	echo "<td><a href=\"show_review.php?id_review=".$rec['id']."&".session_name()."=".session_id()."\">link...</a></td>";
	echo "</tr>";
}
echo "</table>";
echo "<h3>*Per votare &egrave; necessario registrarsi*</h3>";
//chiude la feature
echo "</div>";

//pulizia del buffer delle query del db server
mysql_free_result($recensioni);
include "navbar.php";
include "footer.php";
?> 
