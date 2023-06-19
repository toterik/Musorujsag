<?php
   include_once("fuggvenyek.php");
   include_once("index_2.php");
   
    if(isset($_POST['szemelyneve']) && isset($_POST['szeig'])  && isset($_POST['musorneve']) && isset($_POST['munkakor'])  && isset( $_POST['nem']) && isset($_POST["regiszeig"]))
    {
        $szemelyneve = $_POST['szemelyneve'];
        $szeig = $_POST['szeig'];
        $musorneve = $_POST['musorneve'];
        $munkakor = $_POST['munkakor'];
        $nem = $_POST['nem'];
        $regiszeig= $_POST["regiszeig"];
    }
    else
    {
        header('Location: stablista.php');
    }

   if (isset($_POST['submit'])) 
   {
     if(trim($szemelyneve !== "" && $szeig !== "" && $musorneve !== "" && $munkakor !== "" && $nem !== ""))
     {

        $sikeresstab = stabotszerkeszt($szemelyneve, $szeig, $musorneve, $munkakor, $nem, $regiszeig);
        
        if (!$sikeresstab)
        {
            echo '<script>alert("Valami hiba történt!");window.location.href="stablista.php";</script>';
        }
        else
        {
            echo '<script>alert("Sikeresen megtörént a szerkesztés!");window.location.href="stablista.php";</script>';
        }
     }
     else
     {
      echo '<script>alert("Minden mezőt ki kell tölteni!");window.location.href="stablista.php";</script>';
     }
  }
   ?>