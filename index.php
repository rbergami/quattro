<?php 
session_start();
//se l'utente ha già effettuato login recupera i dati personali dell'utente nell'array $dati
if (isset($_SESSION['dati'])) $dati=$_SESSION['dati'];

include "header.php";
 

?> 
	<p></p><h2 id="pageName">Benvenuto 
<?php
if (isset($dati['nome']) && isset($dati['cognome'])) echo "<font color=#000000>".$dati['nome']." ".$dati['cognome']."</font> !";
else echo "<font color=#000000> Ospite </font> !";
?>
	</h2><br>
  <div class="feature"> 
    <img src="images/club.jpg" alt="Una immagine del club" width="140" height="160"> 
    <h3>Quattro :: Jazz Music Website</h3> 
    <p>
     Il nome di questo sito rende omaggio ad un club di Tokyo, il 
	 <a href="http://www.net-flyer.tv/quattro/index.cfm ">club quattro</a> specializzato 
	 nell' ospitare live performance di musicisti della scena acid-jazz. 
	 Su questo sito si raccolgono recensioni di album appartenenti a qualsiasi
	 genere dello stile musicale <strong>jazz</strong>. <br> 
    </p> 
  </div>
<div class="story"> 
    <h3>Perch&egrave; registrarsi?</h3> 
    <p>
	 Registrandosi si ottiene la possibilit&agrave; di inserire nuove
	 recensioni, votare gli album e commentare le recensioni scritte da altri utenti. <br>Gli utenti
	 ospiti possono comunque consultare i contenuti.
	</p>   
</div>
<div class="story">
    <h3>Requisiti per il Browser</h3> 
    <p>
	Per una corretta funzionalit&agrave; dei contenuti &egrave; necessario attivare i Javascript, 
	non &egrave; richiesto per&ograve; il supporto ai cookie. Visto il pesante uso di CSS &egrave;
	necessario un browser che li supporti per una corretta visualizzazione delle pagine.
	</p> 
</div>
<div class="story"> 
    <h3>Rss Newsfeed</h3> 
    <p>
     Questo sito ha un feed di notizie rss versione 2.0 raggiungibile dai link 
	 sulla barra laterale. Il nome <a href="http://blogs.law.harvard.edu/tech/rss">RSS</a>
	 sta per <strong>R</strong>eally <strong>S</strong>imple <strong>S</strong>yndication 
	 ed è un formato di diffusione di contenuti, utilizzato tipicamente da blog.
	 <br> In sostanza gli utenti di questo sito
	 possono leggere il newsfeed e rimanere sempre aggiornati sulle nuove recensioni senza
	 puntare il proprio browser a questo indirizzo.
	</p> 
    <p>
	Tra i lettori di feed si segnala 
	 <a href="http://www.feedreader.com/">Feedreader</a> per sistemi Windows o
	 <a href="http://liferea.sourceforge.net/">Liferea</a> per sistemi Linux ma entrambi
	 Open Source.<br><br>
	 <a href="http://feedvalidator.org"><img src="/images/valid-rss.png" border="0"></a> 
    </p> 
  </div> 

  
<?php 
include "navbar.php";
include "footer.php";
?>
