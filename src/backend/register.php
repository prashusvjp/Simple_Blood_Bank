<?php
$data = json_decode(file_get_contents('php://input'), true);

$connection = new mysqli("localhost","root","mysql");
mysqli_select_db($connection,"db_blood_bank");
if($connection->connect_error){
    echo "Connection failed";
}else{
   $query = "select count(*) as count from blood_bank where EmailID='".$data['emailId']."';";
   $result = mysqli_query($connection,$query);
   $user_count = mysqli_fetch_array($result)['count'];
   if($user_count == 0){
        $query = "select count(*) as count from blood_bank";
        $result = mysqli_query($connection,$query);
        $user_count = mysqli_fetch_array($result)['count'];
       ++$user_count;
       $query = "insert into blood_bank values".
       "('".$user_count."','".$data['name']."','".$data['emailId']."','".$data['phoneNo']."',
       '".$data['address']."','".$data['startDate']."','Open','".$data['password']."');";
    $result = mysqli_query($connection,$query);
    echo $result;
    if($result)
        echo 1;
    else
        echo 0;
   }else{
       echo -1;
   }
}
?>