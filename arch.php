<?php 
session_start();
//se l'utente ha già effettuato login recupera i dati personali dell'utente nell'array $dati
if (isset($_SESSION['dati'])) $dati=$_SESSION['dati'];
include "header.php";

// di default ordina per id della recensione
if (!isset($HTTP_GET_VARS['mode'])) $mode="id";
else $mode=$HTTP_GET_VARS['mode'];

// recupera TUTTE le recensioni inserite
$sql="SELECT id,artista,titolo,genere FROM `recensioni` ORDER BY ".$mode." DESC";
if (!$recensioni=mysql_query($sql, $conn)) die("Impossibile connettersi al db server!");


echo "<p></p><div class=\"feature\">
		<h2>Archivio Recensioni</h2>
		<h3>Ordina per: | 
			<a href=\"".$_SERVER['PHP_SELF']."?".session_name()."=".session_id()."&mode=id\">Pi&ugrave recente</a> | 
			<a href=\"".$_SERVER['PHP_SELF']."?".session_name()."=".session_id()."&mode=artista\">Artista</a> |
			<a href=\"".$_SERVER['PHP_SELF']."?".session_name()."=".session_id()."&mode=titolo\">Titolo</a> |
			<a href=\"".$_SERVER['PHP_SELF']."?".session_name()."=".session_id()."&mode=genere\">Genere</a> |
	  	</h3><p></p><p></p>";
//recupera il n di col e righe della tabella
$nrighe = mysql_num_rows($recensioni);
$ncol = mysql_num_fields($recensioni);
echo "<table width=\"95%\" >";
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

//chiude la feature
echo "</div>";

// Box di ricerca:

echo "<p></p><div class=\"feature\">
		<h2>Cerca Recensione</h2>		
		<p>Inserire una parola chiave per artista o album.</p>
		<table>
		<form name=\"search\" method=\"post\" action=\"search_ok.php?".session_name()."=".session_id()."\">
		<tr>
			<td><input name=\"keyword\" type=\"text\" size=\"10\"></td>
			<td><input name=\"kind\" type=\"radio\" value=\"titolo\">titolo<br>
			<input name=\"kind\" type=\"radio\" value=\"artista\" checked >artista</td>		
		</tr>
		<tr>
		<td></td><td><input type=\"submit\" value=\"Cerca!\"></td>
		</tr>
		</form>
		</table>
		";
//chiude la feature
echo "</div>";

//pulizia del buffer delle query del db server
mysql_free_result($recensioni);
include "navbar.php";
include "footer.php";
?> 
