<?php
include 'header.php';
?>

<div>
<?php
//Arrey utenti
$persona = ["marco@email.it","12345","Marco","Rossi"];


// Visualizza i dati della tabella

if (!empty($persona)) {// Stampa i dati in una tabella HTML
    echo "<h3>Dati Inseriti:</h3>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Nome</th><th>Cognome</th><th>Email</th></tr>";
    echo "<tr>";
    echo "<td>" . $persona[2] . "</td>";
    echo "<td>" . $persona[3] . "</td>";
    echo "<td>" . $persona[0] . "</td>";
    echo "</tr></table>";
    } else {
    echo "Nessun dato trovato nella tabella.<br>";
    }

?>
</div>


<?php
include 'footer.php';
?>