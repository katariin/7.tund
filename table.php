<?php


          //table.php
		  require_once("function.php");
		  require_once("edit_function.php");
		  
		  //kasutaja tahab midagi muuta
		  if(isset($_POST["update"])){
			  
			  updateCar($_POST["id"], $_POST["number_plate"], $_POST["color"]);
		  }
		  
		  
		  // kas kasutaja tahab kustutada
		  //kas adressireal on ?delete=??!??!??
		  if(isset($_GET["delete"])){
			  
			  //saadan kaasa id, mida kustutada
			  deleteCar($_GET["delete"]);
			  
		  }
		  
		  $car_list = getCarData();
	       //var_dump($car_list);
		  
?>		  

<table border=1>
<tr>
    <th>id</th>
	<th>kasut id</th>
	<th>auto nr märk</th>
	<th>XS</th>
	
	<?php
	                   //iga massiivis olema elemendi kohta
					   //count ($car_list) - massiiivi pikkus
					for($i = 0; $i < count($car_list); $i++){
						   
						if (isset($_GET["edit"]) && $car_list[$i]->id == $GET["edit"]){
							  //kasutajale muutmiseks
							 echo"<tr>";
							   echo "<form action='table.php' method='post'>";
							           echo "<td>".$car_list[$i]->id."</td>";
						               echo "<td>".$car_list[$i]->user_id."</td>";
									   echo "<td><input type='hidden' name='id' value='".$car_list[$i]->id."'><input name='number_plate' value='" . $car_list[$i]->number_plate."'></td>";
									   echo "<td><input name='color' value='" . $car_list[$i]->color."'></td>";	
                                       echo "<td><input type='submit', name='update'></td>";
                                       echo "<td><a href='table.php'>cancel</a></td>";									   
							   echo"</form>";
							   echo"<tr>Seda rida muudetakse</tr>";
							 echo"</tr>";
					       }else{
							   //tavaline rida
						   // $i = $i + 1; sama mis $i= +=1; sama mis $i++;
						   echo"<tr>";
						   
						   echo "<td>". $car_list[$i]->id."</td>";
						   echo "<td>". $car_list[$i]->user_id."</td>";
						   echo "<td>". $car_list[$i]->number_plate."</td>";
						   echo "<td>". $car_list[$i]->color."</td>";
						   echo "<td><a href='?delete=". $car_list[$i]->id."'>X</a></td>";
						   echo "<td><a href='?edit=".$car_list[$i]->id."'>edit</a></td>";
				           echo "<td><a href='edit.php?edit=".$car_list[$i]->id."'>edit.php</a></td>";
						 
						   echo"</tr>";
						}   
					}
					   
	
	?>

</table>
