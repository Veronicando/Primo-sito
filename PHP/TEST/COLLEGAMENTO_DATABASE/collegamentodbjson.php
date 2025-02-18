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

// Crea un array per i dati
$persone = array();

// Verifica se ci sono dati
if ($result->num_rows > 0) {
    // Crea la tabella HTML
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Nome</th><th>Cognome</th><th>Codice Fiscale</th></tr>";

    // Stampa i dati in ogni riga della tabella
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["cognome"] . "</td>";
        echo "<td>" . $row["codice_fiscale"] . "</td>";
        echo "</tr>";
        $persone[] = $row;
    }
    echo "</table>";
} else {
    echo "Nessun dato trovato nella tabella.<br>";
}

// Converte l'array in JSON
$json_data = json_encode($persone, JSON_PRETTY_PRINT);

// Salva il JSON in un file
file_put_contents('persone.json', $json_data);

echo "File JSON generato con successo!";

// Leggi il file JSON
$jsonData = file_get_contents('persone.json');
$data = json_decode($jsonData, true); // Decodifica il JSON in un array associativo

// Preparare la query SQL per inserire i dati nel database
$stmt = $conn->prepare("INSERT INTO utenti (nome, cognome, codice_fiscale) VALUES (?, ?, ?)");
$stmt->bind_param('sss', $nome, $cognome, $codice_fiscale); // "ssi" indica che il primo e secondo parametro sono stringhe, il terzo è un intero

// Itera attraverso i dati e inseriscili nel database
foreach ($data as $user) {
    $nome = $user["nome"];
    $cognome = $user["cognome"];
    $codice_fiscale = $user["codice_fiscale"];  

    // Esegui la query di inserimento
    if ($stmt->execute()) {
        echo "Dati inseriti con successo: $nome, $cognome, $codice_fiscale\n";
    } else {
        echo "Errore nell'inserimento dei dati: " . $stmt->error . "\n";
    }
}

// Chiudi la connessione
$stmt->close();
$conn->close();
?>