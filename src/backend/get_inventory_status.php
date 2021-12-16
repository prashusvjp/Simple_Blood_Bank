<?php
error_reporting(0);
$data = json_decode(file_get_contents('php://input'), true);
$connection = new mysqli("localhost","root","mysql");
/*If you are using XAMPP for MySQL then edit the previous line as new mysqli("localhost","root","") */

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
    $query="select Blood_Group,Category from inventory where Status='In-stock' and BankID='".$data['bankId']."';";
    $result =  mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($result)){
       switch($row['Blood_Group']){
           case "A+":
                $aArray[$row['Category']] += 1;break;
            case "B+":
                $bArray[$row['Category']] += 1;break;
            case "AB+":
                $abArray[$row['Category']] += 1;break;
            case "O+":
                $oArray[$row['Category']] += 1;break;
            case "A-":
                $anArray[$row['Category']] += 1;break;
            case "B-":
                $bnArray[$row['Category']] += 1;break;
            case "AB-":
                $abnArray[$row['Category']] += 1;break;
            case "O-":
                $onArray[$row['Category']] += 1;break;
            
       }
    }
    $json_data = array(
        "A+"=>$aArray,"A-"=>$anArray,"B+"=>$bArray,"B-"=>$bnArray,"AB+"=>$abArray,"AB-"=>$abnArray,"O+"=>$oArray,"O-"=>$onArray
    );
    echo json_encode($json_data);
}
mysqli_close($connection)
?>