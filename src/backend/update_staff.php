<?php
error_reporting(0);
$data = json_decode(file_get_contents('php://input'), true);

$connection = new mysqli("localhost","root","mysql");
/*If you are using XAMPP for MySQL then edit the previous line as new mysqli("localhost","root","") */
mysqli_select_db($connection,"db_blood_bank");
if($connection->connect_error){
    echo "Connection failed";
}else{
    $query = "update bank_staff 
    set EmailID='".$data['emailId']."',Staff_Name='".$data['name']."',PhoneNo='".$data['phoneNo']."',
    Gender='".$data['gender']."',Address='".$data['address']."',Role='".$data['role']."',
    salary='".$data['salary']."',status='".$data['status']."',Photo='".$data['photo']."' where StaffID='".$data['staffId']."';";
    $result = mysqli_query($connection,$query);
    if($result)
        echo 1;
    else
        echo $connection->error;
}
mysqli_close($connection)
?>