<?php
$data = json_decode(file_get_contents('php://input'), true);

$connection = new mysqli("localhost","root","mysql");
mysqli_select_db($connection,"db_blood_bank");
if($connection->connect_error){
    echo "Connection failed";
else{
    $query = "select count(*) as count from inventory;";
    $result = mysqli_query($connection,$query);
    $stock_count = mysqli_fetch_array($result)['count'];
    $query = "insert into inventory values('I".++$stock_count."','".$data['date']."','".$data['bgroup']."'
    ,'".$data['category']."','".$data['bankId']."','".$data['donerId']."','".$data['status']."';";
    $result = mysqli_query($connection,$query);
    
}
?>