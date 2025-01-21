<?php
/* 
Funzionamento: 
ci sono due bottoni.

Incremento: 
Quando l'utente cliccherà sul bottone per incrementare, il valore salvato nel cookie aumenterà di 1.
Se il cookie non esiste, viene creato e inizializzato a 1.

Reset del contatore: 
quando l'utente clicca sul bottone di reset, il cookie viene eliminato impostando una
scadenza passata (time()-3600).

Visualizzazione del conteggio:
se il cookie esiste, viene mostrato il numero di clic memorizzato.
se il cookie non esiste, viene mostrato un messaggio iniziale.
*/

//nome del cookie
$cookieName = "clickCounter";

//durata del cookie, es: 1 giorno
$cookieExpire = time() + 86400; //86400 secondi = 1 giorno

//Azione: incremento o reset
if(isset($_POST['increment'])){
    //se il cookie esiste, incrementa il valore nel cookie
    if(isset($_COOKIE[$cookieName])){
        $clicks = (int)$_COOKIE[$cookieName] + 1; //incrementa il valore della variabile clicks
    } else{
        //se il cookie non esiste, inizializza a 1
        $clicks = 1;
    }
    //aggiorna il valore del cookie
    setcookie($cookieName, $clicks, $cookieExpire);
    $message = "Hai cliccato ".$clicks." volte";
} elseif(isset($_POST['reset'])){
    //elimina il cookie
    setcookie($cookieName, "", time() - 3600); //tempo passato per eliminare
    $message = "Contatore resettato";
} else{
    $message = '';
    //messaggio iniziale o cookie non ancora settato
    if(isset($_COOKIE[$cookieName]))
        $message = "Hai cliccato ".$_COOKIE[$cookieName]." volte";
    else
        $message = "Non hai ancora cliccato sul pulsante";
}
?>
<html>
    <body>
        <h1>Gestione cookie</h1>
        <p><?php echo $message; ?></p>
        <form method="POST">
            <button type="submit" name="increment" style="color: green;">Clicca qui per incrementare</button>
            <button type="submit" name="reset" style="color: red;">Resetta il contatore</button>
        </form>    
    </body>
</html>