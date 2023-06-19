<?php
    include_once("fuggvenyek.php");
    include_once("index_2.php");
    if(isset($_POST["musorid"]))
    {
        $musorid = $_POST["musorid"];
    }
    else
    {
        header('Location: kezdolap.php');
    }
    $sikerestorles = musorttorol($musorid);
    if (!$sikerestorles)
    {
        echo '<script>alert("Valami hiba történt");window.location.href="kezdolap.php";</script>';
    }
    else
    {
        echo '<script>alert("Sikeresen törölte a műsort");window.location.href="kezdolap.php";</script>';
    }
?>