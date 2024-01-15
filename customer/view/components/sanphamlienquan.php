
<section id="sanphamlienquan">
    <h3>SẢN PHẨM LIÊN QUAN</h3>
    <div id="data">
        <?php foreach($relatedProducts as $sp) { ?>
            <div class="sp">
                <h3> 
                    <a href="index.php?page=sp&id=<?php echo $sp[0]?>"><?php echo $sp[1]; ?></a> 
                </h3>
                <a href="index.php?page=sp&id=<?php echo $sp[0]?>">
                    <img src="<?php echo $sp[3]; ?>">
                </a>
                <p> Giá: <b><?php echo $sp[2]; ?></b> VNĐ</p>
                <p>
                    <button 
                        onclick="
                                chonsp('<?=$sp[0]?>', '<?=$sp[1]?>', '<?=$sp[3]?>', '<?=$sp[2]?>');
                                showQuantity();
                            "
                    >
                        Chọn
                    </button>
                </p>
            </div>
        <?php }?>
    </div>
    <!-- Add View -->
    <a href="index.php?page=sp&id=<?php echo $id; ?>&pageNum=<?php echo $pageNum+9?>" class="show-more text-center">
        Show more
    </a>
</section>