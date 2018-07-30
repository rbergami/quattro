<?php 
function  RandomFile($pass_len=12) {
                  //caratteri consentiti
                  $allchar = "abcdefghijklmnopqrstuvwxyz" ;
                  //la stringa parte nulla
				  $str = "" ;
                  mt_srand (( double) microtime() * 1000000 );
                  for ( $i = 0; $i<$pass_len ; $i++ )
                  //è stata usata mt_rand perchè raccomandata e migliore di rand()
				  $str .= substr( $allchar, mt_rand (0,25), 1 ) ;
                  return $str ;
        }

//ripristina la sessione
session_start();

// Verifica se la richiesta provenga effettivamente dal FORM
if ($_SERVER["REQUEST_METHOD"] == "GET") die("<p>Non puoi accedere allo script direttamente!</p>");

//recupera i dati personali dell'utente nell'array $dati
if (isset($_SESSION['dati'])) $dati=$_SESSION['dati'];

include "header.php";

//apre la feature
echo "<div class=\"feature\">";

  if (!is_uploaded_file($HTTP_POST_FILES['file']['tmp_name'])) {
    $error = "Non hai uploadato l'immagine!";
    //unlink($HTTP_POST_FILES['file']['tmp_name']);
  } else {
//Da qui sicuramente un file è stato uploadato
    //massima filesize
	$maxfilesize=102400;
//iniziano i controlli
    if ($HTTP_POST_FILES['file']['size'] > $maxfilesize) {
      $error = "L'immagine caricata è troppo grande!";
      unlink($HTTP_POST_FILES['file']['tmp_name']);
      // assign error message, remove uploaded file, redisplay form.
    } else {
      //l'immagine deve essere di un tipo immagine
	  if ($HTTP_POST_FILES['file']['type'] != "image/png" AND $HTTP_POST_FILES['file']['type'] != "image/jpeg" AND $HTTP_POST_FILES['file']['type'] != "image/pjpeg"
	  		AND $HTTP_POST_FILES['file']['type'] != "image/gif" AND $HTTP_POST_FILES['file']['type'] != "image/bmp") {
        $error = "Va caricata una immagine, non altri tipi di file!";
		//non serve quindi lo libera
        unlink($HTTP_POST_FILES['file']['tmp_name']);
      } else {

//Il file ha superato tutti i controlli, è valido
//Va copiato a destinazione

//il nome viene determinato casualmente dalla funzione all'inizio dello script
$name=RandomFile();
//l'estensione dipende dal file uploadato 
switch($HTTP_POST_FILES['file']["type"]) {
      
       case 'image/gif';
       $ext="gif";
       break;
       
        case 'image/jpeg';
       $ext="jpg";
       break;
       
        case 'image/pjpeg';
       $ext="jpg";
       break;
       
        case 'image/png';
       $ext="png";
       break;
     
        case 'image/bmp';
       $ext="bmp";
       break;
     } 
       //salva il nome comelink da inserire nella recensione alla visualizzazione
	   $img_url="http://".$_SERVER['HTTP_HOST']."/uploads/".$name.".".$ext; // /progetti/quattro FIX_ME
	   copy($HTTP_POST_FILES['file']['tmp_name'],$_SERVER['DOCUMENT_ROOT']."/uploads/".$name.".".$ext); // /progetti/quattro FIX_ME
       unlink($HTTP_POST_FILES['file']['tmp_name']);
     }
    }
  }
//se nessun errore sul file uploadato....
if (!isset($error)){
//query per inserire la recensione
//strip_tags() toglie tag php e html che potrebbero causare problemi se inseriti malintenzionatamente da utenti
//addslashes() risolve il problema di mysql \'
$sql = "INSERT INTO `recensioni` ( `id` , `user` , `artista` , `titolo` , `data` , `anno` , `img_url` , `testo` , `genere`) VALUES ( '','".$dati['user']."','".$HTTP_POST_VARS['artista']."','".$HTTP_POST_VARS['titolo']."', NOW() ,'".$HTTP_POST_VARS['anno']."','".$img_url."','".strip_tags(addslashes($HTTP_POST_VARS['testo']))."','".$HTTP_POST_VARS['genere']."' )";
if ($upd=mysql_query($sql, $conn)){
echo "<p><h2>Nuova recensione inserita con successo.</h2></p>";
mysql_free_result($upd);
}
else echo "<p><h2>Errore! Impossibile eseguire la query.</h2></p>";
//chiude if no error:
} else echo "<p><h3>$error</h3></p>";
//chiude la feature
echo "</div>"; 

include "navbar.php";
include "footer.php";
?>