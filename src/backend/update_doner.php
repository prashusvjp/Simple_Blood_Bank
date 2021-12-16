<?php
error_reporting(0);
$data = json_decode(file_get_contents('php://input'), true);
$connection = new mysqli("localhost","root","mysql");
/*If you are using XAMPP for MySQL then edit the previous line as new mysqli("localhost","root","") */
mysqli_select_db($connection,"db_blood_bank");
if($connection->connect_error){
    echo "Connection failed";
}else{
    $query = "update doner
    set EmailID='".$data['emailId']."', Gender='".$data['gender']."',PhoneNo='".$data['phoneNo']."',
    Doner_Name='".$data['name']."',Address='".$data['address']."', Photo='".$data['photo']."' where DonerID='".$data['donerId']."';";
    $result = mysqli_query($connection,$query);
    if($result)
        echo 1;
    else
        echo $connection->error;
}
mysqli_close($connection)
?>