
<?php
    include_once("fuggvenyek.php");
    include_once("index.php");
    if(!($connect = konyvtarhozcsatlakozas())) die();
    echo '<div class="container">';
        echo '<table>';
            echo '<tr>';
                echo '<th>' . "Személy neve". '</th>';
                echo '<th>'. "Személyi Igazolvány". '</th>';
                echo '<th>'. "Munkakör". '</th>';
                echo '<th>'. "Nem". '</th>';
                echo '<th>'. "Műsor, amiben dolgozik". '</th>';
                echo '<th colspan="2">'. "Szerkesztés". '</th>';
            echo '</tr>';

        $sorok = mysqli_query($connect, "SELECT stablista.Nev ,`SzeIg`,`MunkaKor`,`Nem`, musor.Nev as musorneve,stablista.MusorId  FROM `stablista` join musor on stablista.MusorId = musor.MusorId order by musor.Nev");
        while ($musorsorok = mysqli_fetch_assoc($sorok))
        {
            echo '<tr>';
                echo '<td>' . $musorsorok["Nev"].'</td>';
                echo '<td>' . $musorsorok["SzeIg"].'</td>';
                echo '<td>' . $musorsorok["MunkaKor"].'</td>';
                echo '<td>' . $musorsorok["Nem"].'</td>';
                echo '<td>' . $musorsorok["musorneve"].'</td>';

                echo '<form action = "stablistaszerkesztesform.php" method = "POST">';
                echo '<input type = hidden name = szeig value ="'.$musorsorok["SzeIg"].'">';
                echo '<td style="text-align: center;"><input type = "submit" value = "⚙️" title = "Szerkesztés"></td>'; 
                echo '</form>';

                echo '<form action = "stablistatorles.php" method = "POST">';
                echo '<input type = hidden name = szeig value ="'.$musorsorok["SzeIg"].'">';
                echo '<td style="text-align: center;"><input type = "submit" value = "❌" title = "Törlés"></td>';
                echo '</form>';

            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';

?>