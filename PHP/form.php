<?php
var_dump($_POST);

if ($_POST['Nome']||['Cognome']=="")
    echo "<br>Completa tutti i campi";
else
    echo "Grazie per la richiesta di iscrizione, riceverai al più presto un email di conferma";
?>