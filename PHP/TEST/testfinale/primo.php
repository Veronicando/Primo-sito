<?php
echo "Ecco i numeri da 1 a 10:"."<br>";
for($i=1;$i<=10;$i=$i+1){
    echo $i." ";
}
echo "<br>"."<br>";

echo "Ora vediamo la tabellina del 5:"."<br>";
for($i=5;$i<=50;$i=$i+5){
     echo $i." ";
}
echo "<br>"."<br>";

$persona1 = ["marco@email.it","12345","Marco","Rossi"];

if(isset($_POST["Login"])){
    if(isset($_POST['Email'])&&isset($_POST['Password'])){
        if(($_POST['Email'])==''&&($_POST['Password'])==''){
             echo 'Compila tutti i campi';
        }else{
            if((($_POST['Email'])&&($_POST['Password']))==$persona1){
             echo 'Bentornato '.$persona1[2].' '.$persona1[3].'.';
            }      
        }
    }
}    
?>
<html lang="it">
    <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    </head>    
    <body>
        <form action="http://localhost/test/testfinale/primo.php" method="POST">
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