<?php


function konyvtarhozcsatlakozas()
{
    $connect = new mysqli("localhost", "root", "", "musorujsag");
    if ($connect -> connect_error) die($connect -> connect_error);

    mysqli_query($connect, "SET NAMES utf8");
    return $connect;
}

function musortfelvisz($musorneve, $datum, $kezdet, $veg, $korhatar, $hossz, $csatornaneve)
{
    if(!($connect = konyvtarhozcsatlakozas())) return false;
    else
    {
        if($sql1 = mysqli_query($connect, "INSERT INTO `musor`( `Hossz`, `Nev`, `Korhatar`, `CsatornaNev`) 
        VALUES ('$hossz','$musorneve','$korhatar','$csatornaneve')"))
        {
            $musoridsql = mysqli_query($connect, "SELECT `MusorId` from musor where CsatornaNev = '$csatornaneve' and Nev = '$musorneve' and hossz = $hossz");
            $musor = mysqli_fetch_assoc($musoridsql);
            $id = $musor["MusorId"];
    
            if($sql2 = mysqli_query($connect, "INSERT INTO `leadja`(`MusorId`, `Datum`, `Mettol`, `Meddig`, `CsatornaNev`) 
            VALUES ('$id','$datum','$kezdet','$veg','$csatornaneve')"))
            {
            mysqli_close($connect);
            return true;
            }
        }
        else
        {
            mysqli_close($connect);
            return false;
        }
    }
}

function musorttorol($musorid)
{
    if(!($connect = konyvtarhozcsatlakozas())) return false;
    if ($sql = mysqli_query($connect, "DELETE FROM `musor` WHERE MusorId = $musorid"))
    {
        mysqli_close($connect);
        return true;
    }
    else
    {
        die(mysqli_error($connect));
        return false;
    }

}
function szemelyttorol($szeig)
{
    if(!($connect = konyvtarhozcsatlakozas())) return false;

    if ($sql = mysqli_query($connect, "DELETE FROM `stablista` WHERE SzeIg = '$szeig'"))
    {
        mysqli_close($connect);
        return true;
    }
    else
    {
        die(mysqli_error($connect));
        return false;
    }

}

function csatornakatlistaz()
{
    if(!($connect = konyvtarhozcsatlakozas())) return false;

    if ($sql = mysqli_query($connect, "SELECT * FROM `tvcsatorna`"))
    {
        return $sql;
    }
    else
    {
        die(mysqli_error($connect));
        return false;
    }
}

function musorokatlistaz()
{
    if(!($connect = konyvtarhozcsatlakozas())) return false;

    if ($sql = mysqli_query($connect, "SELECT * FROM `musor`"))
    {
        return $sql;
    }
    else
    {
        die(mysqli_error($connect));
        return false;
    }
}

function stabotfelvisz($szemelyneve, $szeig,$musorneve,$munkakor,$nem)
{
    if(!($connect = konyvtarhozcsatlakozas())) return false;

    $sql = mysqli_query($connect,"SELECT `MusorId` FROM `musor` where `Nev` = '$musorneve'");
    $tomb = mysqli_fetch_assoc($sql);
    $musorid= $tomb['MusorId'];

    $sql = mysqli_query($connect, "SELECT * FROM `stablista` WHERE `SzeIg` = '$szeig'");
    if(mysqli_num_rows($sql) > 0) return false;
    
    if($sql = mysqli_query($connect, "INSERT INTO `stablista`(`SzeIg`, `Nev`, `MunkaKor`, `Nem`, `MusorId`)
     VALUES ('$szeig','$szemelyneve','$munkakor','$nem','$musorid')"))
    {
        mysqli_close($connect);
        return true;
    }
    else
    {
        mysqli_close($connect);
        return false;
    }
}

function musortszerkeszt($musorneve, $datum, $kezdet, $veg, $korhatar, $hossz, $csatornaneve,$musorid)
{
    if(!($connect = konyvtarhozcsatlakozas())) return false;


    if($sql1 = mysqli_query($connect, "UPDATE `musor` SET `Hossz`='$hossz',
    `Nev`='$musorneve',`Korhatar`='$korhatar',`CsatornaNev`='$csatornaneve'
     WHERE `MusorId` = '$musorid'") 
     &&
     $sql2 = mysqli_query($connect," UPDATE `leadja` SET `Datum`='$datum',`Mettol`='$kezdet',
    `Meddig`='$veg',`CsatornaNev`='$csatornaneve' WHERE `MusorId` = '$musorid'"))
    {
        mysqli_close($connect);
        return true;
    }   
    else
    {
        mysqli_close($connect);
        return false;
    }
 
}

function stabotszerkeszt($szemelyneve, $szeig, $musorneve, $munkakor, $nem, $regiszeig)
{
    if(!($connect = konyvtarhozcsatlakozas())) return false;

    $sql = mysqli_query($connect,"SELECT `MusorId` FROM `musor` where `Nev` = '$musorneve'");
    $tomb = mysqli_fetch_assoc($sql);
    $musorid= $tomb['MusorId'];

    if($sql2 = mysqli_query($connect, "UPDATE `stablista` SET `SzeIg`='$szeig',`Nev`='$szemelyneve',`MunkaKor`='$munkakor',`Nem`='$nem',`MusorId`='$musorid' where SzeIg = '$regiszeig'"))
    {
        mysqli_close($connect);
        return true;
    }
    else
    {
        mysqli_close($connect);
        return false;
    }

}


function felhasznalotellenoriz($felhasznalonev, $jelszo)
{
    if(!($connect = konyvtarhozcsatlakozas())) return false;
    $sql = mysqli_query($connect,"SELECT * FROM `felhasznalo` where FelhasznaloNev = '$felhasznalonev' and Jelszo = '$jelszo'");

    if(mysqli_num_rows($sql) > 0)
    {
        mysqli_close($connect);
        return true;
    }
    else
    {
        mysqli_close($connect);
        return false;
    }

}

function kedvencekhezad($musorid, $felhasznalonev)
{
    if(!($connect = konyvtarhozcsatlakozas())) return false;
    $sql = mysqli_query($connect, "select * from kedvencek where FelhasznaloNev = '$felhasznalonev' and MusorId = '$musorid'");
    if(mysqli_num_rows($sql) > 0)
    {
        return false;
    }

    if($sql = mysqli_query($connect, "INSERT INTO `kedvencek`(`FelhasznaloNev`, `MusorId`) VALUES ('$felhasznalonev','$musorid')"))
    {
        mysqli_close($connect);
        return true;
    }
    else
    {
        mysqli_close($connect);
        return false;
    }

}
function kedvencekbolkivesz($musorid, $felhasznalo)
{
    if(!($connect = konyvtarhozcsatlakozas())) return false;

    if($sql = mysqli_query($connect, "DELETE FROM `kedvencek` WHERE `FelhasznaloNev` = '$felhasznalo' and `MusorId` = '$musorid'"))
    {
        mysqli_close($connect);
        return true;
    }
    else
    {
        mysqli_close($connect);
        return false;
    }
}

function regisztaciotellenoriz($felhasznalonev, $jelszo, $email)
{
    if(!($connect = konyvtarhozcsatlakozas())) return false;

    $sql = mysqli_query($connect, "SELECT * FROM `felhasznalo` WHERE `FelhasznaloNev` = '$felhasznalonev' OR Email = '$email'");
    if(mysqli_num_rows($sql) > 0)
    {
       
        
        mysqli_close($connect);
        return false;
    }
    else
    {
        $sql = mysqli_query($connect, "INSERT INTO `felhasznalo`(`Jelszo`, `FelhasznaloNev`, `Email`) VALUES ('$jelszo','$felhasznalonev','$email')");
        mysqli_close($connect);
        return true;
    }
}