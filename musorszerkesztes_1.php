<?php

include_once("fuggvenyek.php");
include_once("index.php");

echo '<div class="container center">';

if(isset($_POST["musorid"]))
{
    $musorid = $_POST["musorid"];
}
else
{
    header('Location: musorok.php');
}
if(!($connect = konyvtarhozcsatlakozas())) die("Nem sikerült a csatlakozás");
$sql = mysqli_query($connect, "SELECT * FROM `musor` join leadja on musor.MusorId = leadja.MusorId where musor.MusorId = '$musorid'");
$tomb = mysqli_fetch_assoc($sql);
?>
<form method ="POST" action="musorszerkesztes.php" accept-charset = "utf-8">
<label for="fname">Musor neve</label><br>
<input type="text" name="musorneve" value="<?php echo ($tomb['Nev']); ?>" > <br>
<label for="fname">Dátum</label><br>
<input type="date" name="datum" value="<?php echo ($tomb['Datum']); ?>" > <br>
<label for="fname">Musor kezdete</label><br>
<input type="time" name="kezdet" value="<?php echo ($tomb['Mettol']); ?>" > <br>
<label for="fname">Musor vege</label><br>
<input type="time" name="veg" value="<?php echo ($tomb['Meddig']); ?>" > <br>
<label for="fname">korhatár</label><br>
<input type="number" name="korhatar" max = 18 min=0 value="<?php echo ($tomb['Korhatar']); ?>" > <br>
<label for="fname">Hossz</label><br>
<input type="number" name="hossz" max = 999 min = 1 value="<?php echo ($tomb['Hossz']); ?>" > <br>
<label for="fname">Csatorna neve</label><br>
<select name ="csatornaneve"> <br>


<?php
    $sql = csatornakatlistaz();
    while($nevek = mysqli_fetch_assoc($sql))
    {
    if($tomb['CsatornaNev'] == $nevek["CsatornaNev"])
    {
        echo '<option value="'.$nevek["CsatornaNev"].'" selected>'.$nevek["CsatornaNev"].'</option>';
    }
    else
    {
        echo '<option value="'.$nevek["CsatornaNev"].'">'.$nevek["CsatornaNev"].'</option>';
    }
    }
    echo '<input type = hidden name = musorid value ="'.$musorid.'">';
    mysqli_free_result($sql);
?>

</select><br><br>

<input type="submit" value="Műsor mentése" name="submit">
</form>

</div>