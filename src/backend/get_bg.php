<?php
$data = json_decode(file_get_contents('php://input'), true);

$connection = new mysqli("localhost","root","mysql");
mysqli_select_db($connection,"db_blood_bank");
if($connection->connect_error){
    echo "Connection failed";
}else{
    $query = "select Blood_Group as bg from doner where DonerID='".$data['id']."';";
    $result = mysqli_query($connection,$query);
    if($result)
        echo mysqli_fetch_array($result)['bg'];
    else
        echo "";
}
?>