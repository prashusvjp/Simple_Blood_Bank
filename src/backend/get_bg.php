<?php
$data = json_decode(file_get_contents('php://input'), true);

$connection = new mysqli("localhost","root","mysql");
/*If you are using XAMPP for MySQL then edit the previous line as new mysqli("localhost","root","") */
mysqli_select_db($connection,"db_blood_bank");
if($connection->connect_error){
    echo "Connection failed";
}else{
    $query = "select Blood_Group as bg,Doner_Name as name from doner where DonerID='".$data['id']."';";
    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_array($result);
    if($row){
        echo json_encode($row);
    }else{
        echo 0;
    }
}
?>