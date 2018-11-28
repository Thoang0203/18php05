<?php 
	$tien = 2000;
	$soKeo = 0;
	$voKeo = 0;
	while ($tien > 0) {
		$soKeo ++;
		$tien -= 200;
		$voKeo ++;
		if ($voKeo % 2 == 0) {
			$soKeo ++;
			$voKeo -=2;
			$voKeo ++;
		}
	}
	echo $soKeo;
 ?>