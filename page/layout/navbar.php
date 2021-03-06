   <!DOCTYPE html>
   <html lang="en">

       <head>
           <meta charset="UTF-8">
           <meta http-equiv="X-UA-Compatible" content="IE=edge">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
               integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
               crossorigin="anonymous" referrerpolicy="no-referrer" />
           <link rel="stylesheet" href="../../lib/bootstrap/css/bootstrap.css">
           <script src="../../lib/bootstrap/js/bootstrap.bundle.js" defer></script>
           <link rel="stylesheet" href="../style/main.css">
           <title>Document</title>
       </head>

       <body>
           <div class="navbar">

               <div class="navbar-icon-logo">
                   <a href="http:/ntstore/page/overview.php">
                       <img src="../assets/img/ntstore_v2.jpg" alt="" srcset="">

                   </a>
               </div>
               <div class="navbar-list">
                   <a <?php  
                   
                            if($_SERVER['SCRIPT_NAME']=="/ntstore/page/overview.php") { 
                                
                                
                    ?> class="link-active item p-l-12 flex-center" <?php  
                    
                    } 
                    
                    
                    ?> class="item p-l-12 flex-center" href="overview.php">



                       <div class="over-view-icon icon-base"></div>
                       <div class="over-view m-l-8 text">Tổng quan</div>
                   </a>
                   <a <?php  if($_SERVER['SCRIPT_NAME']=="/ntstore/page/product.php") {?>
                       class="link-active item p-l-12 flex-center" <?php } ?> class="item p-l-12 flex-center"
                       href="product.php">
                       <div class="category-icon icon-base"></div>
                       <div class="category m-l-8 text">
                           Sản phẩm
                       </div>
                   </a>
                   <a <?php  if($_SERVER['SCRIPT_NAME']=="/ntstore/page/category.php") {?>
                       class="link-active item p-l-12 flex-center" <?php } ?> class="item p-l-12 flex-center"
                       href="category.php">
                       <div class="category-icon icon-base"></div>
                       <div class="category m-l-8 text">
                           Danh mục sản phẩm
                       </div>
                   </a>
                   <a <?php  if($_SERVER['SCRIPT_NAME']=="/ntstore/page/invoice.php") {?>
                       class="link-active item p-l-12 flex-center" <?php } ?> class="item p-l-12 flex-center"
                       href="invoice.php">
                       <div class="bill-icon icon-base"></div>
                       <div class="bill m-l-8 text">
                           Hóa đơn
                       </div>
                   </a>
                   <a <?php  if($_SERVER['SCRIPT_NAME']=="/ntstore/page/employee.php") {  ?>
                       class="link-active item p-l-12 flex-center" <?php   }  ?> class="item p-l-12 flex-center"
                       href="employee.php">
                       <div class="employee-icon icon-base"></div>
                       <div class="employee m-l-8 text">
                           Nhân viên
                       </div>
                   </a>
                   <a <?php if($_SERVER['SCRIPT_NAME']=="/ntstore/page/customer.php") { ?>
                       class="link-active item p-l-12 flex-center" <?php   }  ?> class="item p-l-12 flex-center "
                       href="customer.php">
                       <div class="customer-icon icon-base"></div>
                       <div class="customer m-l-8 text">
                           Khách hàng
                       </div>
                   </a>
                   <a <?php if($_SERVER['SCRIPT_NAME']=="/ntstore/page/manufacture.php") { ?>
                       class="link-active item p-l-12 flex-center" <?php   }  ?> class="item p-l-12 flex-center "
                       href="manufacture.php">
                       <div class="manufacture-icon icon-base"></div>
                       <div class="manufacture m-l-8 text">
                           Nhà cung cấp
                       </div>
                   </a>
                   <a <?php if($_SERVER['SCRIPT_NAME']=="/ntstore/page/report.php") { ?>
                       class="link-active item p-l-12 flex-center" <?php   }  ?> class="item p-l-12 flex-center "
                       href="report.php">
                       <div class="report-icon icon-base"></div>
                       <div class="report m-l-8 text">
                           Báo cáo
                       </div>
                   </a>
                   <a class="item p-l-12 flex-center " href="/ntstore/frontend">
                       <div class="sell-interface icon-base"></div>
                       <div class="report m-l-8 text">
                           GD bán hàng
                       </div>
                   </a>
               </div>

           </div>
           </div>
           <script type="text/javascript" src="../../script/components/navbar.js"></script>
       </body>
       <style>
       .navbar-icon-logo {
           width: 184px;
           height: 60px;
           margin-left: 12px;
           margin-top: 4px;
           cursor: pointer;
       }

       .navbar-icon-logo img {
           width: 100%;
           height: 100%;
       }

       .navbar-list {
           margin-top: 10px;
       }
       </style>

   </html>