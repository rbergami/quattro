<?php 
session_start();
//se l'utente ha già effettuato login recupera i dati personali dell'utente nell'array $dati
if (isset($_SESSION['dati'])) $dati=$_SESSION['dati'];

include "header.php";

//recuperiamo dal link la variabile che identifica la recensione da mostrare
$id_review=$HTTP_GET_VARS['id_review'];

//recupera i dati sulla recensione
$sql="SELECT * FROM recensioni WHERE id=".$id_review;

//controlla la corretta esecuzione della query
if (!$res=mysql_query($sql, $conn)) die("<br>Errore esecuzione query!");
//recupera in un arrray associativo i dati della recensione
$recensione = mysql_fetch_array($res);

 
//se l'utente non è chi ha scritto la recensione o un admin è un malintenzionato
if (!(($recensione['user']==$dati['user']) or ($dati['admin']== 'y' ))) echo "<div class=\"feature\"><p><h1>Ti &egrave impossibile accedere a questa pagina, piantala non hai i privilegi!</h1> </p></div>";
else {
echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"new_review.js\"></script>
		<div class=\"feature\">";
echo "<p><h2>Modifica Recensione</h2></p>";
echo "<ul>
	<li>Inserire i dati della recensione <strong>evitando i caratteri tipici della tastiera italiana</strong>, questa limitazione è dovuta
	al fatto che i testi vengono utilizzati direttamente nei feed rss, i quali non supportano questo tipo di caratteri.<br>
	Ad esempio: usare u' invece di &ugrave.</li>
	<li>L'immagine scelta inizialmente non &egrave pi&ugrave modificabile.</li>
	</ul>";
printf("<form name=\"new_review\" method=\"post\" action=\"mod_review_ok.php?%s=%s\" onsubmit=\"return controllo(this)\" enctype=\"multipart/form-data\">", session_name(), session_id());
//blocca la larghezza per evitare errori al ridimensionamento della finestra
echo "<table width=\"90%\" >
  <tr>
    <td><strong>Nome Artista:</strong></td>
    <td>
	<input name=\"artista\" type=\"text\" size=\"40\" maxlength=\"40\" value=\"".$recensione['artista']."\">
	</td>
  </tr>
  <tr>
    <td><strong>Nome Album:</strong></td>
    <td>
	<input name=\"titolo\" type=\"text\" size=\"40\" maxlength=\"40\" value=\"".$recensione['titolo']."\">
	</td>  
  </tr>
  <tr>
    <td><strong>Anno di pubblicazione:</strong></td>
    <td>
	<input name=\"anno\" type=\"text\" size=\"4\" maxlength=\"4\" value=\"".$recensione['anno']."\">
	</td>  
  </tr>
  <tr>
    <td><strong>Genere:</strong></td>
    <td>
	<select name=\"genere\">";	
echo "<option>vocal-jazz</option>";
echo "<option>swing-jazz</option>";
echo "<option>traditional-jazz</option>";
echo "<option>modal-jazz</option>";
echo "<option>jazz-funk</option>";
echo "<option>smooth-jazz</option>";
echo "<option>acid-jazz</option>";
echo "<option>soul-jazz</option>";
echo "<option>fusion</option>";
echo "<option>blues-jazz</option>";
echo "<option>free-jazz</option>";
echo "<option>standard-jazz</option>";
echo "<option>dancefloor-jazz</option>";
echo "<option>groove</option>";
echo "<option>caribbean-jazz</option>";
echo "<option>bossa-nova</option>";
echo "</select>
	</td>  
  </tr>

  <tr>
    <td><strong>Testo della Recensione:</strong></td>
    <td>";
echo "<textarea name=\"testo\" rows=\"10\" cols=\"30\">".$recensione['testo']."</textarea>
	</td>  
  </tr>
  <tr>
    <td></td>
    <td>
		<div align=\"right\">
        <input name=\"goButton\" type=\"submit\" value=\"Aggiorna\"></div>
	</td>  
  </tr>
  		<input name=\"id_review\" type=\"hidden\" value=\"".$id_review."\"> 
</table>
</form>
";

//pulisce il buffer delle query del db server
mysql_free_result($res);

//chiude <div class="feature">
echo "</div>";
// chiude l'else del controllo login
};
include "navbar.php";
include "footer.php";
?> 