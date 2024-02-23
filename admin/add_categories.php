<form action="add_categories_.php" method="post" id="frm1">
    <h2>THÊM LOẠI SẢN PHẨM</h2>
    <div> 
        <label>Tên loại</label>
        <input type="text" class="txt" value="" name="ten_loai">
    </div>
    <div> 
        <label>Thứ tự</label>
        <input type="number" class="txt" min="1" name="thutu">
    </div>
    <div> 
        <label>Ẩn hiện</label>
        <input type="radio" value="0" name="anhien"> Ẩn
        <input type="radio" value="1" name="anhien" checked> Hiện
    </div>
    <div>
        <label></label>
        <button type="submit">Lưu thông tin loại</button>
    </div>
</form>