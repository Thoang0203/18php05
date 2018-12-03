<?php 
	$USD = $euro = 0;
	$soKeo = 0;
	while ($soKeo < 50) {
		$USD -= 5;
		$soKeo++;
		$euro += 3;
		while ($euro > 0) {
			$euro -=2;
			$USD += 3;
			$soKeo++;
		}
	}
	echo $USD;
 ?>