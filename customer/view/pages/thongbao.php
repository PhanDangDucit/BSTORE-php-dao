<div id="thongbao">
    <p>
        <?php
            if (isset($_SESSION['thongbao'])){
                echo $_SESSION['thongbao'];
                unset($_SESSION['thongbao']);
            }
        ?>
        <a href="index.php">Về trang chủ</a>
    </p>
</div>