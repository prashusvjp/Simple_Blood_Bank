<?php
error_reporting(0);
$data = json_decode(file_get_contents('php://input'), true);
$connection = new mysqli("localhost","root","mysql");
mysqli_select_db($connection,"db_blood_bank");
if($connection->connect_error){
    echo "Connection failed";
}else{
    $query = "update request 
    set Blood_Group='".$data['bgroup']."', Category='".$data['category']."',
    Quantity='".$data['status']."' where RequestID='".$data['requestId']."';";
    $result = mysqli_query($connection,$query);
    if($result)
        echo 1;
    else
        echo $connection->error;
}
mysqli_close($connection)
?>