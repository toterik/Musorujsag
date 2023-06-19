<?php
session_start();
if(!(isset($_SESSION["felhasznalonev"])))
{
    header('Location: bejelentkezes.php');
}
?>