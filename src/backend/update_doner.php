<?php
error_reporting(0);
$data = json_decode(file_get_contents('php://input'), true);
$connection = new mysqli("localhost","root","mysql");
mysqli_select_db($connection,"db_blood_bank");
if($connection->connect_error){
    echo "Connection failed";
}else{
    $query = "update doner
    set Arrival_Date='".$data['date']."', Blood_Group='".$data['bgroup']."', Category='".$data['category']."',
    DonerID='".$data['donerId']."', Status='".$data['status']."' where DonerID='".$data['donerId']."';";
    $result = mysqli_query($connection,$query);
    if($result)
        echo 1;
    else
        echo $connection->error;
}
mysqli_close($connection)
?>