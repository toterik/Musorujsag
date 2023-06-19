<?php
    include_once("fuggvenyek.php");
    include_once("index.php");
    if(!($connect = konyvtarhozcsatlakozas())) die();
?>
<div class="container center">
    <form action="stablistahozad.php" method="post"> 
        <label >Személy neve</label><br>
        <input type="text" name="szemelyneve"><br>

        <label >Személyi Igazolvány</label><br>
        <input type="text" name="szeig" maxlength="7"><br>

        <label >Műsor, amiben szerepel/dolgozik</label><br>
        <select name ="musorneve">
        <?php
            $sql = musorokatlistaz();
            while($nevek = mysqli_fetch_assoc($sql))
            {
                echo '<option value="'.$nevek["Nev"].'">'.$nevek["Nev"].'</option>';
            }
            mysqli_free_result($sql);
        ?>
        </select><br>

        <label>Munkakör</label><br>
        <input type="text" name="munkakor"><br>

        <label>Nem</label><br>

        <input type="radio" name="nem" value="Férfi" checked>
        <label for="Férfi">Férfi</label><br>
        <input type="radio" name="nem" value="Nő">
        <label for="Nő">Nő</label><br>
        <input type="radio" name="nem" value="Egyéb">
        <label for="Egyéb">Egyéb</label><br><br>

    <input type="submit" value="Új személy hozzáadása" name="submit">
    </form>
</div>
