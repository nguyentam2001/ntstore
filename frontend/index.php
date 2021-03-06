<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
            integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
            rel="stylesheet" />
        <link rel="shortcut icon" href="../assets/img/logo-tab.jpg" />
        <title>ntstore</title>
        <link rel="stylesheet" href="./assest/css/base.css" />
        <link rel="stylesheet" href="./assest/css/main.css" />
        <link rel="stylesheet" href="./assest/css/grid.css" />
        <link rel="stylesheet" href="./assest/css/responsive.css" />
        <link rel="stylesheet" href="./assest/font/fontawesome-free-5.15.3-web/css/all.min.css" />
    </head>

    <body>
        <div class="app">
            <?php
           require_once "./layout/header.php"
           ?>
            <div class="app__container">
                <div class="grid wide">
                    <div class="slider">
                        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">

                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item carousel-item-one active" data-bs-interval="2000">
                                </div>
                                <div class="carousel-item  carousel-item-two" data-bs-interval="2000">
                                </div>
                                <div class="carousel-item carousel-item-three">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="row app__content">
                        <div class="col l-2 nt-m-3 nt-overflow-scroll c-12">
                            <nav class="category">
                                <h3 class="category__heading">
                                    <i class="category__heading-icon fas fa-list"></i>Danh m???c
                                </h3>
                                <ul class="category-list">
                                    <li class="category-item">
                                        <a href="/ntstore/frontend/" class="category-item__link">T???t c??? s???n ph???m</a>
                                    </li>
                                    <?php
                                    require_once '../utilities/check-error.php';
                                    require_once '../database/connect_db.php';
                                    $db = new Database();
                                    $db->connect_db(); //k???t n???i database
                                    $query = "SELECT * from category";
                                    $data = $db->getData($query);
                                    $db->close_db();
                                    for ($i=0; $i < count($data) ; $i++) { 
                                        if(isset($_GET["categoryID"]) && $_GET["categoryID"]==$data[$i]["CategoryID"]){
                                            echo '
                                            <li class="category-item">
                                            <a href="/ntstore/frontend/?categoryID='.$data[$i]["CategoryID"].'" class="category-item__link category-item--active">'.$data[$i]["CategoryName"].'</a>
                                            </li>
                                        ';
                                        }else{
                                             echo '
                                            <li class="category-item">
                                            <a href="/ntstore/frontend/?categoryID='.$data[$i]["CategoryID"].'" class="category-item__link">'.$data[$i]["CategoryName"].'</a>
                                            </li>
                                        ';
                                        }
                                       
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                        <div class="col l-10 m-9 c-12">
                            <div class="home-filter">
                                <span class="home-filter__label hide-on-mobile">S???p x???p theo</span>
                                <!-- <button class="btn home-filter__btn btn--primary">
                                    M???i nh???t
                                </button>
                                <button class="btn home-filter__btn">B??n ch???y</button> -->
                                <form method="POST" action="">
                                    <select style="font-size: 1.4rem; outline: none; border: none;" name="price"
                                        class="select-input hide-on-mobile" onchange="this.form.submit()">
                                        <option value="" disabled selected>--L???c s???n ph???m--</option>
                                        <option value="asc">Gi??: Th???p ?????n cao</option>
                                        <option value="desc">Gi??: Cao ?????n th???p</option>
                                    </select>
                                </form>
                            </div>
                            <div class="home-product">
                                <!-- <div class="grid"> -->
                                <div class="row">
                                    <!-- item 1 -->
                                    <!-- product-item -->
                                    <?php
                                        $db = new Database();
                                        $db->connect_db(); //k???t n???i database
                                        

                                        //L???y id ????? l???c category theo s???n ph???m
                                        $CategoryID='NULL';
                                        if(isset( $_GET['categoryID']) && $_GET['categoryID']){
                                            
                                            $CategoryID = $_GET['categoryID'];
                                        }
                                        $query=" SELECT * From product WHERE $CategoryID IS NOT NULL AND CategoryID = $CategoryID OR $CategoryID IS NULL";
                                        //T??m ki???m s???n ph???m
                                        
                                        if(isset($_GET["search"])&& $_GET["search"]){
                                            $search = $_GET['search'];
                                            $query = "SELECT * from product WHERE '$search' IS NOT NULL AND ProductName  LIKE CONCAT ('%$search%') OR '$search' IS NULL";
                                        }


                                        //L???c theo t??ng gi???m gi?? th??nh 
                                        if(isset($_POST['price'])&& $_POST['price']){
                                            if($_POST['price']=='asc'){
                                                //s???p x???p t??ng d???n
                                                $query=" SELECT * From product WHERE $CategoryID IS NOT NULL AND CategoryID = $CategoryID OR $CategoryID IS NULL ORDER BY ExportPrice ASC";
                                            }else{
                                                //s???p x???p gi???m d???n
                                                $query=" SELECT * From product  WHERE $CategoryID IS NOT NULL AND CategoryID = $CategoryID OR $CategoryID IS NULL ORDER BY ExportPrice DESC";
                                            }
                                        }

                                        $data = $db->getData($query);
                                        $db->close_db();
                                        for ($i=0; $i < count($data) ; $i++) { 
                                            echo '
                                            <div class="col l-2-4 nt-m-4 c-6">
                                            <div class="home-product-item" >
                                            
                                            <a href="product.php?productID='.$data[$i]["ProductID"].'">
                                            <div class="home-product-item__img" style="
                          background-image: url(../assets/img/items/'.$data[$i]['Image'].');


                        "></div>
                                                </a>
                                            <div class="home-product-item__body">
                                                <h4 class="home-product-item__description" title='.$data[$i]['ProductName'].'>
                                                    '.$data[$i]['ProductName'].'
                                                </h4>
                                                <div class="home-product-item__price">
                                                    <span class="home-product-item__price-current">'.number_format($data[$i]["ExportPrice"], 0, '', ',').'??</span>
                                                </div>
                                                <div class="home-product-item__action">
                                                    <span
                                                        class="home-product-item__like home-product-item__like--liked">
                                                        <i class="home-product-item__like-icon-empty far fa-heart"></i>
                                                        <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                                                    </span>
                                                    <div class="home-product-item__sale-rate">
                                                        <div class="home-product-item__rating">
                                                            <i class="home-product-item__star--gold fas fa-star"></i>
                                                            <i class="home-product-item__star--gold fas fa-star"></i>
                                                            <i class="home-product-item__star--gold fas fa-star"></i>
                                                            <i class="home-product-item__star--gold fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <div class="home-product-item__sold">
                                                            S??? l?????ng
                                                            <span class="home-product-item__sold--amount">'.$data[$i]['Quality'].'</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="home-product-item__origin">
                                                    <span class="home-product-item__brand">NTstore</span>

                                                    <form method="POST" action="/ntstore/frontend/cart.php">

                                                    <input type="hidden" type="text" readonly name="quantityPick" value="1" class="item-body__oder-amount item-body__oder-current"/>
                                                    <input type="hidden"  name="ProductID" value='.$data[$i]["ProductID"].'>
                                                    <input type="hidden"  name="CategoryID" value='.$data[$i]["CategoryID"].'>
                                                    <input type="hidden"  name="ProductName" value='.$data[$i]["ProductName"].'>
                                                    <input type="hidden"  name="ExportPrice" value='.$data[$i]["ExportPrice"].'>
                                                    <input type="hidden"  name="ProductImage" value='.$data[$i]["Image"].'>
                                                    <button  onclick="return checkform()"  style="border: none; background: #fff;" type="submit"  id="buyNow" name="add-cart" value="add-cart-index" >
                                                        <span  class="home-product-item__origin-name"><i style="color: red;
                                                        font-size: 12px; cursor: pointer;" class="header__cart-icon fas fa-cart-plus"></i></span>
                                                    </button>
                                                </form>
                                                </div>
                                            </div>
                                            <span class="home-product-item__favourite">
                                                <span>Y??u th??ch</span>
                                            </span>
                                            <div class="home-product-item__sale-off">
                                                <span class="home-product-item__sale-off-percent">40%</span>
                                                <span class="home-product-item__sale-off-label">GI???M</span>
                                            </div>
                                        </div>
                                        </div>
                                            ';
                                        }
                                        ?>
                                </div>
                                <!-- </div> -->
                            </div>
                            <!-- <ul class="pagination home-product__pagination">
                                <li class="pagination-item">
                                    <a href="" class="pagination-item__link">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                </li>
                                <li class="pagination-item">
                                    <a href="" class="pagination-item__link pagination-item__link-action">1</a>
                                </li>

                                <li class="pagination-item">
                                    <a href="" class="pagination-item__link">2</a>
                                </li>
                                <li class="pagination-item">
                                    <a href="" class="pagination-item__link">3</a>
                                </li>
                                <li class="pagination-item">
                                    <a href="" class="pagination-item__link">4</a>
                                </li>
                                <li class="pagination-item">
                                    <a href="" class="pagination-item__link">5</a>
                                </li>
                                <li class="pagination-item">
                                    <a href="" class="pagination-item__link">6</a>
                                </li>
                                <li class="pagination-item">
                                    <a href="" class="pagination-item__link">...</a>
                                </li>
                                <li class="pagination-item">
                                    <a href="" class="pagination-item__link">14</a>
                                </li>
                                <li class="pagination-item">
                                    <a href="" class="pagination-item__link">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="NTstore-footer-before"></div>
            <?php
            require_once "./layout/footer.php"
            ?>
        </div>
        <!-- ---modal---- -->
        <div class="modal modal-hide">
            <div class="modal__overlay"></div>
            <div class="modal__body">
                <!-- menu mobile form -->
                <div class="menu-mobile-form">
                    <ul class="menu-items-mobile">
                        <li class="menu-item-mobile">
                            <a href="#" class="menu-item-mobile__link">
                                <i class="menu-item-mobile__icon far fa-bell"></i>
                                Th??ng b??o
                            </a>
                        </li>
                        <li class="menu-item-mobile">
                            <a href="#" class="menu-item-mobile__link">
                                <i class="menu-item-mobile__icon far fa-question-circle"></i>
                                Tr??? gi??p
                            </a>
                        </li>
                        <li class="menu-item-mobile">
                            <a href="#" class="menu-item-mobile__link">
                                <i class="menu-item-mobile__icon far fa-user-circle"></i>
                                T??i Kho???n c???a t??i
                            </a>
                        </li>
                        <li class="menu-item-mobile">
                            <a href="#" class="menu-item-mobile__link">
                                <i class="menu-item-mobile__icon fas fa-sign-in-alt"></i>
                                ????ng Nh???p
                            </a>
                        </li>
                        <li class="menu-item-mobile">
                            <a href="#" class="menu-item-mobile__link">
                                <i class="menu-item-mobile__icon fas fa-sign-out-alt"></i>
                                ????ng xu???t
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <script src="./assest/js/menu/menu_mobile.js"></script>
        <script src="../lib/bootstrap/js/bootstrap.js"></script>
        <script src="../lib/jquery/jquery.js"></script>


    </body>
    <style>
    .carousel-item {
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        height: 38vh;
    }

    .carousel-item-one {
        background-image: url("./assest/img/img_vartar/banner1.jpg");

    }

    .carousel-item-two {
        background-image: url("./assest/img/img_vartar/banner4.jpg");

    }

    .carousel-item-three {
        background-image: url("./assest/img/img_vartar/banner2.png");

    }
    </style>

</html>