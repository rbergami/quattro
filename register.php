<?php 
include "header.php";
?>
<script language="JavaScript" type="text/javascript" src="register.js"></script>

<div class="feature"> 
<p></p>
<h2>Inserisci i tuoi dati personali.</h2><br>
Una email riepilogativa verr&agrave; inviata  al termine della registrazione all'indirizzo inserito.
<p></p>
I dati personali potranno essere modificati successivamente eccetto lo username che rimarr&agrave quello scelto
durante questa fase.<p></p>
<form name="registrazione" method="post" action="register_ok.php" onsubmit="return controllo(this)">
<table width="50%" >
  <tr>
    <td width="50%"><strong>UserName: </strong></td>
    <td><input name="user" type="text" size="8" maxlength="8"></td>
  </tr>
  <tr>
    <td><strong>Password: </strong></td>
    <td><input name="passwd" type="password" size="8" maxlength="8"></td>
  </tr>
  <tr>
    <td><strong>Riscrivere password: </strong></td>
    <td><input name="passwd_retype" type="password" size="8" maxlength="8"></td>
  </tr>
  <tr>
    <td><strong>Nome: </strong></td>
    <td><input name="nome" type="text" size="16" maxlength="16"></td>
  </tr>
  <tr>
    <td><strong>Cognome: </strong></td>
    <td><input name="cognome" type="text" size="16" maxlength="16"></td>
  </tr>
  <tr>
    <td><strong>Indirizzo e-mail: </strong></td>
    <td><input name="email" type="text" size="36" maxlength="60"></td>
  </tr>
  <tr>
    <td>
		<div align="left">
        <input type="reset" value="Cancella tutto" ></div>	
	</td>
    <td>
		<div align="right">
        <input type="submit" value="Invia" ></div>
    </td>
  </tr>  
</table>
</form>

</div>

<?php 
include "navbar.php";
include "footer.php";
?>
