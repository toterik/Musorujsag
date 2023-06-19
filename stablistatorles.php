<?php
    include_once("fuggvenyek.php");
    include_once("index_2.php");
    if(isset($_POST['szeig']))
    {
        $szeig = $_POST['szeig'];
    }
    else
    {
        header('Location: stablista.php');
    }
    $sikerestorles = szemelyttorol($szeig);
    if (!$sikerestorles)
    {
        echo '<script>alert("Valami hiba történt");window.location.href="stablista.php";</script>';
    }
    else
    {
        echo '<script>alert("Sikeresen törölt a stáblistából");window.location.href="stablista.php";</script>';
    }
?>