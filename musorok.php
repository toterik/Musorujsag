<?php
include_once("fuggvenyek.php");
include_once("index.php");
  ?>
  <div class="container center">
  <form method ="POST" action="musorfelvitel.php" accept-charset = "utf-8">
  <label for="fname">Műsor neve</label><br>
  <input type="text" name="musorneve"><br>
  <label for="fname">Dátum</label><br>
  <input type="date" name="datum"><br>
  <label for="fname">Műsor kezdete</label><br>
  <input type="time" name="kezdet"><br>
  <label for="fname">Műsor vege</label><br>
  <input type="time" name="veg"><br>
  <label for="fname">korhatár</label><br>
  <input type="number" name="korhatar" max = 18 min=0><br>
  <label for="fname">Hossz</label><br>
  <input type="number" name="hossz" max = 999 min = 1><br>
  <label for="fname">Csatorna neve</label><br>
  <select name ="csatornaneve"><br>

  <?php
      $sql = csatornakatlistaz();
      while($nevek = mysqli_fetch_assoc($sql))
      {
        echo '<option value="'.$nevek["CsatornaNev"].'">'.$nevek["CsatornaNev"].'</option>';
      }
      mysqli_free_result($sql);
  ?>

  </select><br><br>

  <input type="submit" value="Műsor hozzáadása" name="submit">
  </form>
  </div>


