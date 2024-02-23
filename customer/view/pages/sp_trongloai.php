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
    $listsp = get_list_same_type_product($id, $page_num, $page_size);
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
        <h3 class="text-uppercase border text-red p-2 mt-4 fs-5"><?= $listsp[0]['ten_loai']; ?></h3>
        <div class="row g-2">
            <?php foreach($listsp as $sp) {?>
                <div class="text-decoration-none border-0 card col-xl-3">
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
    <!-- pagination -->
    <div class="phantrang">
        <?php if($page_prev >= 1) {?>
            <a href="index.php?page=loai&id=<?=$id?>&pn=<?=$page_prev?>">
                <i class="fa-solid fa-angle-left"></i>
            </a>
        <?php }?>
        <a href="#">
            <?=$page_num ?>
        </a>
        <?php if($page_next < 100) {?>
            <a href="index.php?page=loai&id=<?=$id?>&pn=<?=$page_next?>">
                <i class="fa-solid fa-angle-right"></i>
            </a>
        <?php }?>
    </div>
</div>