<?php
    include("fuggvenyek.php");
    include_once("index_2.php");

    

    if(isset($_POST['felhasznalonev']) && $_POST['jelszo'])
    {
        $felhasznalonev = $_POST['felhasznalonev'];
        $jelszo = $_POST['jelszo'];
    }
    else
    {
        header('Location: kezdolap.php');
    }

   if (isset($_POST['submit'])) 
   {
     if(trim($felhasznalonev !== "" && $jelszo !== ""))
     {
        $sikeresbejelentkezes = felhasznalotellenoriz($felhasznalonev, $jelszo);

        if(!($sikeresbejelentkezes))
        {
            echo '<script>alert("Nem sikerült bejelentkezni!");window.location.href="bejelentkezes.php";</script>';
        }
        else
        {
            
            $_SESSION["felhasznalonev"] = $felhasznalonev;
            header('Location: kezdolap.php');
        }
     }
     else
     {
      echo '<script>alert("Minden mezőt ki kell tölteni!");window.location.href="bejelentkezes.php";</script>';
     }
  }
   ?>