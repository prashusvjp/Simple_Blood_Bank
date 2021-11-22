<?php
$data = json_decode(file_get_contents('php://input'), true);

$connection = new mysqli("localhost","root","mysql");
mysqli_select_db($connection,"db_blood_bank");
if($connection->connect_error){
    echo "Connection failed";
}else{
   $query = "select count(*) as count from blood_bank where EmailID='".$data['emailId'].
   "' and Password='".$data['password']."';";
   $result = mysqli_query($connection,$query);
   $user_count = mysqli_fetch_array($result)['count'];
   if($user_count != 0)
        echo 1;
    else
        echo 0;
}