<?php
    session_start();
    unset($_SESSION['user_first_name']);
    unset($_SESSION['user_role']);
    unset($_SESSION['user_id']);
    header("Location: login.php")
?>