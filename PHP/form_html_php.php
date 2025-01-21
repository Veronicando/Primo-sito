<?php
if(!empty($_POST))
    echo "<h3>Il form è stato inviato</h3>";
$cookieName="numerodiclick";
$cookieExpire=time()+864000;

if(isset($_POST['Iscrizione'])){
    if(isset($_COOKIE[$cookieName])){
        $click=(int)$_COOKIE[$cookieName]
    }
}
?>
<html>
    <style>
        .errore{
            display: inline;
            color: orange;
        }
    </style>
    <body>
        <form action="http://localhost/test/formhtmlphp.php" method="POST">
                <span>Nome:</span>
                <input type="text" Name="Nome">
                <?php
                    if(isset($_POST['Nome'])&&($_POST['Nome'])=="")
                    echo '<span class="errore">Campo obbligatorio</span>';
                ?>
                <span>Cognome:</span>
                <input type="text" Name="Cognome"><br><br>
                <?php
                    if(isset($_POST['Cognome'])&&($_POST['Cognome'])=="")
                    echo '<span class="errore">Campo obbligatorio</span>';
                ?>
                <span>Indirizzo:</span>
                <input type="text" Name="Indirizzo">
                <?php
                    if(isset($_POST['Indirizzo'])&&($_POST['Indirizzo'])=="")
                    echo '<span class="errore">Campo obbligatorio</span>';
                ?>
                <span>Civico:</span>
                <input type="number&text" Name="Civico">
                <?php
                    if(isset($_POST['Civico'])&&($_POST['Civico'])=="")
                    echo '<span class="errore">Campo obbligatorio</span>';
                ?>
                <button type="submit" name='Iscrizione'>Iscriviti</button>
                <button type="submit" name='Disiscrizione'>Disiscriviti</button>
        </form>
    </body>
</html>