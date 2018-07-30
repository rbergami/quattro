<?php 
session_start();
//se l'utente ha già effettuato login recupera i dati personali dell'utente nell'array $dati
if (isset($_SESSION['dati'])) $dati=$_SESSION['dati'];

include "header.php";
 
//se l'utente non risulta loggato non può scrivere la recensione
if (!isset($_SESSION['dati'])) echo "<div class=\"feature\"><p><h3>Solo gli utenti registrati possono scrivere nuove recensioni! </h3></p></div>";
else {
echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"new_review.js\"></script>
		<div class=\"feature\">";
echo "<p><h2>Nuova Recensione</h2></p>";
echo "<ul>
	<li>Inserire i dati della recensione <strong>evitando i caratteri tipici della tastiera italiana</strong>, questa limitazione è dovuta
	al fatto che i testi vengono utilizzati direttamente nei feed rss, i quali non supportano questo tipo di caratteri.<br>
	Ad esempio: usare u' invece di &ugrave.</li>
	<li>Viene richiesto di inserire una immagine della copertina dell'album, si pu&ograve caricare una immagine di 
	<strong>al massimo 100 Kbyte</strong> in formato png,jpeg,bmp,gif.</li>
	<li>Tutti i dati, eccetto l'immagine scelta sono modificabili successivamente.</li>
	</ul>";
printf("<form name=\"new_review\" method=\"post\" action=\"new_review_ok.php?%s=%s\" onsubmit=\"return controllo(this)\" enctype=\"multipart/form-data\">", session_name(), session_id());
//blocca la larghezza per evitare errori al ridimensionamento della finestra
echo "<table width=\"90%\" >
  <tr>
    <td><strong>Nome Artista:</strong></td>
    <td>
	<input name=\"artista\" type=\"text\" size=\"40\" maxlength=\"40\">
	</td>
  </tr>
  <tr>
    <td><strong>Nome Album:</strong></td>
    <td>
	<input name=\"titolo\" type=\"text\" size=\"40\" maxlength=\"40\">
	</td>  
  </tr>
  <tr>
    <td><strong>Anno di pubblicazione:</strong></td>
    <td>
	<input name=\"anno\" type=\"text\" size=\"4\" maxlength=\"4\">
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

echo"</select>
	</td>  
  </tr>
  <tr>
    <td><strong>Immagine: </strong></td>
    <td>
	<input type=\"file\" name=\"file\">
	</td>  
  </tr>
  <tr>
    <td><strong>Testo della Recensione:</strong></td>
    <td>";
echo "<textarea name=\"testo\" rows=\"10\" cols=\"30\"></textarea>
	</td>  
  </tr>
  <tr>
    <td></td>
    <td>
		<div align=\"right\">
        <input name=\"goButton\" type=\"submit\" value=\"invia\"></div>
	</td>  
  </tr>    
</table>
</form>
";
//chiude <div class="feature">
echo "</div>";
// chiude l'else del controllo login
};
include "navbar.php";
include "footer.php";
?> 