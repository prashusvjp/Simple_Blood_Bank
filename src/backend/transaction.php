<?php
error_reporting(0);
$data = json_decode(file_get_contents('php://input'), true);

$connection = new mysqli("localhost","root","mysql");
/*If you are using XAMPP for MySQL then edit the previous line as new mysqli("localhost","root","") */

mysqli_select_db($connection,"db_blood_bank");
if($connection->connect_error){
    echo "Connection failed";
}else{
        $query = "select count(*) as count from transactions";
        $result = mysqli_query($connection,$query);
        $t_count = mysqli_fetch_array($result)['count'];
       ++$t_count;
       $query = "insert into transactions values".
       "('T".$t_count."','".$data['reqId']."','".$data['fbankId']."','".$data['tbankId']."','".$data['total_amount']."','".$data['date']."');";
        $result = mysqli_query($connection,$query);
        if($result){
            $query = "select StockID from inventory where Status='In-stock' and Blood_Group='".$data['bgroup']."' 
            and Category ='".$data['category']."' limit ".(int)$data['quantity'].";";
            $result = mysqli_query($connection,$query);
            $count = (int)$data['quantity'];
            while($count){
                $row=mysqli_fetch_assoc($result);
                $query = "update inventory set Status='Sold',TransactionID='T".$t_count."' where StockID ='".$row['StockID']."';";
                $result1 = mysqli_query($connection,$query);
                $count--;
            }
            if($result){
                $query = "update requests set Status='Complete' where RequestID='".$data['reqId']."';";
                $result = mysqli_query($connection,$query);
                if($result){
                    echo 1;
                }else{
                    echo $connection->error;
                }
            }else
                echo $connection->error;
        }else
            echo $connection->error;
}
?>