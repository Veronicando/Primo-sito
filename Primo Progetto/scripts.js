function mostramessaggio() {
  var fm = document.getElementById("femmina").value
  var ms = document.getElementById("maschio").value
  var sessoval = document.getElementById("sesso").value
  var link = document.getElementById("myLink").href
  let message

  if (sessoval == fm) {
    message = "Grazie per aver intrapreso questo percorso"
  } else if (sessoval == ms) {
    message =
      "Siamo spiacenti, questo percorso è riservato al genere femminile. Per perseguire la tua vocazione ti consigliamo di visitare il seguente link" +
      link
  }
  document.getElementById("message").innerText = message
}