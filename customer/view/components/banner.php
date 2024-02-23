<!-- Declaring variables -->
<?php
    $banner_images = [
        'https://images.fpt.shop/unsafe/fit-in/1190x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/1/9/638403910189404957_H6%20-%201190x300.png',
        'https://images.fpt.shop/unsafe/fit-in/1190x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/1/10/638405243538531469_H6%20-%201190x300.png',
        'https://images.fpt.shop/unsafe/fit-in/1190x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/2/16/638436917572248440_H6%20-%201190x300.png'
    ];
?>

<style>
    .banner-slider {
        height: 400px;
    }
    #banner {
    }
    .product-item {
        position: relative;
    }
    .btn-add {
        position: absolute;
        bottom: 12px;
    }
</style>

<!-- Banner -->
<section id="banner">
   <div class="container">
        <div id="carouselExampleAutoplaying" class="carousel slide banner-slider" data-bs-ride="carousel">
            <div class="carousel-inner h-100">
                <div class="carousel-item h-100 active">
                <img src="<?php echo $banner_images[0]?>" class="d-block w-100 h-100" alt="images_banner_1">
                </div>
                <div class="carousel-item h-100">
                <img src="<?php echo $banner_images[1]?>" class="d-block w-100 h-100" alt="images_banner_2">
                </div>
                <div class="carousel-item h-100">
                <img src="<?php echo $banner_images[2]?>" class="d-block w-100 h-100" alt="images_banner_3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
   </div>
</section>