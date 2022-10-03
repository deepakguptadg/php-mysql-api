<?php
	include('../helper.php');
	$result = getAllData('tbl_gallery');
	if($row_count = mysqli_num_rows($result) > 0){
		$data = array();
		while($row = mysqli_fetch_assoc($result)){
			$data[] = $row;
			$rusultData = array('stetus' => true, 'data' => $data);
		}
	}else{
		$rusultData = array('stetus' => false, 'data' => 'No Data Found...');
	}
	$json = json_encode($rusultData,JSON_PRETTY_PRINT);
    echo $json;
?>
