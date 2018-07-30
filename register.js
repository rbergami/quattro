<!--

function controllo(registrazione) {

/* verifico lo username */
	if (document.registrazione.user.value == "") {
 		alert("E' obbligatorio inserire lo USERNAME nell'apposito campo");
		document.registrazione.user.focus();
		return false; }
	else {

/* il campo deve contenere solo caratteri alfabetici o spazi */
	invalidChars=":;.,?^*§-*_|@!£%&=\/<>$/";
	for (i=0 ; i<document.registrazione.user.value.length; i++) {
		for (j=0; j<invalidChars.length; j++) {
		if (document.registrazione.user.value.charAt(i)==invalidChars.charAt(j)){
			alert ("Caratteri non validi nel campo USERNAME");
			document.registrazione.user.focus();
			return false;
			}
                }
             }
	
	}
/* verifico la password */

	if (document.registrazione.passwd.value == "") {
 		alert("E' obbligatorio inserire la PASSWORD nell'apposito campo");
		document.registrazione.passwd.focus();
		return false; }
	else {

/* il campo deve contenere solo caratteri alfabetici o spazi */
	invalidChars=":;.,?^*§-*_|@!£%&=\/<>$/";
	for (i=0 ; i<document.registrazione.passwd.value.length; i++) {
		for (j=0; j<invalidChars.length; j++) {
		if (document.registrazione.passwd.value.charAt(i)==invalidChars.charAt(j)){
			alert ("Caratteri non validi nel campo PASSWORD");
			document.registrazione.passwd.focus();
			return false;
			}
                }
             }
	
	}
	
	if (document.registrazione.passwd.value != document.registrazione.passwd_retype.value) {
		alert ("Le PASSWORD non coincidono");
		document.registrazione.passwd_retype.focus ();
		return false;}
	
		

/* verifico la correttezza del nome */

/* il campo non deve essere vuoto */
	if (document.registrazione.nome.value == "") {
 		alert("E' obbligatorio inserire il NOME nell'apposito campo");
		document.registrazione.nome.focus();
		return false; }
	else {

/* il campo deve contenere solo caratteri alfabetici o spazi */
	invalidChars=":;.,?^*§-*_|@!£%&=1234567890\/<>$/";
	for (i=0 ; i<document.registrazione.nome.value.length; i++) {
		for (j=0; j<invalidChars.length; j++) {
		if (document.registrazione.nome.value.charAt(i)==invalidChars.charAt(j)){
			alert ("Caratteri non validi nel campo NOME");
			document.registrazione.nome.focus();
			return false;
			}
                }
             }
	
	}


/* verifico la correttezza del cognome */

/* il campo non deve essere vuoto */
	if (document.registrazione.cognome.value =="") {
 		alert("E' obbligatorio inserire il COGNOME nell'apposito campo");
		document.registrazione.cognome.focus();
		return false;}
	else {

/* il campo deve contenere solo caratteri alfabetici o spazi */
	invalidChars=":;.,?^*§-@*_|!£%&=1234567890\/<>$/";
	for (i=0 ; i<document.registrazione.cognome.value.length; i++) {
		for (j=0; j<invalidChars.length; j++) {
		if (document.registrazione.cognome.value.charAt(i)==invalidChars.charAt(j)){
			alert ("Caratteri non validi nel campo COGNOME");
			document.registrazione.cognome.focus();
			return false;
			}
                }
             }
	
	}

     /* verifico la correttezza dell'indirizzo e - mail */
	if (document.registrazione.email.value == "") {
		alert ("Il campo E-MAIL non deve essere vuoto");
		document.registrazione.email.focus ();
		return false; }
	else {
	n=0;
	for (i=0 ; i<document.registrazione.email.value.length; i++) {
	if (document.registrazione.email.value.charAt(i) == '@'){
	n++; }
	  }
	if (n!=1) {
	alert ("Indirizzo E-MAIL non valido");
	document.registrazione.email.focus();
	return false;
	}
	
	invalidChars=":;,?^*§-*_|!£%&=1234567890\/<>$/";
	for (i=0 ; i<document.registrazione.email.value.length; i++) {
		for (j=0; j<invalidChars.length; j++) {
		if (document.registrazione.email.value.charAt(i)==invalidChars.charAt(j)){
			alert ("Caratteri non validi nel campo E-MAIL");
			document.registrazione.email.focus();
			return false;
			}
                }
             }
	
	pos = document.registrazione.email.value.indexOf("@");
	if (pos<3) {
		alert ("Indirizzo E-MAIL non valido");
		document.registrazione.email.focus ();
		return false; }

	if (document.registrazione.email.value.indexOf(".",pos) == -1) {
		alert ("Indirizzo E-MAIL non valido");
		document.registrazione.email.focus ();
		return false; }
	

	}
     
return true;

	}


-->
