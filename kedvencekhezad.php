<?php
    
    include_once("fuggvenyek.php");
    include_once("index.php");
    
    if(isset($_POST['musorid']) && isset($_SESSION["felhasznalonev"]))
    {
        $felhasznalo = $_SESSION["felhasznalonev"];
        $musorid = $_POST['musorid'];
    }

    $sikeres = kedvencekhezad($musorid, $felhasznalo);
    if (!$sikerestorles == false)
    {
        echo '<script>alert("Valami hiba történt");window.location.href="kezdolap.php";</script>';
    }
    else
    {
        echo '<script>alert("Sikeresen hozzáadta a kedvencekhez!");window.location.href="kedvencek.php";</script>';
    }
    
?>