<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../style/main.css">
  <link rel="shortcut icon" href="../assets/img/logo-tab.jpg" />
  <title>ntstore</title>
</head>

<body>
  <?php
  require_once "./layout/navbar.php";
  require_once "./layout/header.php"
  ?>

  <div class="content p-l-24 p-r-24 p-t-24 ">
    <div class="content-header p-b-24 justify-between">
      <div class="left">
        Khách hàng
      </div>
      <div class="right flex-center">
        <div class="search m-r-24">
          <form action="customer.php" method="GET">
            <button class="icon-search icon-24" type="submit"></button>
            <input type="text" class="input-search" name="search" id="searchText" placeholder="Tên khách hàng...">
          </form>
        </div>
        <div class="t-btn-wrapper">
          <button type="button" id="addCustomer" class="btn btn-warning"> <i class="fa-solid fa-user-plus"></i>Thêm</button>
        </div>
      </div>
    </div>
    <div class="table-wraper p-l-24 p-r-24 ">
      <?php
      $search = $_GET['search'];
      require '../utilities/check-error.php';
      require '../database/connect_db.php';
      require_once "../utilities/gender.php";
      $db = new Database();
      $db->connect_db(); //kết nối database
      $query = "SELECT * from customer WHERE '$search' IS NOT NULL AND CustomerName  LIKE CONCAT ('%$search%') OR '$search' IS NULL";
      $data = $db->getData($query);
      $db->close_db();
      //bind dữ liệu ra bảng
      if (count($data) > 0) {
        echo '
            <table id="CustomerTable" class="table table-hover">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã KH</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">Email</th>
                <th scope="col">Giới Tính</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Ngày Sinh</th>
                <th scope="col">Địa chỉ khách hàng</th>
                <th scope="col " class="max-w-100">Chức năng</th>
              </tr>
            </thead>
            <tbody>
            ';

        for ($i = 0; $i < count($data); $i++) {
          echo '
         <tr>
         <th scope="row">' . ($i + 1) . '</th>
         <td>' . $data[$i]['CustomerCode'] . '</td>
         <td>' . $data[$i]['CustomerName'] . '</td>
         <td>' . $data[$i]['Email'] . '</td>
         <td>' . gender($data[$i]['Gender']) . '</td>
         <td>' . $data[$i]['PhoneNumber'] . '</td>
          <td>' . date("d/m/Y", strtotime($data[$i]['DateOfBirth'])) . '</td>
         <td>' . $data[$i]['Address'] . '</td>
         <td>
             <div class="table-function">
             <div class="btn-update" value ="' . $data[$i]['CustomerID'] . '">Sửa</div>
              <div class="btn-delete" name="' . $data[$i]['CustomerName'] . '" value ="' . $data[$i]['CustomerID'] . '">Xóa</div>
             </div>
         </td>
        </tr>
         ';
        }
        echo '
            </tbody>
            </table>
            ';
      } else {
        echo '
            <div class="empty_state">
              <h1 class="">Dữ liệu trống</h1>
              <p>Không có dữ liệu liên hệ admin để biết thêm chi tiết</p>
            </div>
            ';
      }
      ?>

    </div>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
      <div id="toastSuccess" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <i class="fa-solid fa-circle-check toast-icon"></i>
          <strong class="me-auto toast-message"></strong>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalDelCustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Xóa Khách hàng</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body modal-messenger">
            Bạn có muốn xóa Khách hàng này không?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
            <button type="button" class="btn btn-primary" id="btnDelCustomer">Đồng ý</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  require_once "./customer-detail.php"
  ?>
  <script src="../lib/bootstrap/js/bootstrap.js"></script>
  <script src="../lib/jquery/jquery.js"></script>
  <script type="text/javascript" src="../script/components/navbar.js"></script>
  <script src="../script/common/enum.js"></script>
  <script src="../script/common/common.js"></script>
  <script src="../script/common/toast.js"></script>
  <script type="text/javascript" src="../script/customer.js"></script>
</body>
<style>
  @import url(../style/components/input.css);
  @import url(../style/components/button.css);
  @import url(../style/components/table.css);
  @import url(../style/components/toast.css);
  @import url(../style/components/modal.css);
  @import url(../style/components/empty-state.css);

  .content {
    height: calc(100vh - var(--header));
    width: calc(100% - var(--navbar));
    background-color: #f4f5f8;
    float: right;
    display: flex;
    flex-direction: column;
  }

  .content-header .left {
    color: var(--black);
    font-size: 24px;
    font-weight: 700;
  }
</style>

</html>