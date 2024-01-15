
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
    print_r($row);
    // Get related products
    $relatedProducts = getRelatedProducts($row['id_loai'], $pageNum);
?>

<div id="chitiet">
    <div>
        <img src="<?php echo $row['hinh'] ; ?>">
        <p>Số lượng : <input type="number" id="soluong" value="1" min="1"></p>
        <p>
            <button id="addtocart"
                onclick="chonsp('<?=$row['id_sp']?>', '<?=$row['ten_sp']?>', '<?=$row['hinh']?>', '<?=$row['gia']?>')"
            >Thêm vào giỏ</button>
            <button id="trolai" onclick="history.back()" class="text-black">Trở lại</button>
        </p>
    </div>
    <div>
        <h1>
            <?php echo $row['ten_sp'];?>
        </h1>
        <p>
            <span>Giá bán:</span> 
            <b id="gia"><?php echo $row['gia']; ?></b>
        </p>
        <p>
            <span>Cập nhật: </span> 
            <b> <?php echo $row['ngay']; ?></b>
        </p>
        <p>
            <span>RAM : </span> 
            <b> <?php echo $row['RAM']; ?></b>
        </p>
        <p>
            <span>CPU : </span>
            <b> <?php echo $row['CPU']; ?></b>
        </p>
        <p>
            <span>Đĩa : </span> 
            <b> <?php echo $row['Dia']; ?></b>
        </p>
        <p>
            <span>Màu sắc : </span> 
            <b> <?php echo $row['Mausac']; ?></b>
        </p>
        <p>
            <span>Cân nặng : </span> 
            <b> <?php echo $row['Cannang']; ?></b>
        </p>
    </div>
</div>
<?php require_once "components/sanphamlienquan.php" ;?>

<script>
    function chonsp(id, ten, hinh, gia) {
        let cart = JSON.parse(localStorage.getItem('cart'));
        if(cart == null) cart = [];
        index = cart.findIndex(sp => sp[0] == id);
        if(index == -1) {
            cart.push([id, ten, hinh, gia, soluong = 1]);
        } else {
            cart[index][4]++; // tang so luong len 1
        }
        localStorage.setItem("cart", JSON.stringify(cart));
    }
</script>