<?php
error_reporting(0);
$data = json_decode(file_get_contents('php://input'), true);

$connection = new mysqli("localhost","root","mysql");
/*If you are using XAMPP for MySQL then edit the previous line as new mysqli("localhost","root","") */
mysqli_select_db($connection,"db_blood_bank");
if($connection->connect_error){
    echo "Connection failed";
}else{
    $query = "select count(*) as count from requests;";
    $result = mysqli_query($connection,$query);
    $req_count = mysqli_fetch_array($result)['count'];
    ++$req_count;
    $query = "insert into requests values('R".$req_count."','".$data['bgroup']."','".$data['category']."'
    ,'".$data['quantity']."','".$data['date']."','Pending','".$data['bankId']."');";
    $result = mysqli_query($connection,$query);
    if($result)
            echo 1;
        else
            echo $connection->error;
}
mysqli_close($connection)
?>