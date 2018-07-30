<?php 
//avvio sessione
session_start();
//se l'utente ha già effettuato login recupera i dati personali dell'utente nell'array $dati
if (isset($_SESSION['dati'])) $dati=$_SESSION['dati'];
	else die ("Non sei loggato!");
include "header.php";
if ($dati['admin']!='y') die ("Non sei l'amministratore del sito!");
?>
<div class="feature">
<p></p>
<h2>Pagina di amministrazione del Sito</h2>
<?php
//se nessuna opzione...
if ( !isset($HTTP_GET_VARS['usercanc']) && !isset($HTTP_GET_VARS['usermod'])&& !isset($HTTP_POST_VARS['email'])){
	echo "<h3>Lista degli utenti</h3>";

	// recupera tutti gli utenti
	$sql="SELECT * FROM utenti";

	// solo se la query va a buon fine elenca gli utenti
	if ($id_result=mysql_query($sql, $conn)){

		//se servono solo id e titolo $ncol non serve ma utile se si vuole estendere anche a artista o altri campi
		$nrighe = mysql_num_rows($id_result);
		$ncol = mysql_num_fields($id_result);
		//costruiamo la tabella
		echo "<table width=\"95%\" >
			<tr>
		    <td><strong>User</strong></td>
		    <td><strong>Password</strong></td>
		    <td><strong>Admin Flag</strong></td>
		    <td><strong>Nome</strong></td>
		    <td><strong>Cognome</strong></td>
		    <td><strong>Email</strong></td>
			</tr>";
		for ($i=0;$i<$nrighe;$i++){
			echo "<tr>";
			$utente = mysql_fetch_row($id_result);
			for ($j=0;$j<$ncol;$j++){
				echo "<td>".$utente[$j]."</td>";
		}
		if ($utente[0]!=$dati['user']) echo "<td><a href=\"".$_SERVER['PHP_SELF']."?".session_name()."=".session_id()."&usercanc=".$utente[0]."\" onClick=\"return confirm('Sicuro di voler eliminare l\'utente ".$utente[3]." ".$utente[4]." ?');\">Cancella...</a></td>
		<td><a href=\"".$_SERVER['PHP_SELF']."?".session_name()."=".session_id()."&usermod=".$utente[0]."\">Modifica...</a></td>";
		echo "</tr>";
		}
		echo "</table>";
	}
	//pulisce il buffer delle query del db server
	mysql_free_result($id_result);



//chiude if iniziale
}

if (isset($HTTP_GET_VARS['usercanc'])){
	$sql="DELETE FROM utenti WHERE user='".$HTTP_GET_VARS['usercanc']."'";
	if (mysql_query($sql, $conn)) echo "<h3>Utente eliminato con successo.</h3>";
	else echo"<h3>Errore nella esecuzione della query</h3>";
//chiude if (isset($HTTP_GET_VARS['usercanc'])
}

if (isset($HTTP_GET_VARS['usermod'])){
	$sql="SELECT * FROM utenti WHERE user='".$HTTP_GET_VARS['usermod']."'";
	if (!($res=mysql_query($sql, $conn))) die ("<h3>Errore nella esecuzione della query</h3>");
	else $utente = mysql_fetch_array($res);
	
	//i dati vengono controllati anche questa volta da un javascript
	echo"
	<script language=\"JavaScript\" type=\"text/javascript\" src=\"panel_mod_others.js\"></script>
	
	<div class=\"feature\">
	<p></p>
	<h2>Modifica dei dati personali dell'utente <em>".$utente['user']."</em> : </h2>";
	echo "<p>";
	printf("<form name=\"panel_mod_others\" method=\"post\" action=\"".$_SERVER['PHP_SELF']."?%s=%s\" onsubmit=\"return controllo(this)\"><table>", session_name(), session_id());
	echo"	<tr>
			<td>
				<strong>Nome: </strong>
			</td>
			<td>";
			
	//di quale utente si tratta...
	echo "<input name=\"usermod\" type=\"hidden\" value=\"".$utente['user']."\">";
			
	printf("<input name=\"nome\" type=\"text\" value=\"%s\" size=\"16\" maxlength=\"16\">",$utente['nome']);
	echo "		</td>
		</tr>";
		
	echo"	<tr>
			<td>
				<strong>Cognome: </strong>
			</td>
			<td>";
	printf("<input name=\"cognome\" type=\"text\" value=\"%s\" size=\"16\" maxlength=\"16\">",$utente['cognome']);
	echo "		</td>
		</tr>";

/////admin flag radios////////////////////////////////////////
	echo"<tr>
			<td>
				<strong>Admin Flag: </strong>
			</td>
			<td>
	<input name=\"admin\" type=\"radio\" value=\"y\"";
if ($utente['admin']=='y') echo "checked";	
	echo"> yes<br>
	<input name=\"admin\" type=\"radio\" value=\"n\"";
if ($utente['admin']=='n') echo "checked";	
	echo"> no
	</td>
		</tr>";
///////////////////////////////////////////////////////////////

	echo"	<tr>
			<td>
				<strong>Indirizzo e-mail: </strong>
			</td>
			<td>";
	printf("<input name=\"email\" type=\"text\" value=\"%s\" size=\"36\" maxlength=\"36\">",$utente['email']);
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
	echo "</div>";
//chiude if (isset($HTTP_GET_VARS['usermod'])
}

//email per dire anche gli altri dati... 
if (isset($HTTP_POST_VARS['email'])){
	//aggiorna il database coi nuovi dati
	$sql="UPDATE utenti SET nome='".$HTTP_POST_VARS['nome']."', cognome='".$HTTP_POST_VARS['cognome'].
	"', email='".$HTTP_POST_VARS['email']."', admin='".$HTTP_POST_VARS['admin']."' WHERE user='".$HTTP_POST_VARS['usermod']."'";
	if (!$res = mysql_query($sql, $conn)) 
		echo "Errore nella esecuzione della query impossibile aggiornare i dati dell'utente<br>";
		//se invece la query va a buon fine...
	else {
		echo "<h3>Dati dell'utente <em>".$HTTP_POST_VARS['usermod']."</em> aggionati con successo!</h3>";
	}
//chiude if (isset($HTTP_POST_VARS['email'])
}
//chiude <div class="feature">
echo "</div>";

//div invio mail
echo "<div class=\"feature\"><p></p><h3>Invio email agli utenti</h3>";
echo "<table>
		<form name=\"email\" method=\"post\" action=\"admin_mail_ok.php?".session_name()."=".session_id()."\">
		<tr>			
			<td><strong>Testo:</strong><br><textarea name=\"testo\" rows=\"10\" cols=\"30\"></textarea></td>
			<td><strong>Oggetto:</strong><br><input name=\"subject\" type=\"text\" size=\"36\"><br><br>
			<strong>Destinatario/i:</strong><br>
			<select name=\"dest\"><option>TUTTI</option>";
//recupera la lista dei destinatari	
$query="SELECT email FROM utenti";
if (!$indirizzi = mysql_query($query, $conn)) die ("Impossibile connettersi al db server!"); 
for ($i=0;$i< mysql_num_rows($indirizzi);$i++){
	$ind=mysql_fetch_row($indirizzi);
	echo"<option>".$ind[0]."</option>";
};
echo"		</select>
			</td>		
		</tr>
		<tr>
		<td></td><td><div align=\"right\"><input type=\"submit\" value=\"Invia mail!\"></div></td>
		</tr>
		</form>
		</table>
		";
//chiude <div class="feature">
echo "</div>";

include "navbar.php";
include "footer.php";
?>