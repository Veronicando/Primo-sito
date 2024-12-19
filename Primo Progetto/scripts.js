function mostramessaggio() {
					
    var fm = document.getElementById("femmina").value;
              var ms =	document.getElementById("maschio").value;
              var sesso = fm, ms;
      var message;
              
    if (sesso = fm) {
           message = "Grazie per aver intrapreso questo percorso";
        } else if (sesso = ms) {
            message = "Siamo spiacenti, questo percorso è riservato al genere femminile. Per perseguire la tua vocazione ti consigliamo di visitare il seguente link";
       }
      document.getElementById("message").innerText = message;
 }