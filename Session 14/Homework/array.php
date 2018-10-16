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
		'Huong' => array(
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
		echo '------------------------------<br>';
	}
	function changeMailByName($a, $name, $email) {
		foreach ($a as $key => $arrNew) {
			if ($arrNew['name'] == $name) {
				$a[$key]['email'] = $email;
			}
		}
		return $a;
	}
	function deleteByName($a, $name) {
		foreach($a as $key => $arrNew) {
			if ($arrNew['name'] == $name) {
				unset($a[$key]);
			}
		}
		return $a;
	}
	function addMember($a, $key, $name, $year, $email) {
		$a[$key]['name'] = $name;
		$a[$key]['year'] = $year;
		$a[$key]['email'] = $email;
		return $a;
	}
	function changeEmailByBirthday($a, $year, $email) {
		foreach ($a as $key => $arrNew) {
			if ($arrNew['year'] == $year) {
				$a[$key]['email'] = $email;
			}
		}
		return $a;
	}
	echo 'Hiển thị danh sách lớp: <br><br>';
	display($List);
	echo 'Sửa email cho Nam: <br><br>';
	$List = changeMailByName($List, 'Nam', 'nam97@gmail.com');
	display($List);
	echo 'Trục xuất Nga khỏi sư môn: <br><br>';
	$List = deleteByName($List, 'Nga');
	display($List);
	echo 'Tùng gia nhập lớp <br><br>';
	$List = addMember($List, 'Tung', 'Tùng', 2000, 'tung@gmail.com');
	display($List);
	echo 'Đổi mail các bạn 1997 <br><br>';
	$List = changeEmailByBirthday($List, 1997, 'test@gmail.com');
	display($List);
 ?>