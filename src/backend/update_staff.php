<?php
error_reporting(0);
$data = json_decode(file_get_contents('php://input'), true);

$connection = new mysqli("localhost","root","mysql");

mysqli_select_db($connection,"db_blood_bank");
if($connection->connect_error){
    echo "Connection failed";
}else{
    $query = "update bank_staff 
    set(Staff_Name='".$data['name']."',PhoneNo='".$data['phoneNo']."',
    Gender='".$data['gender']."',Address='".$data['address']."',Role='".$data['role']."',
    salary='".$data['salary']."',status='".$data['status']."',Photo='".$data['photo']."');";
    $result = mysqli_query($connection,$query);
    if($result)
        echo 1;
    else
        echo 0;
}
mysqli_close($connection)
?>