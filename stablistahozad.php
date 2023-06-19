<?php
   include_once("fuggvenyek.php");
   include_once("index_2.php");

   if(isset($_POST['szemelyneve']) && isset($_POST['szeig'])  && isset($_POST['musorneve']) && isset($_POST['munkakor'])  && isset( $_POST['nem']) )
   {
    $szemelyneve = $_POST['szemelyneve'];
    $szeig = $_POST['szeig'];
    $musor = $_POST['musorneve'];
    $munkakor = $_POST['munkakor'];
    $nem = $_POST['nem'];
   }
   else
   {
    header('Location: stablista.php');
   }



    if (isset($_POST['submit'])) 
    {
        if(trim($szemelyneve) !== "" && trim($szeig) !== "" && trim($musor) !== "" && trim($munkakor) !== "" && trim($nem) !== "")
        {
            
            $sikeresstab = stabotfelvisz($szemelyneve, $szeig,$musor,$munkakor,$nem);
            if (!$sikeresstab)
            {
                echo '<script>alert("Nem sikerült hozzáadni a személyt a stáblistához!"); window.location.href="dolgozo.php"; </script>';
            }
            else
            {
                echo '<script>alert("Sikeresen megtörtént a stáblistához adás");window.location.href="dolgozo.php";</script>';
            }
        }
        else
        {
            echo '<script>alert("Minden mező kitöltése kötelező!"); window.location.href="dolgozo.php" </script>';
        }
    }

  
   ?>