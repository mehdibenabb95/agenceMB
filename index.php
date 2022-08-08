<?php
session_start();

require("model/bdd.php");
$lePDO = etablirCo();

if (!isset($_GET['path'])) {
    $path = "main";
} else {
    $path = filter_var($_GET['path'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
switch ($path) {
    case "main":
        require('controller/controller.php');
        break;
    case "admin":
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 'admin') {
                require("view/403.php");
            }
        } else {
            require('controller/adminController.php');
        }

        break;

    case "customer":
        if (!isset($_SESSION['role']) || $_SESSION['role'] != 'customer') {
            require("view/403.php");
        } else {


            require('controller/customerController.php');
        }
        require('controller/customerController.php');
        break;

    default:
        require("view/404.php");
}
