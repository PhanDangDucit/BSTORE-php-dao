<?php
    if(isset($_GET['id_loai'])==true) {
        $id_loai = $_GET['id_loai']; settype($id, 'int');
    } else $id_loai = 0;
    $loai = get_one_kind($id_loai);
?>

<style>
    #frm1 {
        width: 800px;
        margin: auto;
        border: 1px solid darkcyan;
    }
    #frm1 h2 {
        background: darkcyan; 
        color:white;
        padding: 10px; 
    }
    #frm1 div { 
        padding: 10px 10px; 
        border-bottom: 1px dotted darkcyan;
    }
    #frm1 label {
        display: inline-block;
        width:120px
    }
    #frm1 .txt {
        padding: 5px;
        width: calc(100% - 130px);
        outline: none;
    }
    #frm1 button{
        height: 30px;
    }
</style>

<form action="edit_category_.php" method="post" id="frm1" class="mt-5">
    <h2>SỬA LOẠI SẢN PHẨM</h2>
    <div>
        <label>Tên loại</label>
        <input type="text" class="txt" value="<?php echo $loai['ten_loai']?>" name="ten_loai">
    </div>
    <div>
        <label>Thứ tự</label>
        <input type="number" class="txt" value="<?php echo $loai['thutu']?>" min="1" name="thutu">
    </div>
    <div>
        <label>Ẩn hiện</label>
        <input type="radio" value="0" name="anhien" <?php if($loai['anhien'] == 0) echo 'checked'?>> Ẩn
        <input type="radio" value="1" name="anhien" <?php if($loai['anhien'] == 1) echo 'checked'?>> Hiện
    </div>
    <div>
        <label></label>
        <button type="submit">Lưu thông tin loại</button>
    </div>
    <input type='hidden' name="id_loai" value="<?php echo $loai['id_loai']?>">
</form>