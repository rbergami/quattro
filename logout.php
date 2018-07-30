<?php 
//se l'utente è loggato ripristina la sessione
session_start();
//solo se l'utente ha già effettuato login
if (!isset($_SESSION['dati'])) die ("Non &egrave; possibile effettuare logout ad un Ospite!");

include "header.php";

//rimuove tutte le variabili dalla sessione
session_unset();
//distruggiamo la sessione
session_destroy();
?>
<div class="feature">
<p>Logout effettuato con successo.</p>
<p><center><h2>Arrivederci!</h2></center> </p>
<p></p>
<p><a href=index.php>Torna alla homepage di QuAtTrO </a>in veste di ospite.</p>
</div>

<?php 
include "navbar.php";
include "footer.php";
?>