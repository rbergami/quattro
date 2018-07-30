<!--

function controllo(panel_mod_others) {
/* verifico la correttezza del nome */

/* il campo non deve essere vuoto */
	if (document.panel_mod_others.nome.value == "") {
 		alert("E' obbligatorio inserire il NOME nell'apposito campo");
		document.panel_mod_others.nome.focus();
		return false; }
	else {

/* il campo deve contenere solo caratteri alfabetici o spazi */
	invalidChars=":;.,?^*§-*_|@!£%&=1234567890\/<>$/";
	for (i=0 ; i<document.panel_mod_others.nome.value.length; i++) {
		for (j=0; j<invalidChars.length; j++) {
		if (document.panel_mod_others.nome.value.charAt(i)==invalidChars.charAt(j)){
			alert ("Caratteri non validi nel campo NOME");
			document.panel_mod_others.nome.focus();
			return false;
			}
                }
             }
	
	}


/* verifico la correttezza del cognome */

/* il campo non deve essere vuoto */
	if (document.panel_mod_others.cognome.value =="") {
 		alert("E' obbligatorio inserire il COGNOME nell'apposito campo");
		document.panel_mod_others.cognome.focus();
		return false;}
	else {

/* il campo deve contenere solo caratteri alfabetici o spazi */
	invalidChars=":;.,?^*§-@*_|!£%&=1234567890\/<>$/";
	for (i=0 ; i<document.panel_mod_others.cognome.value.length; i++) {
		for (j=0; j<invalidChars.length; j++) {
		if (document.panel_mod_others.cognome.value.charAt(i)==invalidChars.charAt(j)){
			alert ("Caratteri non validi nel campo COGNOME");
			document.panel_mod_others.cognome.focus();
			return false;
			}
                }
             }
	
	}

     /* verifico la correttezza dell'indirizzo e - mail */
	if (document.panel_mod_others.email.value == "") {
		alert ("Il campo E-MAIL non deve essere vuoto");
		document.panel_mod_others.email.focus ();
		return false; }
	else {
	n=0;
	for (i=0 ; i<document.panel_mod_others.email.value.length; i++) {
	if (document.panel_mod_others.email.value.charAt(i) == '@'){
	n++; }
	  }
	if (n!=1) {
	alert ("Indirizzo E-MAIL non valido");
	document.panel_mod_others.email.focus();
	return false;
	}
	
	invalidChars=":;,?^*§-*_|!£%&=1234567890\/<>$/";
	for (i=0 ; i<document.panel_mod_others.email.value.length; i++) {
		for (j=0; j<invalidChars.length; j++) {
		if (document.panel_mod_others.email.value.charAt(i)==invalidChars.charAt(j)){
			alert ("Caratteri non validi nel campo E-MAIL");
			document.panel_mod_others.email.focus();
			return false;
			}
                }
             }
	
	pos = document.panel_mod_others.email.value.indexOf("@");
	if (pos<3) {
		alert ("Indirizzo E-MAIL non valido");
		document.panel_mod_others.email.focus ();
		return false; }

	if (document.panel_mod_others.email.value.indexOf(".",pos) == -1) {
		alert ("Indirizzo E-MAIL non valido");
		document.panel_mod_others.email.focus ();
		return false; }
	

	}
     
return true;

	}


-->
