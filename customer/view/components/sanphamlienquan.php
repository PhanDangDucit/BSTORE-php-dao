
<section id="sanphamlienquan">
    <div class="container">
        <h3 class="text-uppercase border text-red p-2 mt-4 fs-5">SẢN PHẨM LIÊN QUAN</h3>
        <div>
            <div class="row g-2">
                <?php foreach($relatedProducts as $sp) { ?>
                    <a href="index.php?page=sp&id=<?php echo $sp['id_sp']?>" class="text-decoration-none border-0 card col-xl-3">
                        <div class="border h-100">
                            <img src="<?php echo $sp['hinh']; ?>" class="card-img-top" alt="<?php echo $sp[1]; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $sp['ten_sp']; ?></h5>
                                <p class="card-text"> Giá: <b><?php echo $sp['gia']; ?></b> VNĐ</p>
                            </div>
                        </div>
                    </a>
                <?php }?>
            </div>
        </div>
    </div>
    <!-- Add View -->
    <a href="index.php?page=sp&id=<?php echo $id; ?>&pageNum=<?php echo $pageNum+9?>" class="show-more text-center">
        Show more
    </a>
</section>