<?php
    
    if(isset($_POST['musorid']))
    {
        $musorid = $_POST['musorid'];
    }
    else
    {
        header('Location: kedvencek.php');
    }

    include_once("fuggvenyek.php");
    
    include_once("index_2.php");
    $felhasznalo = $_SESSION["felhasznalonev"];

    $sikeres = kedvencekbolkivesz($musorid, $felhasznalo);
    if ($sikerestorles)
    {
        echo '<script>alert("Valami hiba történt");window.location.href="kezdolap.php";</script>';
    }
    else
    {
        echo '<script>alert("Sikeresen eltávolította a kedvencek közül!");window.location.href="kedvencek.php";</script>';
    }
    
?>