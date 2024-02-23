<?php
    require_once "controller/index.php";
    $sanphamnoibat = get_hot_products();
?>
<section id="sanphamnoibat">
    <div class="container">
        <div class="container">
            <h3 class="text-uppercase border text-red p-2 mt-4 fs-5">Hot Product</h3>
            <div class="row g-2">
                <?php foreach($sanphamnoibat as $sp) { ?>
                    <div class="text-decoration-none border-0 card col-xl-4">
                        <form action="index.php?page=cart" class="border h-100 form-add-to-cart" method="post">
                            <div class="h-100 d-flex flex-column">
                                <a href="index.php?page=sp&id=<?php echo $sp['id_sp']?>">
                                    <img src="<?php echo $sp['hinh']; ?>" class="card-img-top" style="height: 200px;" alt="<?php echo $sp['ten_sp']; ?>">
                                </a>
                                <input type="text" hidden name="id_sp" value="<?php echo $sp['id_sp']?>"/>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $sp['ten_sp']; ?></h5>
                                    <p class="card-text"> Giá: <b><?php echo $sp['gia']; ?></b> VNĐ</p>
                                </div>
                                <button type="submit" class="btn btn-primary border-0 btn-sm align-self-center mb-2 w-full text-uppercase" name="btn-add-cart">Buy now</button>
                            </div>
                        </form>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</section>