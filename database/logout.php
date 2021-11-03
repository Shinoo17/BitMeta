<?php 
    session_start(); 
    session_destroy();
    header("location: http://localhost/work/BitMeta/index.html");
    die();
?>
