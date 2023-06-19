
<!DOCTYPE HTML>
<?php
?>
<html lang="hu">
    <head>
        <link rel="stylesheet" href="style.css">
        <title> TvCsatornak</title>
    </head>
    <body>
        <?php
            include_once("fuggvenyek.php");
            include_once("index.php");
    if(!($connect = konyvtarhozcsatlakozas())) die();
    $tvcsatornak = mysqli_query($connect, "SELECT * FROM tvcsatorna");
    
    echo '<div class="container">';
        echo '<table>';
        while ($csatornaksorok = mysqli_fetch_assoc($tvcsatornak))
        {
            echo '<tr>';
                $aktualiscsatorna = $csatornaksorok['CsatornaNev'];
                echo '<th colspan=8>' . $aktualiscsatorna ." (".$csatornaksorok["Felbontas"].") ". '</th>';
            echo '</tr>';
            echo '<tr>';
                echo '<th>' . "Műsor neve". '</th>';
                echo '<th>'. "Dátum". '</th>';
                echo '<th>'. "Kezdet". '</th>';
                echo '<th>'. "Vége". '</th>';
                echo '<th>'. "Korhatár". '</th>';
                echo '<th colspan="3">'. "Szerkesztés". '</th>';
                
            echo '</tr>';
            $musorok = mysqli_query($connect, "SELECT * from `musor` join leadja on musor.MusorId = leadja.MusorId where musor.CsatornaNev = '$aktualiscsatorna'");
            while ($musorsorok = mysqli_fetch_assoc($musorok))
            {
                echo '<form action = "musorszerkesztes_1.php" method = "POST">';
                echo '<tr>';
                    echo '<td>' . $musorsorok["Nev"].'</td>';
                    echo '<td>' . $musorsorok["Datum"].'</td>';
                    echo '<td>' . $musorsorok["Mettol"].'</td>';
                    echo '<td>' . $musorsorok["Meddig"].'</td>';
                    echo '<td>' . $musorsorok["Korhatar"].'</td>';
                    echo '<input type = hidden name = musorid value ="'.$musorsorok["MusorId"].'">';
                    echo '<td style="text-align: center;"><input type = "submit" value = "⚙️" title = "Szerkesztés"></td>'; 
                    echo '</form>';

                echo '<form action = "musortorles.php" method = "POST">';
                    echo '<td style="text-align: center;"><input type = "submit" value = "❌" title = "Törlés"></td>';
                    echo '<input type = hidden name = musorid value ="'.$musorsorok["MusorId"].'">';
                echo '</form>';

                echo '<form action = "kedvencekhezad.php" method = "POST">';
                    echo '<td style="text-align: center;"><input type = "submit" style="color: red; font-size: 15px;" value = "❤" title = "Kedvencekhez adás"></td>';
                    echo '<input type = hidden name = musorid value ="'.$musorsorok["MusorId"].'">';
                echo '</form>';
                echo '</tr>';
            }
        }
        echo '</table>';
    echo '</div>';
        ?>
    </body>
</html>