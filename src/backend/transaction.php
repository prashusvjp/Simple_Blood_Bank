<?php
error_reporting(0);
$data = json_decode(file_get_contents('php://input'), true);

$connection = new mysqli("localhost","root","mysql");

mysqli_select_db($connection,"db_blood_bank");
if($connection->connect_error){
    echo "Connection failed";
}else{
        $query = "select count(*) as count from transactions";
        $result = mysqli_query($connection,$query);
        $t_count = mysqli_fetch_array($result)['count'];
       ++$t_count;
       $query = "insert into bank_staff values".
       "('T".$t_count."','".$data['reqId']."','".$data['fbankId']."','".$data['tbankId']."','".$data['total_amount']."','".$data['date']."');";
        $result = mysqli_query($connection,$query);
        if($result){
            $query = "update inventory set Status='Sold',TransactionID='T".$t_count."' where StockID in 
            (select StockID from inventory where Status='In-stock' and Blood_Group='".$data['bgroup']."' 
            and Category ='".$data['category']."' limit ".$data['quantity'].";";
            $result = mysqli_query($connection,$query);
        
            if($result){
                $query = "update requests set Status='Complete' where RequestID='".$data['reqId']."';";
                $result = mysqli_query($connection,$query);
            }else
                echo $connection->error;
        }else
            echo $connection->error;
}
?>