<?php
    require_once 'models/categories_model.php';
?>

<!-- 
    <style>
    .btn-save-product {
        width: 200px;
    }
</style>

<form action="add_product_.php" method="post" id="frm1">
    <h2>THÊM SẢN PHẨM</h2>
    <div> 
        <label>Tên sản phẩm</label>
        <input type="text" class="txt" name="tensp">
    </div>
    <div> 
        <label>Tên loại</label>
        <select name="loaisp">
        <?php
            // $list_name_type_of_product = get_all_name_kinds();
            // foreach($list_name_type_of_product as $row) {
        ?>
                    <option value="<?=$row['id_loai']?>"><?=$row['ten_loai']?></option>'
        <?php 
            // } 
        ?>
        </select>
    </div>
    <div> 
        <label>Giá</label>
        <input type="text" class="txt" name="gia">
    </div>
    <div> 
        <label>Ẩn hiện</label>
        <input type="radio" value="0" name="anhien"> Ẩn
        <input type="radio" value="1" name="anhien" checked> Hiện
    </div>
    <div>
        <label></label>
        <button type="submit" class="btn-save-product" name="btn">Lưu thông tin san pham</button>
    </div>
</form>
 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports World</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- OWL Car -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- Showmore css -->
    <link rel="stylesheet" href="css/showMoreItems-theme.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <!-- Logout Modal -->
    <div class="modal fade" id="logout">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title">Do You Really Want to Leave?</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <!-- <div class="modal-body">
                    <h5>Press Logout to leave</h5>
                </div> -->
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-light">Stay Here</button>
                    <button type="button" class="btn btn-danger">Logout</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Logout Modal Ends -->

    <!-- Add Product -->
    <section>
        <div class="container-fluid">
            <div class="row ">
            <div class="app-main">
            <nav class="sidebar bg-primary">
                <ul>
                    <li>
                        <a href="index.php?page=home"><i class="fa-solid fa-house ico-side"></i>Dashboards</a>
                    </li>
                    <li>
                        <a href="index.php?page=order"><i class="fa-solid fa-cart-shopping ico-side"></i>Quản lí đơn hàng</a>
                    </li>
                    <li>
                        <a href="index.php?page=categories"><i class="fa-solid fa-folder-open ico-side"></i>Quản lí danh mục</a>
                    </li>
                    <li>
                        <a href="index.php?page=products"><i class="fa-solid fa-mug-hot ico-side"></i>Quản lí sản phẩm</a>
                    </li>
                    <li>
                        <a href="index.php?page=users"><i class="fa-solid fa-user ico-side"></i>Quản lí khách hàng</a>
                    </li>
                    <li>
                        <a href="index.php?page=comments"><i class="fa-solid fa-user ico-side"></i>Quản lí bình luận</a>
                    </li>
                    <li>
                        <a href="index.php?page=logout"><i class="fa-solid fa-user ico-side"></i>Đăng Xuất</a>
                    </li>
                </ul>
            </nav>
                <div class="col-lg-10 col-md-8 ml-auto">
                    <div class="row align-items-center pt-md-5 mt-md-5 mb-5">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-title text-center mt-3">
                                    <h3>Add Product</h3>
                                </div>
                                <div class="card-body">
                                    <form action="">
                                        <div class="form-group">
                                            <label for="productname">Product Name:</label>
                                            <input type="text" class="form-control" id="productname"
                                                placeholder="Enter Product Name">
                                            <div class="invalid-feedback">Product Name Can't Be Empty</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="productid">Product Id:</label>
                                            <input type="text" class="form-control" id="productid"
                                                placeholder="Enter Product Id">
                                            <div class="invalid-feedback">Product ID Can't Be Empty</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="productprice">Product Price:</label>
                                            <input type="text" class="form-control" id="productprice"
                                                placeholder="Enter Product Price">
                                            <div class="invalid-feedback">Product Price Can't Be Empty</div>

                                        </div>
                                        <button class="btn btn-dark mt-5 mx-auto d-block" type="submit">Add
                                            Product</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- Bootstrap js -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <!-- OWL Car -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Show More js -->
    <script src="js/showMoreItems.min.js"></script>


    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- Theme js -->
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>