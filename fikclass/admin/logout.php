<?php
session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();

unset($_SESSION["admin"]);

echo "<script>alert('Good bye !'); location.href='login.php';</script>";
?>