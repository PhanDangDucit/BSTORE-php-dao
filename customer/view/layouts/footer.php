
<style>
    #footer {
        background-color: #000;
        padding: 46px 0 0;
        transform: translateY(250px);
    }
    .footer-copyright {
        background-color: #ccc;
    }
</style>
<?php
    $copyright = '© 2023 BSTORE, Inc.';
    $footerMainTitle = [
        ['title' => 'Company', 'content' => ['About us', 'Career', 'Contact', 'Blog']],
        ['title' => 'Support', 'content' => ['FAQs', 'Reports', 'Training', 'Seller']],
        ['title' => 'Categories', 'content' => ['Business', 'Lifestyle', 'Biographies', 'Sciences']],
        ['title' => 'Policy', 'content' => ['Guide to Buy', 'Maintain', 'Refund', 'Our Stores']],
    ]
?>

<!-- The footer part -->
<div id="footer">
    <div class="container">
       <div class="row text-white">
            <div class="footer-main col-lg-9">
                <div class="footer-main-content d-flex justify-content-between">
                    <?php
                        foreach($footerMainTitle as $items) { ?>
                        <div>
                            <?php
                                echo '<h3>'.$items['title'].'</h3>';
                                echo '<p>'.$items['content'][0].'</p>';
                                echo '<p>'.$items['content'][1].'</p>';
                                echo '<p>'.$items['content'][2].'</p>';
                                echo '<p>'.$items['content'][3].'</p>';
                            ?>
                        </div>
                    <?php } 
                    ?>
                </div>
            </div>
            <div class="footer-contact col-lg-3"></div>
       </div>
    </div>
    <div class="footer-copyright text-center text-black mt-4">
        <?php echo '<h4>'.$copyright.'</h4>' ?>
    </div>
</div>