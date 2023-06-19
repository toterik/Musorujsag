<?php
   include_once("fuggvenyek.php");
   include_once("index_2.php");

    if(isset($_POST['musorneve']) && isset($_POST['datum']) && isset($_POST['kezdet']) && isset($_POST['veg']) && isset($_POST['korhatar']) && isset($_POST['hossz']) && isset($_POST['csatornaneve'])&& isset($_POST['musorid']))
   {
      $musorneve = $_POST['musorneve'];
      $datum = $_POST['datum'];
      $kezdet = $_POST['kezdet'];
      $veg = $_POST['veg'];
      $korhatar = $_POST['korhatar'];
      $hossz = $_POST['hossz'];
      $csatornaneve = $_POST['csatornaneve'];
      $musorid = $_POST['musorid'];
   }
   else
   {
      header('Location: musorok.php');
   }

   if (isset($_POST['submit'])) 
   {
     if(trim($musorneve !== "" && $datum !== "" && $kezdet !== "" && $veg !== "" && $korhatar !== "" 
     && $hossz !== "" && $csatornaneve !== ""))
     {
        $sikeresmusor = musortszerkeszt($musorneve,$datum,$kezdet,$veg,$korhatar,$hossz,$csatornaneve,$musorid);

        if (!$sikeresmusor)
        {
         echo '<script>alert("Valami hiba történt!");window.location.href="musorszerkesztes.php";</script>';
        }
        else
        {
            echo '<script>alert("Sikeresen szerkesztette a műsort!");window.location.href="kezdolap.php";</script>';
        }
     }
     else
     {
     
      echo '<script>alert("Minden mezőt ki kell tölteni!");window.location.href="kezdolap.php";</script>';
     }
  }
   ?>