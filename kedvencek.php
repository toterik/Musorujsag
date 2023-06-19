<?php
include_once("fuggvenyek.php");
include_once("index.php");
$felhasznalonev = $_SESSION["felhasznalonev"];
if(!($connect = konyvtarhozcsatlakozas())) die();
$sql = mysqli_query($connect, "select * from kedvencek join musor on kedvencek.`MusorId` = musor.MusorId join leadja on musor.MusorId = leadja.MusorId where FelhasznaloNev = '$felhasznalonev'");

echo '<div class="container">';
    echo '<table>';

        echo '<tr>';
        echo '<th>' . "Műsor neve". '</th>';
        echo '<th>'. "Dátum". '</th>';
        echo '<th>'. "Kezdet". '</th>';
        echo '<th>'. "Vége". '</th>';
        echo '<th>'. "Csatorna". '</th>';
        echo '<th>'. "Szerkesztés". '</th>';
        echo '</tr>';

    while ($tomb = mysqli_fetch_assoc($sql))
    {
    
        echo '<tr>';
            echo '<td>' . $tomb["Nev"].'</td>';
            echo '<td>' . $tomb["Datum"].'</td>';
            echo '<td>' . $tomb["Mettol"].'</td>';
            echo '<td>' . $tomb["Meddig"].'</td>';
            echo '<td>' . $tomb["CsatornaNev"].'</td>';

            echo '<form action = "kedvencekbolkivesz.php" method = "POST">';
                echo '<td style="text-align: center;"><input type = "submit" style="color: red; font-size: 15px;" value = "❤" title = "Törlés a kedvencekből"></td>';
                echo '<input type = hidden name = musorid value ="'.$tomb["MusorId"].'">';
            echo '</form>';

        echo '</tr>';
    }
    echo '</table>';
echo '</div>';

?>