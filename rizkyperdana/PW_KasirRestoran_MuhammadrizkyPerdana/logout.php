<?php

// PROSES LOGOUT
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();

    header("Location: index.php");
    exit;
?>