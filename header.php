<?php
//unica pagina con header differente è login.php
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
if (isset($dati['nome']) && isset($dati['cognome'])){
printf("<a href=\"panel.php?%s=%s\">Vai alla Pagina Personale</a> ::", session_name(), session_id());
printf(" <a href=\"logout.php?%s=%s\">Effettua LogOut...</a>", session_name(), session_id());
if ($dati['admin']=='y')printf(" :: <a href=\"admin.php?%s=%s\">Amministra il sito</a>", session_name(), session_id());
}
else echo "<a href=register.php>Registrati!</a>";
//chiude <div id="logBar">  
echo"</div>";
//include il file con i parametri di connessione al db server
include "db.php";
?>