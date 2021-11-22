<?php
$data = json_decode(file_get_contents('php://input'), true);

$connection = new mysqli("localhost","root","mysql");

mysqli_select_db($connection,"db_blood_bank");
if($connection->connect_error){
    echo "Connection failed";
}else{
    $query = "select count(*) as count from bank_staff where EmailID='".$data['emailId']."';";
   $result = mysqli_query($connection,$query);
   $user_count = mysqli_fetch_array($result)['count'];
   if($user_count == 0){
        $query = "select count(*) as count from bank_staff";
        $result = mysqli_query($connection,$query);
        $user_count = mysqli_fetch_array($result)['count'];
       ++$user_count;
       $query = "insert into bank_staff values".
       "('S".$user_count."','".$data['bankId']."','".$data['name']."','".$data['emailId']."',
       '".$data['phoneNo']."','".$data['DOB']."','".$data['gender']."',
       '".$data['bgroup']."','".$data['address']."','".$data['password']."','".$data['role']."',
       '".implode("",$data['photo'])."','".$data['salary']."','Existing');";
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