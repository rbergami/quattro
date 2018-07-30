<!--

function controllo(new_review) {

/* verifico l'artista */
	if (document.new_review.artista.value == "") {
 		alert("E' obbligatorio inserire l'artista nell'apposito campo");
		document.new_review.artista.focus();
		return false; }
	else {

/* il campo deve contenere solo caratteri alfanumerici o spazi */
	invalidChars=":;.,?^*§-*_|@!Ј%&=\/<>$/щатийм";
	for (i=0 ; i<document.new_review.artista.value.length; i++) {
		for (j=0; j<invalidChars.length; j++) {
		if (document.new_review.artista.value.charAt(i)==invalidChars.charAt(j)){
			alert ("Caratteri non validi nel campo ARTISTA");
			document.new_review.artista.focus();
			return false;
			}
                }
             }
	
	}
/* verifico titolo */

	if (document.new_review.titolo.value == "") {
 		alert("E' obbligatorio inserire il TITOLO nell'apposito campo");
		document.new_review.titolo.focus();
		return false; }
	else {

/* il campo deve contenere solo caratteri alfanumerici o spazi */
	invalidChars=":;.,?^*§-*_|@!Ј%&=\/<>$/щатийм";
	for (i=0 ; i<document.new_review.titolo.value.length; i++) {
		for (j=0; j<invalidChars.length; j++) {
		if (document.new_review.titolo.value.charAt(i)==invalidChars.charAt(j)){
			alert ("Caratteri non validi nel campo TITOLO");
			document.new_review.titolo.focus();
			return false;
			}
                }
             }
	
	}

		

/* verifico l'anno di pubblicazione */
	if (document.new_review.anno.value == "") {
		alert ("E' obbligatorio inserire l'ANNO di pubblicazione nell'apposito campo ");
		document.new_review.anno.focus ();
		return false; }
	else {
	if (isNaN(document.new_review.anno.value)) {
		alert ("Bisogna inserire un numero nel campo ANNO");
		document.new_review.anno.focus ();
		return false; }
	if (document.new_review.anno.value < 1700) {
		alert ("ANNO di pubblicazione non accettabile")
		document.new_review.anno.focus ();
		return false }
	if (document.new_review.anno.value > 2004) {
		alert ("ANNO di pubblicazione non accettabile ...a meno che tu non preveda il futuro :-)")
		document.new_review.anno.focus ();
		return false }	
          }
 	

/* verifico la correttezza del testo */

/* il campo non deve essere vuoto */
	if (document.new_review.testo.value =="") {
 		alert("E' obbligatorio inserire il TESTO nell'apposito campo");
		document.new_review.testo.focus();
		return false;}
	else {

/* il campo deve contenere solo caratteri alfabetici o spazi */
	invalidChars="^*§-@*_|Ј%&\/<>$/щатийм";
	for (i=0 ; i<document.new_review.testo.value.length; i++) {
		for (j=0; j<invalidChars.length; j++) {
		if (document.new_review.testo.value.charAt(i)==invalidChars.charAt(j)){
			alert ("Caratteri non validi nel campo TESTO DELLA RECENSIONE");
			document.new_review.testo.focus();
			return false;
			}
                }
             }
	
	}

     
return true;

	}


-->
