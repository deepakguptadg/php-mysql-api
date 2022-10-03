<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once("../config.php");
if (!empty($_POST)) {
    if (isset($_POST['phone']) && isset($_POST['password'])) {
        $phone = $conn->real_escape_string($_POST['phone']);
        $password  = $conn->real_escape_string($_POST['password']);

        $sql = "SELECT * FROM tbl_registration WHERE `phone` = '$phone' AND `password`='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1){
            $data = mysqli_fetch_assoc($result);
            $response = array('status' => 'true', 'data' => $data, 'msg' => 'login success');
        } else{
            $response = array('status' => 'false', 'msg' => 'login false');
        }
    }else{
        $response = array('status' => 'false', 'msg' => 'All fields are required');
    }
    echo json_encode($response, JSON_PRETTY_PRINT);
}
$conn->close();
