<?php
// Parametri di connessione
$host = 'localhost'; // o l'IP del tuo server
$username = 'root';  // il tuo username MySQL
$password = '';      // la tua password MySQL
$dbname = 'dati_utenti'; // il nome del tuo database
$table = "utenti"; // Sostituisci con il nome della tua tabella

// Crea la connessione
$conn = new mysqli($host, $username, $password, $dbname);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
} else {
    echo "Connessione riuscita!<br><br>";
}

// Esegui la query per ottenere i dati dalla tabella
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

// Verifica se ci sono dati
if ($result->num_rows > 0) {
    // Crea la tabella HTML
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Nome</th><th>Cognome</th><th>Codice Fiscale</th></tr>";

    // Stampa i dati in ogni riga della tabella
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Nome"] . "</td>";
        echo "<td>" . $row["Cognome"] . "</td>";
        echo "<td>" . $row["Codice_fiscale"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nessun dato trovato nella tabella.<br>";
}

// Chiudi la connessione
$conn->close();
?>