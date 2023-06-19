<?php
include("fuggvenyek.php");
    if(isset($_POST['felhasznalonev']) && $_POST['jelszo'] && $_POST['email'])
    {
        $felhasznalonev = $_POST['felhasznalonev'];
        $jelszo = $_POST['jelszo'];
        $email = $_POST['email'];
    }
    else
    {
        echo '<script>alert("Nem sikerült regisztrálni!");window.location.href="regisztracio.php";</script>';
    }

   if (isset($_POST['submit']))
   {
     if(trim($felhasznalonev !== "" && $jelszo !== "" && $email !== ""))
     {
        $sikeresregisztracio = regisztaciotellenoriz($felhasznalonev, $jelszo, $email);

        if(!($sikeresregisztracio))
        {
            echo '<script>alert("Nem sikerült regisztrálni!");window.location.href="regisztracio.php";</script>';
        }
        else
        {
            
            echo '<script>alert("Sikeres regisztáció!");window.location.href="bejelentkezes.php";</script>';
        }
     }
     else
     {
      echo '<script>alert("Minden mezőt ki kell tölteni!");window.location.href="regisztracio.php";</script>';
     }

}
   ?>