        echo "<tr>;
	    echo "<td>". $car_list[$i]->id."</td>";
		echo "<td>". $car_list[$i]->user_id."</td>";
        echo "<td><input name='number_plate' value='" . $car_list[$i]->number_plate."'></td>";
	    echo "<td><input name='color' value='" . $car_list[$i]->colour."'></td>";	
        echo "<td><input type='submit', name='update'></td>";
        echo "<td><a href='table.php'>cancel</a></td>";	
	    echo "</tr>";