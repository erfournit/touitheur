<?php

if(!isset($_SESSION['user_id']) || !isset($_SESSION['pseudo'])){
    $_SESSION['forwarding_url'] = $_SERVER['REQUEST_URI'];
    $_SESSION['notification']['message'] = 'vous dever etre connecter pour acceder a cette page.';
    $_SESSION['notification']['type'] = 'danger';
    header('Location: login.php');
    exit();
}

// $_COOKIE[];

?>