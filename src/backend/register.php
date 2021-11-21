<?php
$data = json_decode(file_get_contents('php://input'), true);
echo $data['emailId']."\n".$data['password'];
$create_user = "create user ".$data['emailId']." identified by '".$data['password']."';";

$initial_query = "create if not exists table Blood_Bank(
    BankID varchar(20) primary key,
    Bank_Name varchar(20) not null,
    EmailID varchar(50) not null,
    PhoneNo bigint not null,
    Address varchar(50) not null,
    Start_Date date not null,
    Status varchar(20) not null);";

$connection = new mysqli("localhost","root","mysql");
if($connection->connect_error){
    echo "Connection failed";
}else{
    echo "Connection established\n";
    mysqli_query($connection,$create_user);
}
?>