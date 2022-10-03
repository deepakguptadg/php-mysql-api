<?php
    include('config.php');

    header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: access");
	header("Access-Control-Allow-Methods: POST");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	// $data = json_decode(file_get_contents('php://input'));

    // Get All Data From The Table 
    function getAllData($table){
        Global $conn;
        $sql = "SELECT * FROM $table";
        return mysqli_query($conn, $sql);
    }

    // Get Sigle Data From The Table 
    function getSingleData($table ,$id){
        Global $conn;
        $sql = "SELECT * FROM $table Where id = '$id'";
        return mysqli_query($conn, $sql);
    }

    // Delete Single Data From Table By Id
    function deleteData($table ,$id){
        Global $conn;
        $sql = "DELETE FROM $table Where id = '$id'";
        return mysqli_query($conn, $sql);
    }

    function deActivate($table, $id){
        Global $conn;
        $sql = "UPDATE $table SET `is_active`= 0 WHERE id = '$id'";
        return mysqli_query($conn, $sql);

    }
