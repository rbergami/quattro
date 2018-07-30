<?php 
echo"<?xml version=\"1.0\"?>
<rss version=\"2.0\">\n";

//recupera la root del sito
$siteroot = "http://".$_SERVER['HTTP_HOST'];
echo"<channel> 
    <title>Quattro - Recensioni musicali</title>
    <link>$siteroot</link>
    <description>Recensioni musicali.</description>
    <language>it</language>";
echo"\n";
include "db.php";
$sql="SELECT id,artista,titolo,UNIX_TIMESTAMP(data) AS data,testo FROM `recensioni` ORDER BY id DESC LIMIT 0,5";
if (!$id_result = mysql_query($sql,$conn))die ("Impossibile connettersi al db server,riprovare.");

//definiamo quante righe ha sortito la query
$nrighe = mysql_num_rows($id_result);
for ($i=0;$i<$nrighe;$i++){
	$recensione = mysql_fetch_row($id_result);
		printf("<item>\n");
		printf("<title>%s - %s</title>\n",$recensione[1],$recensione[2]);
		printf("<link>%s/show_review.php?id_review=%s</link>\n",$siteroot,$recensione[0]);
		printf("<description>\n");
		//se la recensione è più lunga di 256 caratteri taglia		
		echo (strlen($recensione[4]) > 255)? substr($recensione[4], 0, 255)." ...": $recensione[4];

		printf(".\n</description>\n");
		printf("<pubDate>");
		echo date("r", $recensione[3]);
		printf("</pubDate>\n");
		printf("</item>\n");
}  

printf("</channel>\n");
printf("</rss>\n");
?>