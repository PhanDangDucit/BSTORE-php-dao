
<?php
    // id --> product
    if(isset($_GET['id']) == true) {
        $id = $_GET['id'];
        settype($id, 'int');
    } else $id = 1;
    if(isset($_GET['pageNum']) == true) {
        $pageNum = $_GET['pageNum'];
        settype($pageNum, 'int');
    } else $pageNum = 9;
    // fetch detail product
    $row = get_detail_products($id);
    $id_loai = 0;  
    $relatedProducts = getRelatedProducts($id_loai, $pageNum);
    $typeProduct = get_type_of_on_product($row['id_sp']);
?>

<style>
    .icon-hover:hover {
        border-color: #3b71ca !important;
        background-color: white !important;
        color: #3b71ca !important;
    }

    .icon-hover:hover i {
        color: #3b71ca !important;
    }
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>

<!-- content -->
<section class="py-5">
  <div class="container">
    <div class="row gx-5">
      <aside class="col-lg-6">
        <div class="border rounded-4 mb-3 d-flex justify-content-center">
            <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image">
                <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="<?php echo $row['hinh']; ?>" />
            </a>
        </div>
        <div class="d-flex justify-content-center mb-3">
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big1.webp" class="item-thumb">
                <img width="60" height="60" class="rounded-2" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big1.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big2.webp" class="item-thumb">
                <img width="60" height="60" class="rounded-2" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big2.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big3.webp" class="item-thumb">
                <img width="60" height="60" class="rounded-2" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big3.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big4.webp" class="item-thumb">
                <img width="60" height="60" class="rounded-2" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big4.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big.webp" class="item-thumb">
                <img width="60" height="60" class="rounded-2" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big.webp" />
            </a>
        </div>
        <!-- thumbs-wrap.// -->
        <!-- gallery-wrap .end// -->
      </aside>
        <main class="col-lg-6">
            <div class="ps-lg-3">
            <h4 class="title text-dark">
                <?php echo $row['ten_sp'];?>
            </h4>
                <div class="d-flex flex-row my-3">
                    <div class="text-warning mb-1 me-2">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span class="ms-1">4.5</span>
                    </div>
                    <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 orders</span>
                    <span class="text-success ms-2">In stock</span>
                </div>

                <div class="mb-3">
                    <span class="h5"><?php echo $row['gia'];?></span>
                    <span class="text-muted">/per box</span>
                </div>

                <div class="row">
                    <dt class="col-3">RAM:</dt>
                    <dd class="col-9"><?php echo $row['RAM']; ?></dd>
                    <dt class="col-3">Color</dt>
                    <dd class="col-9"><?php echo $row['Mausac']; ?></dd>
                    <dt class="col-3">Type</dt>
                    <dd class="col-9"><?php echo $typeProduct['ten_loai'];?></dd>
                </div>

            <hr />
            <div class="row mb-4">
                <form action="index.php?page=cart" class="w-full h-full" method="post">
                    <button type="submit" class="btn btn-primary shadow-0 col-lg-4" name="btn-add-cart">
                        <i class="me-1 fa fa-shopping-basket"></i> Add to cart
                    </button>
                    <input type="text" hidden name="id_sp" value="<?=$row['id_sp']?>"/>
                </form>
            </div>
        </main>
    </div>
  </div>
</section>

<!--                     -->
<!--    Description      -->
<!--                     -->
<!--                     -->

<section class="bg-light border-top py-4">
    <div class="container">
        <div class="row gx-4">
            <div class="col-lg-12 mb-4">
                <div class="border rounded-2 px-3 py-2 bg-white">
                <!-- Pills navs -->
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                    <li class="nav-item d-flex" role="presentation">
                    <a class="nav-link d-flex align-items-center justify-content-center w-100 active" id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab" aria-controls="ex1-pills-1" aria-selected="true">Specification</a>
                    </li>
                    <li class="nav-item d-flex" role="presentation">
                    <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-2" data-mdb-toggle="pill" href="#ex1-pills-2" role="tab" aria-controls="ex1-pills-2" aria-selected="false">Warranty info</a>
                    </li>
                    <li class="nav-item d-flex" role="presentation">
                    <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-3" data-mdb-toggle="pill" href="#ex1-pills-3" role="tab" aria-controls="ex1-pills-3" aria-selected="false">Shipping info</a>
                    </li>
                    <li class="nav-item d-flex" role="presentation">
                    <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-4" data-mdb-toggle="pill" href="#ex1-pills-4" role="tab" aria-controls="ex1-pills-4" aria-selected="false">Seller profile</a>
                    </li>
                </ul>
                <!-- Pills navs -->

                <!-- Pills content -->
                <div class="tab-content" id="ex1-content">
                    <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                    <p>
                        With supporting text below as a natural lead-in to additional content. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                        enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur.
                    </p>
                    <div class="row mb-2">
                        <div class="col-12 col-md-6">
                        <ul class="list-unstyled mb-0">
                            <li><i class="fas fa-check text-success me-2"></i>Some great feature name here</li>
                            <li><i class="fas fa-check text-success me-2"></i>Lorem ipsum dolor sit amet, consectetur</li>
                            <li><i class="fas fa-check text-success me-2"></i>Duis aute irure dolor in reprehenderit</li>
                            <li><i class="fas fa-check text-success me-2"></i>Optical heart sensor</li>
                        </ul>
                        </div>
                        <div class="col-12 col-md-6 mb-0">
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Easy fast and ver good</li>
                            <li><i class="fas fa-check text-success me-2"></i>Some great feature name here</li>
                            <li><i class="fas fa-check text-success me-2"></i>Modern style and design</li>
                        </ul>
                        </div>
                    </div>
                    <table class="table border mt-3 mb-2">
                        <tr>
                        <th class="py-2">Display:</th>
                        <td class="py-2">13.3-inch LED-backlit display with IPS</td>
                        </tr>
                        <tr>
                        <th class="py-2">Processor capacity:</th>
                        <td class="py-2">2.3GHz dual-core Intel Core i5</td>
                        </tr>
                        <tr>
                        <th class="py-2">Camera quality:</th>
                        <td class="py-2">720p FaceTime HD camera</td>
                        </tr>
                        <tr>
                        <th class="py-2">Memory</th>
                        <td class="py-2">8 GB RAM or 16 GB RAM</td>
                        </tr>
                        <tr>
                        <th class="py-2">Graphics</th>
                        <td class="py-2">Intel Iris Plus Graphics 640</td>
                        </tr>
                    </table>
                    </div>
                    <div class="tab-pane fade mb-2" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                        Tab content or sample information now <br />
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                        officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    </div>
                    <div class="tab-pane fade mb-2" id="ex1-pills-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                        Another tab content or sample information now <br />
                        Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                        mollit anim id est laborum.
                    </div>
                    <div class="tab-pane fade mb-2" id="ex1-pills-4" role="tabpanel" aria-labelledby="ex1-tab-4">
                        Some other tab content or sample information now <br />
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                        officia deserunt mollit anim id est laborum.
                    </div>
                </div>
                <!-- Pills content -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer -->

<?php require_once "view/components/sanphamlienquan.php" ;?>
