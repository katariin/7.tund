<?php

     //function php
     // ühenduse loomiseks kasuta
	    require_once("../configglobal.php");
		$database="if15_jekavor";

	// loome uue funktsiooni
        function getCarData() {
			
			$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
			
			$stmt = $mysqli->prepare("SELECT id, user_id, number_plate, color FROM car_plates");
			//echo $mysqli->error;
			$stmt->bind_result($id, $user_id, $number_plate, $color_from_db);
			$stmt->execute();
			
			//tühi  massiv kus hoiame objekte
			$array=array();
			
			//tee tsüklit nii mitu korda, kui saad
			//ab'ist ühe rea andmeid
			
			while($stmt->fetch()){
				 // loon objekte
				$car= new StdClass();
				$car->id=$id;
				$car->number_plate = $number_plate;
				$car->color = $color_from_db;
				$car->user_id = $user_id;
				
				
				    // lisame selle massiivi
					array_push($array, $car);
					//echo $array;
					//var_dump($array);
					//echo"</pre>";
				
			
		    }
			
			$stmt->close();
			$mysqli->close();
			
			return $array;
			
		}
		
		 
		
		function deleteCar($id_to_be_deleted){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
			
			$stmt = $mysqli->prepare("SELECT user_id, color FROM car_plates WHERE id IS NULL");
			$stmt->bind_param("i", $d_to_be_deleted);
			
			if($stmt->execute()){
				//sai edulalt kustutatud
				header("Location: table.php");
				
			}
          
		  $stmt->close();
		  $mysqli->close();
		  
	    }
		
		
		
?>	



 /* 
	//kõik AB'iga seonduv
	
	// ühenduse loomiseks kasuta
	require_once("../configglobal.php");
	$database = "if15_kati";
	//paneme sessiooni käima, kasutada $_SESSION muutujad
	session_start();
	
	
	// lisame kasutaja ab'i
	function createUser(){
		//globals on muutuja kõigist php failidest mis on ühendatud
		$mysqli = new mysqli($GLOBALS[servername], $GLOBALS[server_username], $GLOBALS[server_password], $GLOBALS[database]);
		
		
		$stmt = $mysqli->prepare("INSERT INTO user_sample (email, password) VALUES (?, ?)");
		$stmt->bind_param("ss", $create_email, $password_hash);
		$stmt->bind_result($id_from_db, $email_from_db);
		$stmt->execute();
		
		if($stmt->fetch()){
			echo "kasutaja id=".$id_from_db;
			
			$_SESSION["id_from_db"] = $id_from_db;
			$_SESSION["user_email"] = $email_from_db;
			
			//suunan kasutaja data.php lehele
			header("Location: data.php");
			
			
		}else{
			echo "Wrong password or email!";
		}
		
		$stmt->close();
		
		$mysqli->close();		
	}
	
	//logime sisse
	function createCarPlate($car_plate, $color){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("INSERT INTO car_plates (user_id, number_plate, color) VALUES (?, ?, ?)");
		$stmt->bind_param("iss", $_SESSION["id_from_db"], $car_plate, $color);
		
		$message = "";
		
		if($stmt->execute()){
		// see on tõene siis kui sisestus ab'i õnnestus
		$message="edukalt isestatud andmebaasi";
		}else{
		echo $stmt->error;
		}
		$stmt->close();
		$mysqli->close();
        
        return $message;		
	}
	
	function welcome($name){
		echo "Tere" . $name;
		
	}
	
  */