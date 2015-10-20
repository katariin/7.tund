        <?php
        //edit.php
		require_once("edit_function.php");
		
		//kas kasutaja uundab andmeid
		if(isset($_POST["update"])){
			
			updateCar($_POST["id"], $_POST["number_plate"], $_POST["color"]);
		}
		
		
		//id mida muudame
		if(!isset($_GET["edit"])){
		
	       //suudan table.php lehel
	       
		   header("location: table.php");
		
		}else{
         //saada kätte kõige uuemad andmed selle id kohta
		 //numbrimärk ja värv	


          //saadan kaasa id
            $car_object = getSingeCarData($_GET["edit"]);	
			var_dump($car_object);
		}	
		
?>
		
		
		<h2>Muuda autot</h2>
	    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" ><br>
        <input type='hidden' name='id' value="<?=$_GET["edit"] ?>"><br>;
	    <label for="number_plate" >auto nr</label><br>
	    <input id="number_plate" name="number_plate" type="text" value="<?php echo $car_object->number_plate;?>" ><br><br>
  	    <label for="color" >varv</label><br>
	    <input id="color" name="color" type="text" value="<?=$car_object->color;?>"><br><br>
  	
	    <input type="submit" name="update" value="Submit">
	    </form>