<?php
    session_start();
    session_destroy();
    header("Location: http://localhost/my_pages/Country_Shop/Main_page.php");
    exit;
?>