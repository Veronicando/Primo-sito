<?php
// Parametri di connessione
$host = 'localhost'; // o l'IP del tuo server
$username = 'root';  // il tuo username MySQL
$password = '';      // la tua password MySQL
$dbname = 'dati_utenti'; // il nome del tuo database
// Nome della tabella da cui vuoi vedere la struttura
$table = "utenti"; // Sostituisci con il nome della tua tabella

// Crea la connessione
$conn = new mysqli($host, $username, $password, $dbname);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
} else {
echo "Connessione riuscita!";
}

// Esegui la query per ottenere tutte le tabelle
$sql = "SHOW TABLES";
$result = $conn->query($sql);

// Verifica se ci sono tabelle
if ($result->num_rows > 0) {
    // Stampa le tabelle
    echo "Tabelle nel database '$dbname':<br>";
    while($row = $result->fetch_assoc()) {
        echo $row["Tables_in_$dbname"] . "<br>"; // Mostra il nome di ogni tabella
    }
} else {
    echo "Nessuna tabella trovata.";
}

// Esegui la query per ottenere la struttura della tabella
$sql = "DESCRIBE $table";
$result = $conn->query($sql);

// Verifica se la tabella esiste
if ($result->num_rows > 0) {
    // Stampa la struttura della tabella
    echo "Struttura della tabella '$table':<br>";
    while($row = $result->fetch_assoc()) {
        echo "Colonna: " . $row["Field"] . " - Tipo: " . $row["Type"] . "<br>";
    }
} else {
    echo "Tabella non trovata.";
}

// Esegui la query per ottenere i dati dalla tabella
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

// Verifica se ci sono dati
if ($result->num_rows > 0) {
    echo "Dati nella tabella '$table':<br>";
    // Stampa i dati
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["ID"] . " - Nome: " . $row["Nome"] . " - Cognome: " . $row["Cognome"] . " - Codice Fiscale: " . $row["Codice_fiscale"] . "<br>";
    }
} else {
    echo "Nessun dato trovato nella tabella.<br>";
}

// Chiudi la connessione
$conn->close();
?>