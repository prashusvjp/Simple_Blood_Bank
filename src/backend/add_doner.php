<?php
$data = json_decode(file_get_contents('php://input'), true);

$connection = new mysqli("localhost","root","mysql");

mysqli_select_db($connection,"db_blood_bank");
if($connection->connect_error){
    echo "Connection failed";
}else{
    $query = "select count(*) as count from doner where EmailID='".$data['emailId']."';";
   $result = mysqli_query($connection,$query);
   $user_count = mysqli_fetch_array($result)['count'];
   if($user_count == 0){
        $query = "select count(*) as count from doner";
        $result = mysqli_query($connection,$query);
        $user_count = mysqli_fetch_array($result)['count'];
       ++$user_count;
       $query = "insert into doner values".
       "('D".$user_count."','".$data['name']."','".$data['emailId']."',
       '".$data['phoneNo']."','".$data['DOB']."','".$data['gender']."',
       '".$data['bgroup']."','".$data['address']."','".implode("",$data['photo'])."');";
        $result = mysqli_query($connection,$query);
        if($result)
            echo 1;
        else
            echo $connection->error;
   }else{
       echo -1;
   }
   
}
?>