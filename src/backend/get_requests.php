<?php
error_reporting(0);
$data = json_decode(file_get_contents('php://input'), true);
$connection = new mysqli("localhost","root","mysql");

mysqli_select_db($connection,"db_blood_bank");
if($connection->connect_error){
    echo "Connection failed";
}else{
    $query = "select * from requests;";
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
mysqli_close($connection)
?>