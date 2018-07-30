<?php 
//chiude il <div id"content"> presente in header.php
echo "</div> <!--end content -->"; 
echo
"<div id=\"navBar\"> 
  <div id=\"login\"> 
    <form action=\"login.php\" method=\"POST\">
        <label>Login</label>         
		  <b>Nome Utente </b>
              <input name=\"user\" type=\"text\" size=\"8\">
              <br>
          <b>Password </b>
              <input name=\"passwd\" type=\"password\" size=\"8\" maxlength=\"8\">
              <br>
              <input name=\"goButton\" type=\"submit\" value=\"invia\">
    </form> 
  </div> 
  <div id=\"sectionLinks\"> 
    <ul>";

// sectionlinks vanno passati i dati di sessione!
printf("<li><a href=\"index.php?%s=%s\">Home Page</a></li>", session_name(), session_id());
printf("<li><a href=\"new_review.php?%s=%s\">Scrivi Nuova Recensione</a></li>", session_name(), session_id());
printf("<li><a href=\"arch.php?%s=%s\">Archivio Recensioni</a></li>", session_name(), session_id());
printf("<li><a href=\"ratings.php?%s=%s\">Classifica Album</a></li>", session_name(), session_id());
printf("<li><a href=\"rss.php\">RSS Feed <img src=\"images/xmlIcon.png\" border=\"0\"></a></li>"); 
echo"</ul> 
  </div>"; 

// recupera le ultime recensioni inserite
$sql="SELECT id,artista,titolo FROM `recensioni` ORDER BY id DESC LIMIT 0,5";

// solo se la query va a buon fine elenca le ultime recensioni inserite
if ($id_result=mysqli_query($conn, $sql)){
echo"
  <div class=\"relatedLinks\"> 
    <h3>Ultime Recensioni </h3> 
    <ul>"; 
//se servono solo id e titolo $ncol non serve ma utile se si vuole estendere anche a artista o altri campi
$nrighe = mysql_num_rows($id_result);
$ncol = mysql_num_fields($id_result);
for ($i=0;$i<$nrighe;$i++){
	$recensione = mysql_fetch_row($id_result);
		printf("<li><a href=\"show_review.php?id_review=%s&%s=%s\">%s :: %s</a></li>",$recensione[0],session_name(), session_id(),$recensione[1],$recensione[2]);
}
//pulisce il buffer delle query del db server
mysql_free_result($id_result);

echo"
	</ul> 
  </div>";
  
//chiude if mysql_query($sql, $conn)
}

// recupera le ultime recensioni inserite
$sql="SELECT id,artista,titolo FROM `recensioni` ORDER BY avg DESC LIMIT 0,5";

// solo se la query va a buon fine elenca le ultime recensioni inserite
if ($id_result=mysqli_query($conn, $sql)){
echo"
  <div class=\"relatedLinks\"> 
    <h3>Album meglio votati</h3> 
    <ul>"; 

//se servono solo id e titolo $ncol non serve ma utile se si vuole estendere anche a artista o altri campi
$nrighe = mysql_num_rows($id_result);
$ncol = mysql_num_fields($id_result);
for ($i=0;$i<$nrighe;$i++){
	$recensione = mysql_fetch_row($id_result);
		printf("<li><a href=\"show_review.php?id_review=%s&%s=%s\">%s :: %s</a></li>",$recensione[0],session_name(), session_id(),$recensione[1],$recensione[2]);
}
//pulisce il buffer delle query del db server
mysql_free_result($id_result);

echo"    </ul> 
<p> <a href=\"http://www.mozilla.org/products/firefox/\"
title=\"Get Firefox - Web Browsing Redefined\"><img
src=\"http://www.mozilla.org/products/firefox/buttons/firefox_80x15.png\"
width=\"80\" height=\"15\" border=\"0\" alt=\"Get Firefox\"></a></p><p></p>
  </div>";
//chiude if mysql_query($sql, $conn)
}  
echo "
</div> 
<!--end navBar div -->";

?>
