<?php 
// Verifica se la richiesta provenga effettivamente dal FORM
if ($_SERVER["REQUEST_METHOD"] == "GET") die("Non puoi accedere allo script direttamente!<br>");

//recupera i dati personali dell'utente nell'array $dati
if (isset($_SESSION['dati'])) $dati=$_SESSION['dati'];


include "header.php";

//apre la feature
echo "<div class=\"feature\">"; 

// FIX_ME Controllo se già presente il nome utente!
$query="INSERT INTO utenti (user, passwd, admin, nome,
	cognome, email) VALUES('".$_POST['user']."','".$_POST['passwd']."','n',
	'".$_POST['nome']."','"
	.$_POST['cognome']."','".$_POST['email']."')";


if (mysql_query($query, $conn)){

echo "<br><strong>Registrazione effettuata con successo!</strong>
		<p></p>Una email riepilogativa verr&agrave; è stata inviata all' indirizzo inserito durante la registrazione.";
//testo della email riepilogativa:
$testo="Registazione a \"QuAtTro - Recensioni musicali\" effettuata con successo\n I dati di login sono:\nNomeUtente: ".$_POST['user']."\nPassword: ".$_POST['passwd']."\nNome: ".$_POST['nome']."\nCognome: ".$_POST['cognome']."\n             Grazie!";

mail($_POST['email'],"Registrazione a QuAtTro",$testo,"Da register@quattro");
}
else echo "<p></p><h2>Errore!</h2> Nome utente gi&agrave; utilizzato da qualcuno o errore nella esecuzione della query \"$query\" reinserire i dati";


//chiude la feature
echo "</div>"; 
include "navbar.php";
include "footer.php";
?>
