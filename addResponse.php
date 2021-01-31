<?php
header('Access-Control-Allow-Origin','*');
$informationMessage =""; // Update the status or any kind of query
$requestData = "";// used to get data from the Frontend
$responseData = new \stdClass();
$databaseConnectionStatus = "";
$databaseMessage = "";

$serverName ="localhost";
$databaseName ="portfolio";
$tableName = "portfoliowebsite";
$username ="root";
$password = "";
if(isset($_POST)){
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];

    $connection = new mysqli($serverName,$username,$password,$databaseName);

    if($connection->connect_errno){
        $databaseMessage = $connection->connect_error;
        $databaseConnectionStatus = "false";
        $informationMessage="500 Internal Server Error";
    }else{
        $databaseMessage = $connection->connect_error;
        $databaseConnectionStatus = "true";

       $insert = "INSERT INTO $tableName VALUES ('','$Name','$Email','$Phone')";
       if($connection->query($insert)){
        $informationMessage="Data Added Successfully";
       }else{
        $informationMessage="Error";
       }
    }
}else{
    $informationMessage = "No Data";
    $requestData = "Wrong Path";
    $databaseConnectionStatus ="false";
    $databaseMessage ="Check the path";
}

$responseData->status = $databaseConnectionStatus;
$responseData->msg = $databaseMessage;
$responseData->info = $informationMessage;
$responseData->data = "Null";

echo json_encode($responseData,JSON_PRETTY_PRINT);


?>