<?php
    require_once("connect.php");

    $userSQL = "SELECT * FROM `user`";
    $rez = $pdo -> query($userSQL);
    $line = $rez -> fetchAll();

    $newsSQL = "SELECT * FROM `news`";
    $rez1 = $pdo -> query($newsSQL);
    $line1 = $rez1 -> fetchAll();

    $orderSQL = "SELECT * FROM `orders`";
    $rez2 = $pdo -> query($orderSQL);
    $line2 = $rez2 -> fetchAll();
?>