<?php
//definizione variabili
$name = "Veronica";
$surname = "Fina";
$age = "39";

echo "Buongiono,";
echo "<br>";
echo "mi chiamo ".$name." ".$surname.", ho ".$age." anni";
echo "<br>";

//prova ciclo if
if ($age>=18){
    echo "<h3>E sono maggiorenne!</h3>";
} else {
    echo "<h1>Evviva, sono tornata ragazzina!!!</h1>";
}

echo "Ho una grande novità:";
echo "<br>";
//prova ciclo while
$count = 5;
while ($count>0){
    echo "<br>";
    echo "".$count."<br>";
    $count --;
}

//ciclo if con booleani
$student = True;
if ($student){
    echo "<h3>Sono uno studente</h3>";
} else{
    echo "<h3>Non sono uno studente</h3>";
}

//Ciclo for
echo "Condividerò con voi le materie trattate tra 5 secondi <br>";
for ($i=1; $i<=5; $i++){
    echo "<br>".$i."<br>";
}

//Ciclo foreach con array
echo "<br>";
$materie =["Coding", "Stampa UV", "Stampa 3D", "AutoCAD"];
echo "Come promesso, ecco l'elenco: <br>";
foreach ($materie as $materia){
    echo "<br>".$frutto."<br>";
}
?>