<?php
$CustomerID=$_POST["id"];
require '../../database/connect_db.php'; //kết nối cơ sở dữ liệu
$database=new Database();
$database->connect_db();//kết nối database
//Thực hiện câu lệnh truy vấn
$query="SELECT * FROM customer WHERE CustomerID=$CustomerID";
$data=$database->getData($query);
  if($data==TRUE){
      echo json_encode($data);
  }
$database->close_db();//ngắt kết nối database
?>