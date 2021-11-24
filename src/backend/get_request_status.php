<?php
error_reporting(0);
$data = json_decode(file_get_contents('php://input'), true);
$connection = new mysqli("localhost","root","mysql");

mysqli_select_db($connection,"db_blood_bank");
if($connection->connect_error){
    echo "Connection failed";
}else{
    $json_data = array();
    $oArray = array("RBC"=>0,"WBC"=>0,"Platelets"=>0,"Plasma"=>0);
    $onArray = array("RBC"=>0,"WBC"=>0,"Platelets"=>0,"Plasma"=>0);
    $bArray = array("RBC"=>0,"WBC"=>0,"Platelets"=>0,"Plasma"=>0);
    $bnArray = array("RBC"=>0,"WBC"=>0,"Platelets"=>0,"Plasma"=>0);
    $aArray = array("RBC"=>0,"WBC"=>0,"Platelets"=>0,"Plasma"=>0);
    $anArray = array("RBC"=>0,"WBC"=>0,"Platelets"=>0,"Plasma"=>0);
    $abArray = array("RBC"=>0,"WBC"=>0,"Platelets"=>0,"Plasma"=>0);
    $abnArray = array("RBC"=>0,"WBC"=>0,"Platelets"=>0,"Plasma"=>0);
    $query="select Blood_Group,Category,Quantity from requests where Status='Pending' and Requesting_BankID='".$data['bankId']."';";
    $result =  mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($result)){
       switch($row['Blood_Group']){
           case "A+":
                $aArray[$row['Category']] += $row['Quantity'];break;
            case "B+":
                $bArray[$row['Category']] += $row['Quantity'];break;
            case "AB+":
                $abArray[$row['Category']] += $row['Quantity'];break;
            case "O+":
                $oArray[$row['Category']] += $row['Quantity'];break;
            case "A-":
                $anArray[$row['Category']] += $row['Quantity'];break;
            case "B-":
                $bnArray[$row['Category']] += $row['Quantity'];break;
            case "AB-":
                $abnArray[$row['Category']] += $row['Quantity'];break;
            case "O-":
                $onArray[$row['Category']] += $row['Quantity'];break;
            
       }
    }
    $json_data = array(
        "A+"=>$aArray,"A-"=>$anArray,"B+"=>$bArray,"B-"=>$bnArray,"AB+"=>$abArray,"AB-"=>$abnArray,"O+"=>$oArray,"O-"=>$onArray
    );
    echo json_encode($json_data);
}
mysqli_close($connection)
?>