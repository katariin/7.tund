<?php
        //edit.php
		
		//id mida muudame
	    echo $_GET["edit"];
		
         //saada k�tte k�ige uuemad andmed selle id kohta
		 //numbrim�rk ja v�rv		 
?>

<h2>Muuda autod</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
  <label for="car_plate" >auto nr</label><br>
  <input id="car_plate" name="number_plate" type="text"><br><br>
  <label for="color">v�rv</label><br>
  <input id="color" name="color" type="text"><br><br>
  <input type="submit" name="update" value="save">
  </form>