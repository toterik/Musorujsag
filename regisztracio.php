<head>
    <link rel="stylesheet" href="style.css">
</head>
<div class="container login">
    <form action = regisztraciokezelo.php method="post">
        <label> Felhasználónév: </label> <br>
        <input type = text name = felhasznalonev><br>
        <label> Jelszó: </label><br>
        <input type = password name = jelszo><br>
        <label> Email: </label><br>
        <input type = email name = email><br>
        
        <input type = submit name = submit value = Regisztáció>
    </form>
    <a href = "bejelentkezes.php"> Bejelentkezés</a>
</div>