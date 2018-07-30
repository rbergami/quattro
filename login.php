<?php 
//avvia la sessione
session_start();
include "db.php";
?>
<?php
//unica pagina con HEADER differente!
echo "
<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\"http://www.w3.org/TR/html4/loose.dtd\">
<html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
<title>QuAtTrO - Recensioni Musicali Jazz e Modern Jazz</title>
<!--  importa css
	<link rel=\"stylesheet\" href=\"2col_rightNav.css\" type=\"text/css\"> -->
<style type=\"text/css\">
@import url(quattro.css);
</style>
</head>

<body> 
<div id=\"masthead\"> 
  <h1 id=\"siteName\"></h1> 
</div> 
<!-- end masthead -->";
echo "<div id=\"content\"><div id=\"logBar\">";

//differenza rispetto header.php
printf("<a href=\"panel.php?%s=%s\">Vai alla Pagina Personale</a> ::", session_name(), session_id());
printf("<a href=\"logout.php?%s=%s\"> Effettua LogOut...</a>", session_name(), session_id());
//chiude <div id="logBar">  
echo"</div>";
?>
<?php

// Verifica se la richiesta provenga effettivamente dal FORM
if ($_SERVER["REQUEST_METHOD"] == "GET") die("Non puoi accedere allo script direttamente!");

// seleziona il nome utente dal form per recuperarne i dati
$userforquery=$_POST['user'];
$query="SELECT * FROM utenti WHERE user='$userforquery'";
if ($res = mysql_query($query, $conn)); 
else echo "Errore nella esecuzione della query \"$query\"";
//recupera i dati memorizzati dell'utente in un array associativo
$user_stored_data = mysql_fetch_array($res);

//se la password non corrisponde...
if (strcmp($_POST['passwd'], $user_stored_data['passwd'])){ 
	echo "<div class=\"feature\">";
	echo "<h3><strong>Nome utente o password errati</strong>, ripetere l'operazione.</h3>";
	//chiude <div class=feature>
	echo "</div>";
	}
//se corrisponde invece...
else{

//inserimento dati utente nella sessione corrente
$_SESSION['dati']=$user_stored_data;
echo "<div class=\"feature\">"; 
echo "<h3>Login effettuato con successo!</h3>";
printf("<ul><li><a href=\"index.php?%s=%s\">Torna alla home page</a></li>\n", session_name(), session_id());
printf("<li><a href=\"panel.php?%s=%s\">Vai alla pagina personale</a></li>\n", session_name(), session_id());
if ($user_stored_data['admin']=='y')printf("<li><a href=\"admin.php?%s=%s\">Amministra il sito</a></li></ul>", session_name(), session_id());
//chiude <div class=feature>
echo "</div>"; 
}

//pulisce il buffer del db server
mysql_free_result($res);

include "navbar.php";
include "footer.php";
?>
</body>
</html>
