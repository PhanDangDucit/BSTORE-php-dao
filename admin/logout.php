<?php
    session_start();
    session_destroy();
    header("location:../customer/view/index.php");
?>