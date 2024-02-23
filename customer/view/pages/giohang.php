<?php
    require_once "controller/index.php";
?>
<style>
    @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);
    body {
        background-color: #eee;
        font-family: 'Calibri', sans-serif !important;
    }
    .card {
        margin-bottom: 30px;
        border: 0;
        -webkit-transition: all .3s ease;
        transition: all .3s ease;
        letter-spacing: .5px;
        border-radius: 8px;
        -webkit-box-shadow: 1px 5px 24px 0 rgba(68,102,242,.05);
        box-shadow: 1px 5px 24px 0 rgba(68,102,242,.05);
    }

    .card .card-header {
        background-color: #fff;
        border-bottom: none;
        padding: 24px;
        border-bottom: 1px solid #f6f7fb;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .card-header:first-child {
        border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
    }
    .card .card-body {
        padding: 30px;
        background-color: transparent;
    }

    .btn-primary, .btn-primary.disabled, .btn-primary:disabled {
        background-color: #4466f2!important;
        border-color: #4466f2!important;
    }
    /*  */
    @media (min-width: 1025px) {
        .h-custom {
            height: 100vh !important;
        }
    }
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
<section class="h-100 py-5 w-full">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                        <h6 class="mb-0 text-muted">3 items</h6>
                                    </div>
                                    <hr class="my-4">
                                    <?php
                                        $toTalprice = 0;
                                        foreach ($kq as $cart_item) {
                                            $type_of_product = get_type_of_on_product($cart_item['id_sp'])['ten_loai'];
                                            $toTalprice += $cart_item['quantity'] * $cart_item['gia'];
                                    ?>
                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img
                                                src="<?=$cart_item['hinh'] ?>"
                                                class="img-fluid rounded-3" alt="Cotton T-shirt">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                            <h6 class="text-muted"><?=$cart_item['ten_sp'] ?></h6>
                                            <h6 class="text-black mb-0"><?=$type_of_product ?></h6>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                <a href="index.php?page=delete-one&id-sp=<?=$cart_item['id_sp']?>"
                                                    class="btn btn-link px-2"                 
                                                >
                                                    <i class="fas fa-minus"></i>
                                                </a>
                                                <input id="id_product-<?=$cart_item['id_sp']?>" hidden/>
                                                <input id="form1" min="0" name="quantity" value="<?=$cart_item['quantity']?>" type="number"
                                                    class="form-control form-control-sm"/>
                                                <form action="" class="w-full h-full" method="post">
                                                    <button type="submit" class="btn btn-link px-2" name="btn-add-cart">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                    <input type="text" hidden name="id_sp" value="<?=$cart_item['id_sp']?>"/>
                                                </form>
                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h6 class="mb-0"><?=number_format($cart_item['gia'], 0, ',', '.').' đ';?></h6>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <a href="index.php?page=delete-all&id-sp=<?=$cart_item['id_sp']?>"
                                                    class="text-muted border-0" 
                                                >
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                    <?php }; ?>
                                <hr class="my-4">
                                <div class="pt-5">
                                    <h6 class="mb-0"><a href="#!" class="text-body"><i
                                        class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                </div>
                            </div>
                        </div>
                        <!--                     -->
                        <!-- Information of cart -->
                        <!--                     -->
                       <form action="" method="post" class="col-lg-4 bg-grey">
                            <div class="p-5">
                                <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                <hr class="my-4">
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="text-uppercase">Total cost (<?=$quantity_all_products?>)</h5>
                                    <h5><?=number_format($toTalprice, 0, ',', '.').' đ'?></h5>
                                </div>
                                <h5 class="text-uppercase mb-3">Shipping method</h5>
                                <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="shipping-method">
                                    <option selected>Express</option>
                                    <option value="1">Normal</option>
                                </select>
                                <h5 class="text-uppercase mb-3">Give code</h5>
                                <div class="mb-5">
                                    <div class="form-outline">
                                        <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Examplea2">Enter your code</label>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="d-flex justify-content-between mb-5">
                                    <h5 class="text-uppercase">Payment</h5>
                                    <h5><?=number_format($toTalprice, 0, ',', '.').' đ'?></h5>
                                </div>
                                <button 
                                    type="button" 
                                    class="btn btn-dark btn-block btn-lg" 
                                    data-mdb-ripple-color="dark"
                                >
                                    Order
                                </button>
                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>