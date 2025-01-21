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
$utenti= [$persona1,$persona2,$persona3];
$persona1 = ["marco@email.it","12345","Marco","Rossi"];
$persona2 = ["luigi@email.it","abcdef","Luigi","Bianchi"];
$persona3 = ["luca@email.it","123abc","Luca","Verdi"];
$message= "";
foreach($utenti as $utente){
    if(isset($_POST["Login"])){
        if(isset($_POST['Email'])&&($_POST['Password']==$utente)){
        $message= "Bentornato ".$utente[2]." ".$utente[3].;
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
