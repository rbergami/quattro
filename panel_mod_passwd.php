<?php 
//avvio sessione
session_start();
//se l'utente ha già effettuato login recupera i dati personali dell'utente nell'array $dati
if (isset($_SESSION['dati'])) $dati=$_SESSION['dati'];
	else die ("Non sei loggato!");
include "header.php";
//i dati vengono controllati anche questa volta da un javascript
?>
<script language="JavaScript" type="text/javascript">
<!--

function controllo(registrazione) {
/* verifico la password */

	if (document.registrazione.passwd.value == "") {
 		alert("E' obbligatorio inserire la PASSWORD nell'apposito campo");
		document.registrazione.passwd.focus();
		return false; }
	else {

/* il campo deve contenere solo caratteri alfabetici o spazi */
	invalidChars=":;.,?^*§-*_|@!£%&=\/<>$/";
	for (i=0 ; i<document.registrazione.passwd.value.length; i++) {
		for (j=0; j<invalidChars.length; j++) {
		if (document.registrazione.passwd.value.charAt(i)==invalidChars.charAt(j)){
			alert ("Caratteri non validi nel campo PASSWORD");
			document.registrazione.passwd.focus();
			return false;
			}
                }
             }
	
	}
	
	if (document.registrazione.passwd.value != document.registrazione.passwd_retype.value) {
		alert ("Le PASSWORD non coincidono");
		document.registrazione.passwd_retype.focus ();
		return false;
		}

return true;

	}

-->
</script>

<div class="feature">
<p></p>
<h2>Modifica della password</h2>

<?php
echo "<p>";
printf("<form name=\"registrazione\" method=\"post\" action=\"panel_mod_passwd_ok.php?%s=%s\" onsubmit=\"return controllo(this)\"><table>", session_name(), session_id());
echo"	<tr>
			<td>
				<strong>Nuova Password: </strong>
			</td>
			<td>";
printf("<input name=\"passwd\" type=\"password\" size=\"8\" maxlength=\"8\">");
echo "		</td>
		</tr>";
echo"	<tr>
			<td>
				<strong>Riscrivere Nuova Password: </strong>
			</td>
			<td>";
printf("<input name=\"passwd_retype\" type=\"password\" size=\"8\" maxlength=\"8\">");
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
