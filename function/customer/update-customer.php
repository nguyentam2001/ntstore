<?php
  require '../../utilities/check-error.php';    
  require '../../database/connect_db.php'; //kết nối cơ sở dữ liệu
  // define variables and set to empty values
  $CustomerCode=$CustomerName=$PhoneNumber=$DateOfBirth=$Email=$Address="";
  $Gender=0;
  $CustomerID=0;
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!empty($_POST["CustomerID"])){
        $CustomerID =$_POST["CustomerID"];
    }
      if(!empty($_POST["CustomerCode"])){
           $CustomerCode=$_POST["CustomerCode"];
      }
      if(!empty($_POST["CustomerName"])){
          $CustomerName=$_POST["CustomerName"];
     }
     if(!empty($_POST["Gender"])){
      $Gender=$_POST["Gender"];
 }
 if(!empty($_POST["PhoneNumber"])){
  $PhoneNumber=$_POST["PhoneNumber"];
}
if(!empty($_POST["DateOfBirth"])){
  $DateOfBirth=$_POST["DateOfBirth"];
}
if(!empty($_POST["Email"])){
  $Email=$_POST["Email"];
}
if(!empty($_POST["Address"])){
  $Address=$_POST["Address"];
}
      $database=new Database();
        $database->connect_db();//kết nối database
        //Thực hiện câu lệnh truy vấn
        $query="UPDATE customer SET CustomerCode='".$CustomerCode."', Address='".$Address."', PhoneNumber='".$PhoneNumber."', Email='".$Email."', Gender='".$Gender."', DateOfBirth='".$DateOfBirth."', CustomerName='".$CustomerName."' WHERE CustomerID=$CustomerID";
        $data= mysqli_query($database->conn,$query);
          if($data==TRUE){
              echo json_encode(array("data"=>"Success"));
          }
        $database->close_db();//ngắt kết nối database
  }

?>