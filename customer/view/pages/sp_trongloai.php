<?php
    if(isset($_GET['id']) == true) {
        $id = $_GET['id'];
        settype($id, 'int');
    } else $id = 0;
    $page_num = 1;
    if(isset($_GET['pn'])) $page_num = (int) $_GET['pn'];
    if($page_num <= 0) $page_num = 1;
    $page_size = 10;
    $page_prev = $page_num - 1;
    $page_next = $page_num + 1;
    $listsp = getListSameTypeProduct($id, $page_num, $page_size);
    $typeProduct = $listsp->fetch();
?>
<style>
    .phantrang {
        display: flex;
        justify-content: center;
        padding: 16px;
    }
    .phantrang a {
        text-align: center;
        border: 1px solid #ccc;
        background-color: #fff;
        text-decoration: none;
        margin-left: 12px;
        color: #000;
        padding: 14px;
    }
</style>

<div id="sp_trongloai">
    <div class="container">
        <h3><?=$typeProduct['ten_loai']; ?></h3>
        <div class="container">
            <div class="row g-2">
                <?php foreach($listsp as $sp) {?>
                    <a href="index.php?page=sp&id=<?php echo $sp[0]?>" class="text-decoration-none border-0 card col-xl-3">
                        <div class="border h-100">
                            <img src="<?php echo $sp[3]; ?>" class="card-img-top" alt="<?php echo $sp[1]; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $sp[1]; ?></h5>
                                <p class="card-text"> Giá: <b><?php echo $sp[2]; ?></b> VNĐ</p>
                            </div>
                        </div>
                    </a>
                <?php }?>
            </div>
        </div>
    </div>
    <!-- pagination -->
    <div class="phantrang">
        <?php if($page_prev >= 1) {?>
            <a href="index.php?page=loai&id=<?=$id?>&pn=<?=$page_prev?>">
                <i class="fa-solid fa-angle-left"></i>
            </a>
            <?php }?>
            <?php if($page_next < 100) {?>
                <a href="index.php?page=loai&id=<?=$id?>&pn=<?=$page_next?>">
                    <i class="fa-solid fa-angle-right"></i>
                </a>
        <?php }?>
    </div>
</div>