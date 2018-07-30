<?php 
//ripristina la sessione
session_start();

// Verifica se la richiesta provenga effettivamente dal FORM
if ($_SERVER["REQUEST_METHOD"] == "GET") die("<p>Non puoi accedere allo script direttamente!</p>");

//recupera i dati personali dell'utente nell'array $dati
if (isset($_SESSION['dati'])) $dati=$_SESSION['dati'];
//recuperiamo dal link la variabile che identifica la recensione da mostrare
$id_review=$HTTP_POST_VARS['id_review'];
include "header.php";

//apre la feature
echo "<div class=\"feature\">";

//verifichiamo che l'utente non abbia già votato l'album
$sql= "SELECT * FROM voti WHERE user='".$dati['user']."' AND id_review='".$HTTP_POST_VARS['id_review']."'";
if (!$already = mysql_query($sql, $conn)) die("Impossibile inserire il voto,riprovare.");
if (mysql_fetch_array($already)) echo "<h3>Hai già votato questo album!</h3> <a href=\"show_review.php?id_review=".$id_review."&".session_name()."=".session_id()."\">Torna alla recensione...</a>";
else {
$sql = "INSERT INTO `voti` ( `id_review` , `user` , `voto` ) VALUES ( '".$id_review."' , '".$dati['user']."' , '".$HTTP_POST_VARS['vote']."' )";
if (!mysql_query($sql, $conn)) die("Impossibile inserire il voto,riprovare.");
echo "<h3>Voto inserito con successo!</h3> <a href=\"show_review.php?id_review=".$id_review."&".session_name()."=".session_id()."\">Torna alla recensione...</a>";

//aggiorniamo la media dell'album
$sql="SELECT voto FROM voti WHERE id_review='".$id_review."'";
if (!$res = mysql_query($sql, $conn)) die("Impossibile calcolare la nuova media voto dell'album,riprovare.");
$nrighe = mysql_num_rows($res);
$sum=0;
for ($i=0;$i<$nrighe;$i++){
$votes = mysql_fetch_array($res);
$sum += $votes[0];
}
//calcola la nuova media
$new_avg=$sum/$nrighe+0.0;

//inserisce la nuova media:
$sql="UPDATE recensioni SET avg='".$new_avg."' WHERE id='".$id_review."'";
if (!mysql_query($sql, $conn)) die("Impossibile aggiornare la nuova media voto dell'album,riprovare.");


//chiude else per il quale ci sarà l'inserimento del voto 
}
//chiude la feature
echo "</div>"; 
include "navbar.php";
include "footer.php";
?>