<?php
session_start();

if (isset($_GET['x']) && $_GET['x'] == 'guestpage') {
    if (empty($_SESSION['user_id'])) {
        $page = "guest_page.php";
        include "main.php";
    } else {
        $page = "administrator_page.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'administratorpage') {
    if (!empty($_SESSION['user_id'])) {
        $page = "administrator_page.php";
        include "main.php";
    } else {
        $page = "guest_page.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'user') {
    if (!empty($_SESSION['user_id'])) {
        $page = "user.php";
        include "main.php";
    } else {
        $page = "guest_page.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'contact') {
    if (empty($_SESSION['user_id'])) {
        $page = "contact.php";
        include "main.php";
    } else {
        $page = "administrator_page.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'about') {
    $page = "about.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'logout') {
    if (!empty($_SESSION['user_id'])) {
        include "process/logout_process.php";
    } else {
        $page = "guest_page.php";
        include "main.php";
    }
} else {
    if (empty($_SESSION['user_id'])) {
        $page = "guest_page.php";
        include "main.php";
    } else {
        $page = "administrator_page.php";
        include "main.php";
    }
}
?>