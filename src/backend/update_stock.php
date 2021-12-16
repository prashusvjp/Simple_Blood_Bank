<?php
error_reporting(0);
$data = json_decode(file_get_contents('php://input'), true);
$connection = new mysqli("localhost","root","mysql");
/*If you are using XAMPP for MySQL then edit the previous line as new mysqli("localhost","root","") */
mysqli_select_db($connection,"db_blood_bank");
if($connection->connect_error){
    echo "Connection failed";
}else{
    $query = "update inventory 
    set Arrival_Date='".$data['date']."', Blood_Group='".$data['bgroup']."', Category='".$data['category']."',
    DonerID='".$data['donerId']."', Status='".$data['status']."' where StockID='".$data['stockId']."';";
    $result = mysqli_query($connection,$query);
    if($result)
        echo 1;
    else
        echo $connection->error;
}
mysqli_close($connection)
?>