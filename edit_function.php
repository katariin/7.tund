<?php

          require_once("../configglobal.php");
	      $database = "if15_jekavor";
	function getSingeCarData($edit_id){
        //edit functions.php
		$mysqli = new mysqli($GLOBALS[servername], $GLOBALS[server_username], $GLOBALS[server_password], $GLOBALS[database]);
		$stmt = $mysqli->prepare("SELECT number_plate, color FROM car_plates WHERE id=? AND deleted is NULL");
		//asendan ? märgi
		$stmt->bind_param("$i", $edit_id);
		$stmt->bind_redult($number_plate, $color);
		$stmt->execute();
		
		//tekitan objekti
		$car= new Stdclass();
		
		//saime ühe rea andmeid
		if($stmt->fetch()){
			//saan siin alles kasutada bind_result muutujaid
			$car->number_plate = $number_plate;
			$car->color = $color;
			
		}else{
			header("location: table.php");
				
		}
		return $car;
		
		$stmt->close();
		$mysqli->close();
	}
	
	
	   function updateCar($id, $number_plate, $color){
	   $mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
	   $stmt = $mysqli->prepare("UPDATE car_plates SET number_p0late=?, color=? WHERE id=?");
	   $stmt->bind_param("ssi", $number_plate, $color, $id);
	    // kas õnnestus salvestada
	   
	    if($stmt->execute()) {
		   // õnnestus
		   echo "hurraa";
		  
	    }
	   
	   $stmt->close();
		$mysqli->close();
	   
	   }
?>




