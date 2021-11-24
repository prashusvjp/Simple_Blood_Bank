<?php
error_reporting(0);
$data = json_decode(file_get_contents('php://input'), true);
$connection = new mysqli("localhost","root","mysql");

mysqli_select_db($connection,"db_blood_bank");
if($connection->connect_error){
    echo "Connection failed";
}else{
    $query = "select req.RequestID as reqId,req.Blood_Group as bgroup,req.Category,req.Quantity,req.Requesting_BankID as bankId,
    bb.Bank_Name as bname,bb.Address as address 
    from requests as req, blood_bank as bb where req.Status='Pending' and req.Requesting_BankID<>'".$data['bankId']"';"
    $result = mysqli_query($connection,$query);
    $data = array();
    while($row =mysqli_fetch_assoc($result))
    {   
        $data[] = $row;
    }
    if(count($data)>0)
        echo json_encode($data);
    else
        echo 0;
}
mysqli_close($connection);
?>