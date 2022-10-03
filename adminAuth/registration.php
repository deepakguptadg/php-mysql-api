<?php
include_once("../config.php");
if(!empty($_POST)):
    if(isset($_POST['username']) && isset($_POST['phone']) && isset($_POST['password'])):
        $username  = $_POST['username'];
        $phone = $_POST['phone'];
        $password  = $_POST['password'];

        $slq3 = "SELECT * FROM tbl_registration WHERE `phone` = '$phone'";
        $qrs = $conn->query($slq3);
        if($qrs->num_rows == 1):
            $response = array('status' => 'true','msg' => 'Number is alrady exist.');
            echo json_encode($response,JSON_PRETTY_PRINT);
            die;
        else:
            $sql = "INSERT INTO tbl_registration (`name`,`phone`,`password`)
            VALUES ('$username','$phone','$password')";

            if ($conn->query($sql) === TRUE) {
                $response = array('status' => 'true','msg' => 'Registration successfull');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                $response = array('status' => 'false','msg' => '');
            }
        endif;
    else:
        $response = array('status' => 'false','msg' => 'All fields are required');
    endif;
        echo json_encode($response,JSON_PRETTY_PRINT);
endif;

$conn->close();
?>