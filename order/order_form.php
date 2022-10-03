<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: access");
	header("Access-Control-Allow-Methods: POST");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	include('../config.php');
	// $data = json_decode(file_get_contents('php://input'));
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['food']) ){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $food = $_POST['food'];
        $sql = "INSERT INTO tbl_order(name, email, phone, address, food) VALUE('$name', '$email', '$phone', '$address', '$food')";
        if(mysqli_query($conn, $sql)){
            $sql1 = "SELECT * FROM tbl_order";
            $result = mysqli_query($conn, $sql1);
            // $row = $result->fetch_all(MYSQLI_ASSOC);
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $rusultData = array('stetus' => true, 'message'=>'Data Inserted Succesfully !!', 'data' => $row);
        }else{
            $rusultData = array('stetus' => false, 'data' => 'Data Not Inserted !!');
        }
    }
    $json = json_encode($rusultData, JSON_PRETTY_PRINT);
    // print_r($json); 
    echo $json;

?>
