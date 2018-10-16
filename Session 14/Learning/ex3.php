<?php 
	// Trinh bay mang danh sach lop
	$myClass = array(
				'nam' => array('name' => 'Nam', 'birthday' => 1997, 'email' => 'nam@gmail.com'),
				'nga' => array('name' => 'Nga', 'birthday' => 1998, 'email' => 'nga@gmail.com'),
				'huong' => array('name' => 'Huong', 'birthday' => 1997, 'email' => 'huong@gmail.com'),
			);
	// Hien thi danh sach lop
	function displayClass($arr) {
		echo "------------***---------------<br>";
		$i = 1;
		foreach($arr as $arrNew) {
			echo $i.', ',$arrNew['name'].' - '.$arrNew['birthday'].' - '.$arrNew['email'].'<br>';
			$i++;
		}
	}
	// Kiem tra ten va thay doi email
	function checkNameAndChangeEmail($arr, $name, $email){
		// Vong for nay moi, key la key khi for
		foreach($arr as $key => $arrNew) {
			// Neu phan tu nay co ten trung voi yeu cau thi doi email cua phan tu do
			if ($arrNew['name'] == $name) {
				$arr[$key]['email'] = $email;
			}
		}
		return $arr;
	}
	function removeMemberbyName($arr, $name){
		// Vong for nay moi, key la key khi for
		foreach($arr as $key => $arrNew) {
			// Neu phan tu nay co ten trung yeu cau thi loai bo phan tu do
			if ($arrNew['name'] == $name) {
				unset($arr[$key]);
			}
		}
		return $arr;
	}
	function addMember($arr, $key,$name, $birthday, $email){
		// Add mot phan tu moi vao mang theo du lieu
		$arr[$countArr]['name'] = $name;
		$arr[$countArr]['birthday'] = $birthday;
		$arr[$countArr]['email'] = $email;
		return $arr;
	}
	function checkBirthdayAndChangeEmail($arr, $birthday, $email){
		// Vong for nay moi, key la key khi for
		foreach($arr as $key => $arrNew) {
			// Neu ngay sinh trung voi yeu cau thi doi email cua phan tu do
			if ($arrNew['birthday'] == $birthday) {
				$arr[$key]['email'] = $email;
			}
		}
		return $arr;
	}
	displayClass($myClass);
	$myClass = checkNameAndChangeEmail($myClass, 'Nam', 'nam97@gmail.com');
	displayClass($myClass);

	$myClass = removeMemberbyName($myClass, 'Nga');
	displayClass($myClass);

	$myClass = addMember($myClass, 'tung', 'Tung', 2000, 'tung@gmail.com');
	displayClass($myClass);
	
	$myClass = checkBirthdayAndChangeEmail($myClass, 1997, 'test@gmail.com');
	displayClass($myClass);
?>