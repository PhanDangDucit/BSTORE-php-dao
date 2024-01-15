<?php
    $background_logo = '../../public/images/brands/none-background_logo.svg';
    if (session_status() === PHP_SESSION_NONE) session_start();      
    if(isset($_SESSION['hinh'])) {
        $hinh = $_SESSION['hinh'];
    }
?>
<style>
    .avatar {
        width: 700px;
        margin: auto;
        padding: 46px 0;
    }
    img {
        width: 100px;
        border-radius: 50%;
        border: 1px solid #ccc;
        margin: auto;
    }
    h2 {
        background-color: darkcyan;
        height: 44px;
        line-height: 44px;
        color: #fff;
        padding: 0 10px;
    }
    .logo {
        
    }
</style>
<div class="logo">
    <a href="../index.php"><img src="<?php echo $background_logo?>" alt=""></a>
</div>
<div class="avatar">
    <h2>AVATAR</h2>
    <?php if(isset($hinh) && strlen($hinh) > 0) {?>
        <img src="<?php echo $hinh;?>" alt="avatar">
    <?php }?>
</div>
<?php
    require_once '../components/uploadfile.php';
?>