<?php
    $sanphamnoibat = get_hot_products();
?>

<section id="sanphamnoibat">
    <div class="container">
        <div class="container">
            <h3>SẢN PHẨM NỔI BẬT</h3>
            <div class="row g-2">
                <?php foreach($sanphamnoibat as $sp) { ?>
                    <a href="index.php?page=sp&id=<?php echo $sp['id_sp']?>" class="text-decoration-none border-0 card col-xl-4">
                        <div class="border h-100">
                            <img src="<?php echo $sp['hinh']; ?>" class="card-img-top" style="height: 200px;" alt="<?php echo $sp[1]; ?>">
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
</section>