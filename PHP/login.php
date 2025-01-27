<?php
/* 
simulare il processo di login, senza utilizzo di un database ma utilizzando i cookies.
1) Form con email e password e un campo submit.
2) Quando viene cliccato il submit, il risultato viene inviato ad una pagina php.
3) Lato php, controlliamo che username e password non siano vuoti, in tal caso stampiamo un messaggio di errore
4) Verifichiamo i dati ricevuti, se corrispondono o meno a dati presenti in questi array:
    $persona1 = array("marco@email.it","12345","Marco","Rossi");
    $persona2 = array("luigi@email.it","abcdef","Luigi","Bianchi");
    $persona3 = array("luca@email.it","123abc","Luca","Verdi");
    Dopodichè stamperemo "Bentornato " + nome e cognome e salveremo il cookie per ogni accesso successivo.
5) Se l'utente è loggato, mostreremo un pulsante "Disconnetti" che andrà ad eliminare il cookie.

Es 1:
l'utente inserisce questi valori:
email = luigi@email.it, password = abcdef.
La pagina mostrerà "Bentornato Luigi Bianchi" e creerà il cookie.

Es 2:
l'utente inserisce questi valori:
email = marco@email.it, password = abcdef. (NOTA CHE LA PASSWORD e' SBAGLIATA!)
La pagina mostrerà "Utente o password non validi".


*/
$persona1 = ["marco@email.it","12345","Marco","Rossi"];
$persona2 = ["luigi@email.it","abcdef","Luigi","Bianchi"];
$persona3 = ["luca@email.it","123abc","Luca","Verdi"];
$utenti= [$persona1,$persona2,$persona3];

if(isset($_POST["Login"])){
    if(isset($_POST['Email'])&&isset($_POST['Password'])){
        if(($_POST['Email'])==''&&($_POST['Password'])==''){
             echo 'Compila tutti i campi';
        }else{
            foreach($utenti as $utente){
                foreach($utente as $campo){
                    if((($_POST['Email'])&&($_POST['Password']))==$utente){
                      echo 'Bentornato '.$campo[2].' '.$campo[3].'.';
                    }  
                }
            }    
        }
    }
}    

?>
<html>
    <style>
        .errore{
            color: orange;
            display: inline;
        }
    </style>
    <body>
        <form action="http://localhost/test/login.php" method="POST">
            <span>Email:</span>
            <input type="email" name="Email">
            <?php
                if(isset($_POST['Email'])&&($_POST['Email']==''))
                echo '<span class="errore">Campo Obbligatorio</span>';
            ?>
            <span>Password:</span>
            <input type="password" name="Password">
            <?php
                if(isset($_POST['Password'])&&($_POST['Password']==''))
                echo '<span class="errore">Campo Obbligatorio</span>';
            ?>
            <button type="submit" name="Login">Login</button>
        </form>
    </body>
</html>

// chat version
<form action="login.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <input type="submit" value="Login">
</form>

<?php
// Dati dell'utente (array di esempio)
$persona1 = array("marco@email.it", "12345", "Marco", "Rossi");
$persona2 = array("luigi@email.it", "abcdef", "Luigi", "Bianchi");
$persona3 = array("luca@email.it", "123abc", "Luca", "Verdi");

// Verifica se l'utente è già loggato tramite cookie
if (isset($_COOKIE['user_email']) && isset($_COOKIE['user_name'])) {
    echo "Bentornato " . $_COOKIE['user_name'];
    echo "<br><a href='logout.php'>Disconnetti</a>";
    exit();
}

// Verifica se sono stati inviati i dati dal form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Controlliamo che email e password non siano vuoti
    if (empty($email) || empty($password)) {
        echo "Utente o password non validi.";
        exit();
    }

    // Verifica delle credenziali
    $found = false;
    $name = "";
    $surname = "";

    // Confrontiamo i dati inviati con i dati delle persone registrate
    $persone = [$persona1, $persona2, $persona3];
    foreach ($persone as $persona) {
        if ($persona[0] === $email && $persona[1] === $password) {
            $found = true;
            $name = $persona[2];
            $surname = $persona[3];
            break;
        }
    }

    // Se l'utente è trovato, creiamo il cookie e mostriamo il messaggio
    if ($found) {
        echo "Bentornato " . $name . " " . $surname;
        setcookie('user_email', $email, time() + 3600); // Il cookie dura 1 ora
        setcookie('user_name', $name . " " . $surname, time() + 3600);
        echo "<br><a href='logout.php'>Disconnetti</a>";
    } else {
        echo "Utente o password non validi.";
    }
}
?>

<?php
// Rimuoviamo i cookie
setcookie('user_email', '', time() - 3600);
setcookie('user_name', '', time() - 3600);

// Reindirizziamo alla pagina di login
header("Location: login_form.html");
exit();
?>

