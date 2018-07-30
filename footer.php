<?php 

echo"<div id=\"siteInfo\"> 
Powered by:&nbsp;
<a href=\"http://www.php.net\"><img src=\"images/phppow.png\" border=\"0\" align=\"middle\">
</a> | <a href=\"http://www.mysql.org\"><img src=\"images/mysql.png\" border=\"0\" align=\"middle\">
</a> | <a href=\"http://www.apache.org\"><img src=\"images/apache.png\" border=\"0\" align=\"middle\">
</a> | <a href=\"mailto: rinaldo DOT bergamini (AT) studenti [DOT] unipr DOT it\">Contatta
</a> | &copy; 2004 Bergamini Rinaldo per Strumenti per Applicazioni Web
</div>"; 

//chiude la connessione al db server
mysql_close($conn);	
?>