<?php
// Parametri di connessione
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dati_utenti';
$table = 'utenti';

// Crea la connessione
$conn = new mysqli($host, $username, $password, $dbname);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Controlla se i dati sono stati inviati tramite il form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prendi i dati dal form
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $codice_fiscale = $_POST['codice_fiscale'];

    // Prepara la query per inserire i dati nella tabella
    $sql = "INSERT INTO $table (Nome, Cognome, Codice_fiscale) VALUES ('$nome', '$cognome', '$codice_fiscale')";

    // Esegui la query
    if ($conn->query($sql) === TRUE) {
        echo "Dati inseriti correttamente!<br>";
    } else {
        echo "Errore: " . $conn->error;
    }
}
?>

<!-- Form per l'inserimento dei dati -->
<h2>Inserisci i dati</h2>
<form method="post" action="">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" required><br><br>

    <label for="cognome">Cognome:</label>
    <input type="text" name="cognome" required><br><br>

    <label for="codice_fiscale">Codice Fiscale:</label>
    <input type="text" name="codice_fiscale" required><br><br>

    <input type="submit" value="Inserisci">
</form>

<?php
// Visualizza i dati della tabella
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Stampa i dati in una tabella HTML
    echo "<h3>Dati Inseriti:</h3>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Nome</th><th>Cognome</th><th>Codice Fiscale</th></tr>";
    
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