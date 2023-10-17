<?php
session_start();

unset($_SESSION['userData']);

header('location: index.php');

?>