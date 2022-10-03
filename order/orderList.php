<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: access");
	header("Access-Control-Allow-Methods: GET");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	include('../config.php');
	$data = json_decode(file_get_contents('php://input'));
	$sql = "SELECT * FROM tbl_order";
	$result = mysqli_query($conn, $sql);

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
