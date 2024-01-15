
<?php
    $results = get_kind_of_product();
?>

<ul>
   <?php
        foreach($results as $sp) {
            $id_loai = $sp['id_loai'];
            $ten_loai = $sp['ten_loai'];
    ?>
            <li>
                <a href="index.php?page=loai&id=<?=$id_loai ?>">
                    <?=$ten_loai?>
                </a>
            </li>
    <?php } ?>
    <li>
        <a href="pages/lienhe.php">Liên hệ</a>
    </li>
</ul>
