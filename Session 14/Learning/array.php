<?php 
	$List = array(
		'Nam' => array(
			'name' => 'Nam',
			'year' => 1997,
			'email' => 'nam@gmail.com'
		),
		'Nga' => array(
			'name' => 'Nga',
			'year' => 1998,
			'email' => 'nga@gmail.com'
		),
		'Hương' => array(
			'name' => 'Hương',
			'year' => 1997,
			'email' => 'huong@gmail.com'
		)
	);
	function display($a) {
		foreach ($a as $show) {
			echo $show['name'].' - '.$show['year'].' - '.$show['email'];
			echo '<br>';
		}
		echo '<br>';
	}
	function delete($a, $key) {
		unset($a[$key]);
	}
	display($List);
	$List['Nam']['email'] = 'nam97@gmail.com';
	display($List);
	delete($List, 'Nga');
	display($List);
 ?>