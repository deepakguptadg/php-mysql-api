<?php
    include('../helper.php');
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        if(deleteData('tbl_gallery', $id)){
            $result = getAllData('tbl_gallery');
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $rusultData = array('stetus' => true, 'message' => 'Deleted SuccesFully !!', 'data' => $row);
        }else{
            $rusultData = array('stetus' => false, 'message' => 'Can Not Deleted SuccesFully !!');
        }
        $json = json_encode($rusultData,JSON_PRETTY_PRINT);
        echo $json;
    }
?>
