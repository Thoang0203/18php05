<?php 
	if ($getProductsDetail->num_rows > 0) {
		while ($row = $getProductsDetail->fetch_assoc()) {
			echo $row['id']." - ".$row['name']." - ".$row['price']." - ".$row['description']." - <img width='100px' height='100px' src='./uploads/".$row['image']."'> - ".$row['created']." ";
		}
	}
 ?>