<script>
    let cart = JSON.parse(localStorage.getItem('cart'));
    // delete procduct
    function xoa(i) {
        var newCart = cart.splice(i , 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        render();
    }
</script>
<div id="showcart"></div>
<script>
    // Render function
    function render() {
        let str = '';
        let totalCost = 0;
        let totalQuantity = 0;
        for (i = 0 ; i < cart.length ; i++ ) {
            let sp = cart[i];
            let idsp = sp[0];
            let tensp = sp[1];
            let hinh = sp[2]; 
            let gia = Number(sp[3]); 
            let soluong = Number(sp[4]);
            let tien = gia*soluong;
            totalCost += tien;
            totalQuantity += soluong;
            let giaShow = gia;
            str+=`<div class='lt'>
                    <div>
                        <img src='${hinh}'>
                    </div>
                    <div>
                        <p> Tên sản phẩm: <b>${tensp}</b></p>
                        <p> Giá bán: ${giaShow.toLocaleString('vi')} VNĐ</p>
                        <p> Số lượng: ${soluong}</p>
                        <p> Tiền: ${tien.toLocaleString('vi')} VNĐ</p>
                        <p><button onclick="xoa(${i}); showQuantity();">Xóa</button></p>
                    </div>
            </div>`;
        }
        strMain = `<h3>Giỏ hàng</h3>
                    ${str}
                    <div id="total-quantity">Số lượng: ${totalQuantity}</div>
                    <p id="total-cost">Tổng tiền ${totalCost.toLocaleString('vi')} VNĐ</p>`;
        // render view
        document.getElementById("showcart").innerHTML=strMain;
    }
    render();
</script>