
<?php
    include_once("fuggvenyek.php");
    include_once("index.php");
    if(!($connect = konyvtarhozcsatlakozas())) die();

    $szeig = $_POST["szeig"];
    if(isset($_POST["szeig"]))
    {
        $szeig = $_POST["szeig"]; 
    }
    else
    {
        header('Location: stablista.php');
    }

    
    $sql = mysqli_query($connect,"SELECT stablista.Nev ,`SzeIg`,`MunkaKor`,`Nem`, musor.Nev as musorneve,stablista.MusorId FROM `stablista` join musor on stablista.MusorId = musor.MusorId where SzeIg ='$szeig'");
    $tomb = mysqli_fetch_assoc($sql);
?>
<div class="container center">
    <form action="stablistaszerkesztes.php" method="post"> 
        <label >Személy neve</label><br>
        <input type="text" name="szemelyneve" value="<?php echo ($tomb['Nev']); ?>" ><br>
    

        <label >Személyi Igazolvány</label><br>
        <input type="text" name="szeig" maxlength="7" value="<?php echo ($tomb['SzeIg']); ?>" ><br>

        <?php
            echo '<input type = hidden name = regiszeig value ="'.$szeig.'">';
        ?>

        <label >Műsor, amiben szerepel/dolgozik</label><br>
        <select name ="musorneve">
        <?php
            $sql = musorokatlistaz();
            while($nevek = mysqli_fetch_assoc($sql))
            {
                if($nevek["Nev"] == $tomb["musorneve"] )
                {
                    echo '<option value="'.$tomb["musorneve"].'" selected>'.$tomb["musorneve"].'</option>';
                }
                else
                {
                    echo '<option value="'.$nevek["Nev"].'" >'.$nevek["Nev"].'</option>';
                }
            }
            mysqli_free_result($sql);
        ?>
        </select><br>

        <label>Munkakör</label><br>
        <input type="text" name="munkakor" value="<?php echo ($tomb['MunkaKor']); ?>" ><br>

        <label>Nem</label><br>

        <?php
            if($tomb["Nem"] == "Férfi")
            {
                echo '<input type="radio" name="nem" value="Férfi" checked>';
                echo '<label for="Férfi">Férfi</label><br>';
            }
            else
            {
                echo '<input type="radio" name="nem" value="Férfi">';
                echo '<label for="Férfi">Férfi</label><br>';
            }
            if($tomb["Nem"] == "Nő")
            {
                echo '<input type="radio" name="nem" value="Nő" checked>';
                echo '<label for="Férfi">Nő</label><br>';
            }
            else
            {
                echo '<input type="radio" name="nem" value="Nő">';
                echo '<label for="Férfi">Nő</label><br>';
            }
            if($tomb["Nem"] == "Egyéb")
            {
                echo '<input type="radio" name="nem" value="Egyéb" checked>';
                echo '<label for="Férfi">Egyéb</label><br>';
            }
            else
            {
                echo '<input type="radio" name="nem" value="Egyéb">';
                echo '<label for="Férfi">Egyéb</label><br>';
            }
        ?>
    <input type="submit" value="Stáblista mentése" name="submit">
    </form>
</div>