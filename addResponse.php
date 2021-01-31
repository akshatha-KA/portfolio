<html>
    <body>
<?php
  $nformationMessage ="";
  $requestData="";
  $responseData= new \stdClass();
  $databaseConnectionStatus ="";
  $databaseMessage="";

  $Name= $_POST['Name'];
  $Email= $_POST['Email'];
  $Phone= $_POST['Phone'];

  $servername = "localhost";
  $database = "portfolio";
  $tablename="portfoliowebsite";
  $username = "root";
  $password="";

  $connection = new mysqli($servername,$username,$password,$database);
  if($connection->connect_errno){
      $databaseMessage= $connection ->connect_error;
      $databaseConnectionStatus="false";
      $informationMessage= "500 Internal Server Error";
     }
  else
     {
        $insert = "INSERT INTO $tablename VALUES('','$Name','$Email','$Phone')";
      if($connection->query($insert)){
          $informationMessage = "Data Successfully added";
     }
      else
      {
          $informationMessage= "Error";
      }
  
  }
  header('Location:contact.html');
  exit;
?>
    </body>
</html>