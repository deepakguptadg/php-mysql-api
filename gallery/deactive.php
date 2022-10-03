<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: access");
	header("Access-Control-Allow-Methods: POST");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	include('../config.php');
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "UPDATE `tbl_gallery` SET `is_active`= 1 WHERE id = '$id'";

        if(mysqli_query($conn, $sql)){
            $rusultData = array('stetus' => true, 'message'=>'Data Updated Succesfully !!');
        }else{
            $rusultData = array('stetus' => false, 'data' => 'Data Not Updated !!');
        }
    }
    $json = json_encode($rusultData,JSON_PRETTY_PRINT);
    echo $json; 

?>
