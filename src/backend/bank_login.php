<?php
error_reporting(0);
$data = json_decode(file_get_contents('php://input'), true);

$connection = new mysqli("localhost","root","mysql");
/*If you are using XAMPP for MySQL then edit the previous line as new mysqli("localhost","root","") */
mysqli_select_db($connection,"db_blood_bank");
if($connection->connect_error){
    echo "Connection failed";
}else{
   $query = "select BankID as ID from blood_bank where EmailID='".$data['emailId'].
   "' and Password='".$data['password']."';";
   $result = mysqli_query($connection,$query);
   $user_count = mysqli_fetch_array($result)['ID'];
   if($user_count)
        echo $user_count;
    else
        echo 0;
}