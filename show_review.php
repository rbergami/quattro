<?php 
session_start();
//se l'utente ha già effettuato login recupera i dati personali dell'utente nell'array $dati
if (isset($_SESSION['dati'])) $dati=$_SESSION['dati'];

//recuperiamo dal link la variabile che identifica la recensione da mostrare
$id_review=$HTTP_GET_VARS['id_review'];
include "header.php";
echo $id_review;
//recupera i dati sulla recensione
$sql="SELECT * FROM recensioni WHERE id=".$id_review;
echo $sql;

//controlla la corretta esecuzione della query
if (!$res=mysql_query($sql, $conn)) die("<br>Errore esecuzione query!");
//recupera in un arrray associativo i dati della recensione
$recensione = mysql_fetch_array($res);

//inizia il div della recensione
echo "<div class=\"review\">";

printf("<p></p><h3>%s",$recensione['titolo']);
echo " - ";
printf("%s</h3>",$recensione['artista']);
printf("<p><center><em>Recensione di: <strong>%s</strong></em></center></p>",$recensione['user']);
echo"<p><center><em>Genere: <strong>".$recensione['genere']."</strong></em></p></center>";
echo"<p><center><em>Anno di pubblicazione: <strong>".$recensione['anno']."</strong></em></p></center>";

//se l'utente è amministratore o l'autore della recensione mostra opzioni MODIFICA e CANCELLA
//il primo if serve ad evitare il warning se la var $dati non è definita
if (isset($dati)) if (($recensione['user']==$dati['user']) or ($dati['admin']== 'y' ) ){
echo "<p><center><h2><a href=\"mod_review.php?".session_name()."=".session_id()."&mod=0&id_review=".$id_review."\" onClick=\"return confirm('Sicuro di voler modificare la recensione?');\" >Modifica...
</a> :: <a href=\"canc_review_ok.php?".session_name()."=".session_id()."&mod=1&id_review=".$id_review."\" onClick=\"return confirm('Cancellando la recensione eliminerai ANCHE I COMMENTI ASSOCIATI. Sei sicuro?');\" >Cancella...</a></h2></center></p>";
}
printf("<p><center><img src=\"%s\"></center></p>", $recensione['img_url']);
echo "<p>".$recensione['testo']."</p>";
//chiude <div class="review">
echo "</div>";

//pulisce il buffer delle query del db server
$recensione=mysql_free_result($res);
//commenti
echo "<div class=\"feature\">
			<h3>Commenti:</h3>";
			
// recupera i commenti
$sql="SELECT user, UNIX_TIMESTAMP(data) AS data , testo FROM commenti WHERE id_review=".$id_review." ORDER BY data ASC";
// solo se la query va a buon fine elenca le ultime recensioni inserite
if ($comm=mysql_query($sql, $conn)){
//recupera il numero di commenti
$nrighe = mysql_num_rows($comm);
echo "<ul>";
for ($i=0;$i<$nrighe;$i++){
	$commento = mysql_fetch_array($comm);
		echo"<li><strong>Inserito da <em>".$commento['user']."</em> il ".date ("F j, Y, g:i a", $commento['data'])." :</strong>";
		printf("<p>%s</p>",$commento['testo']);
		echo"</li>";
}
//chiude la lista dei commenti
echo "</ul>";

//chiude if mysql_query($sql, $conn)
}

//chiude la feature
echo "</div>";

//form di inserimento commento (solo se loggati)
if (isset($dati['nome'])){
echo "<div class=\"feature\">
			<h3>Inserisci nuovo commento:</h3>";
printf("<form name=\"new_comment\" method=\"post\" action=\"new_comment_ok.php?%s=%s\">", session_name(), session_id());
echo "<table width=\"90%\" >
  <tr>
    <td><strong>Testo:</strong></td>
    <td>
	<textarea name=\"testo\" rows=\"5\" cols=\"30\"></textarea>	</td>
  </tr>
  <tr>
    <td></td>
    <td>
		<div align=\"right\">
        <input name=\"goButton\" type=\"submit\" value=\"invia\"></div>
	</td>  
  </tr>   
		<input type=\"hidden\" name=\"id_review\" value=".$id_review.">";
echo "</table>
</form>";

//pulisce il buffer delle query del db server
mysql_free_result($comm);

//chiude la feature
echo "</div>";				
} else echo"<div class=\"feature\"><h3>*Per inserire un commento devi essere un utente registrato!*</h3></div>";

//form di voto album (solo se loggati)
if (isset($dati['nome'])){
echo "<div class=\"feature\">
			<h3>Vota l'album:</h3>";
printf("<div align=\"center\"><form name=\"new_vote\" method=\"post\" action=\"new_vote_ok.php?%s=%s\">", session_name(), session_id());
echo "	
		<table>
		<tr><td>
		<input type=\"radio\" name=\"vote\" value=\"1\"> 1
		<input type=\"radio\" name=\"vote\" value=\"2\"> 2
		<input type=\"radio\" name=\"vote\" value=\"3\"> 3		
		<input type=\"radio\" name=\"vote\" value=\"4\"> 4		
		<input type=\"radio\" name=\"vote\" value=\"5\"> 5		
		<input type=\"radio\" name=\"vote\" value=\"6\" checked > 6		
		<input type=\"radio\" name=\"vote\" value=\"7\"> 7		
		<input type=\"radio\" name=\"vote\" value=\"8\"> 8		
		<input type=\"radio\" name=\"vote\" value=\"9\"> 9		
		<input type=\"radio\" name=\"vote\" value=\"10\"> 10		
		</td></tr>
		<tr><td>
		<input type=\"hidden\" name=\"id_review\" value=".$id_review.">
        <div align=\"right\"><input name=\"goButton\" type=\"submit\" value=\"Vota!\"></div>
		</td></tr>
		</table>
		</form></div>";


//chiude la feature
echo "<p></p></div>";				
} else echo"<div class=\"feature\"><h3>*Per votare l'album devi essere un utente registrato!*</h3></div>";



include "navbar.php";
include "footer.php";
?> 
