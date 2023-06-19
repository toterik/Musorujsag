<?php
    include_once("fuggvenyek.php");
    include_once("index.php");

    echo '<div class="container">';
    if(!($connect = konyvtarhozcsatlakozas())) die();
    echo '<h1>'.'Most műsoron'. '</h1>';

    $sql = mysqli_query($connect, "SELECT * FROM `musor` join leadja on musor.MusorId = leadja.MusorId where leadja.datum = CURRENT_DATE and CURRENT_TIME BETWEEN Mettol and Meddig");

    while($mostmusoron = mysqli_fetch_assoc($sql))
    {
        echo $mostmusoron['Nev']." " . $mostmusoron["Mettol"] . "-".$mostmusoron["Meddig"];
        echo '<p>'; echo '</p>';
    }
    if(mysqli_num_rows($sql) == 0)
    {
        echo '<p>Jelenleg nincs egy műsor se adáson</p>';
    }
    echo '<hr>';

    $sql = mysqli_query($connect, "SELECT max(Hossz) , Nev from musor");    
    $tomb = mysqli_fetch_assoc($sql);
    $ora = $tomb["max(Hossz)"]/60;
    $perc = $tomb["max(Hossz)"]%60;
    echo '<h1>'.'Leghosszabb műsor'. '</h1>';
    echo '<p>' .$tomb["Nev"]." " .floor($ora). " óra ". $perc ." perc".'</p>';

    echo '<hr>';
    echo '<h1>Munkakör statisztikák</h1>';
    
    $sql = mysqli_query($connect, "SELECT MunkaKor, COUNT(*) as darabszam from stablista group by MunkaKor order by darabszam desc");
    
    echo '<table style="margin: 15px;">';
    echo '<tr>';
    echo '<th>' . "Munkakör megnevezése". '</th>';
    echo '<th style="width: 400px;">' . "Darabszám". '</th>';
    echo '</tr>';
    while ($tomb = mysqli_fetch_assoc($sql))
    {
        echo '<tr>';
            echo '<td>' . $tomb["MunkaKor"].'</td>';
            echo '<td style="text-align: center;">' . $tomb["darabszam"].'</td>';
        echo '</tr>';       
    }
    echo '</table>';
    echo '<hr>';


    $sql = mysqli_query($connect, "SELECT tvcsatorna.CsatornaNev, COUNT(*) as musorokszama from musor join tvcsatorna on musor.CsatornaNev = tvcsatorna.CsatornaNev group by tvcsatorna.CsatornaNev");    
    echo '<h1>TV csatornák műsorok darabszáma: </h1>';
    
    echo '<table style="margin: 15px;">';
    echo '<tr>';
    echo '<th>' . "TV csatorna". '</th>';
    echo '<th style="width: 400px;">' . "Darabszám". '</th>';
    echo '</tr>';
    while ($tomb = mysqli_fetch_assoc($sql))
    {
        echo '<tr>';
            echo '<td>' . $tomb["CsatornaNev"].'</td>';
            echo '<td style="text-align: center;">' . $tomb["musorokszama"].'</td>';
        echo '</tr>';       
    }
    echo '</table>';
    echo '<hr>';


    echo '<h1>'.'Legtöbb kedvenchez adott műsor'. '</h1>';
    $sql = mysqli_query($connect, "SELECT `musor`.`Nev`, `kedvencek`.`MusorId`, COUNT(kedvencek.MusorId) `db` from kedvencek join musor on musor.MusorId = kedvencek.MusorId 
    group by `MusorId` having `db` = (SELECT COUNT(`MusorId`) `darabszam` from kedvencek group by kedvencek.MusorId order by `darabszam` desc limit 1)");
    echo '<table style="margin: 15px;">';
    echo '<tr>';
    echo '<th>' . "Műsor címe". '</th>';
    echo '<th style="width: 400px;">' . "Darabszám". '</th>';
    echo '</tr>';
 

    while ($tomb = mysqli_fetch_assoc($sql))
    {
    ?>
        <tr>
            <td><?php echo $tomb["Nev"]; ?></td>
            <td style="text-align: center;"><?php echo $tomb["db"]; ?></td>
        </tr>
    <?php   
    }





    echo '</table>';

    echo '<hr>';

    echo '<h1>'.'Esti műsorok'. '</h1>';

    $sql = mysqli_query($connect, "SELECT * FROM `musor` join leadja on musor.MusorId = leadja.MusorId where leadja.Mettol >= '20:00' ");
    echo '<table style="margin: 15px;">';
    echo '<tr>';
    echo '<th>' . "Műsor címe". '</th>';
    echo '<th style="width: 400px;">' . "Mettől". '</th>';
    echo '<th style="width: 400px;">' . "Meddig". '</th>';
    echo '</tr>';

    while ($tomb = mysqli_fetch_assoc($sql))
    {
        echo '<tr>';
            echo '<td>' . $tomb["Nev"].'</td>';
            echo '<td style="text-align: center;">' . $tomb["Mettol"].'</td>';
            echo '<td style="text-align: center;">' . $tomb["Meddig"].'</td>';
        echo '</tr>';       
    }
    echo '</table>';

    mysqli_close($connect);
?>
</div>