<?php 
//avvio sessione
session_start();
//se l'utente ha già effettuato login recupera i dati personali dell'utente nell'array $dati
if (isset($_SESSION['dati'])) $dati=$_SESSION['dati'];
	else die ("Non sei loggato!");
include "header.php";
//i dati vengono controllati anche questa volta da un javascript
echo"
<script language=\"JavaScript\" type=\"text/javascript\" src=\"panel_mod_others.js\"></script>

<div class=\"feature\">
<p></p>
<h2>Modifica dei dati personali</h2>";

echo "<p>";
printf("<form name=\"panel_mod_others\" method=\"post\" action=\"panel_mod_others_ok.php?%s=%s\" onsubmit=\"return controllo(this)\"><table>", session_name(), session_id());
echo"	<tr>
			<td>
				<strong>Nome: </strong>
			</td>
			<td>";
printf("<input name=\"nome\" type=\"text\" value=\"%s\" size=\"16\" maxlength=\"16\">",$dati['nome']);
echo "		</td>
		</tr>";
		
echo"	<tr>
			<td>
				<strong>Cognome: </strong>
			</td>
			<td>";
printf("<input name=\"cognome\" type=\"text\" value=\"%s\" size=\"16\" maxlength=\"16\">",$dati['cognome']);
echo "		</td>
		</tr>";

echo"	<tr>
			<td>
				<strong>Indirizzo e-mail: </strong>
			</td>
			<td>";
printf("<input name=\"email\" type=\"text\" value=\"%s\" size=\"36\" maxlength=\"36\">",$dati['email']);
echo "		</td>
		</tr>
  <tr>
    <td>
		<div align=\"left\">
        <input type=\"reset\" value=\"Cancella tutto\" ></div>	
	</td>
    <td>
		<div align=\"right\">
        <input type=\"submit\" value=\"Invia\" ></div>
    </td>
  </tr> "; 
				
echo "</table></form></p>";

//chiude <div class="feature">
echo "</div>";
include "navbar.php";
include "footer.php";
?>
