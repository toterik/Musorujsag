<?php 
session_start();
    if(isset($_SESSION["felhasznalonev"]))
    {
        session_unset();
        session_destroy();
        header('Location: bejelentkezes.php');
    }
    else
    {
        header('Location: bejelentkezes.php');
    }

?>