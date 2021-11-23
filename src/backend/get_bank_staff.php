<?php
error_reporting(0);
$data = json_decode(file_get_contents('php://input'), true);

$connection = new mysqli("localhost","root","mysql");

mysqli_select_db($connection,"db_blood_bank");
if($connection->connect_error){
    echo "Connection failed";
}else{
    $query = "select * from bank_staff where BankID='".$data['bankId']."';";
    $result = mysqli_query($connection,$query);
    $result = $result->fetch_all(MYSQLI_ASSOC);
    if(count($result))
        echo json_encode($result)
    else
        echo 0;
}
mysqli_close($connection)
?>